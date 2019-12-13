<!DOCTYPE html>
<html >
<head>
<title>Pondok Pesantren Kreatif Al-Muhsinin</title>
</head>

<body>
<div id="sidebar">
<h1 align="center">Pondok Pesantren Kreatif Al-Muhsinin</h1>
<h2 align="center">Laporan Kelas</h2>
</div>

<div id="content">
	<?php
	$link  = mysqli_connect("localhost","root", "", "almuhsinin");
	$query = $link->query("SELECT * FROM santri");
	
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$data=[];
	$nama=[];
	while($row=$query->fetch_assoc()){
		$data[]=$row;
		$nama[]=$row['Nama'];
	}
	//hitung Euclidean Distance Space
	function jarakEuclidean($data=array(),$centroid=array()){
		return sqrt(pow(($data[0]-$centroid[0]),2) + pow(($data[1]-$centroid[1]),2)+pow(($data[2]-$centroid[2]),2) + pow(($data[3]-$centroid[3]),2)+pow(($data[4]-$centroid[4]),2));
	}

	function jarakTerdekat($jarak_ke_centroid=array(),$centroid){
		foreach ($jarak_ke_centroid as $key => $value) {
			if(!isset($minimum)){
				$minimum=$value;
				$cluster=($key+1);
				continue;
			}
			else if($value<$minimum){
				$minimum=$value;
				$cluster=($key+1);
			}
		}
		return array(
			'cluster'=>$cluster,
			'value'=>$minimum,
		);
	}

	function perbaruiCentroid($table_iterasi,&$hasil_cluster){
		$hasil_cluster=[];
		//looping untuk mengelompokan x dan y sesuai cluster
		foreach ($table_iterasi as $key => $value) {
			$hasil_cluster[($value['jarak_terdekat']['cluster']-1)][0][]= $value['data'][0];
			$hasil_cluster[($value['jarak_terdekat']['cluster']-1)][1][]= $value['data'][1];
			$hasil_cluster[($value['jarak_terdekat']['cluster']-1)][2][]= $value['data'][2];
			$hasil_cluster[($value['jarak_terdekat']['cluster']-1)][3][]= $value['data'][3];
			$hasil_cluster[($value['jarak_terdekat']['cluster']-1)][4][]= $value['data'][4];
		}
		$new_centroid=[];
		foreach ($hasil_cluster as $key => $value) {
			$new_centroid[$key]= [
				array_sum($value[0])/count($value[0]),
				array_sum($value[1])/count($value[1]),
				array_sum($value[2])/count($value[2]),
				array_sum($value[3])/count($value[3]),
				array_sum($value[4])/count($value[4])
			]; 
		}
		//sorting berdasarkan cluster
		ksort($new_centroid);
		return $new_centroid;
	}

	function centroidBerubah($centroid,$iterasi){
		$centroid_lama = flatten_array($centroid[($iterasi-1)]); //flattern array
		$centroid_baru = flatten_array($centroid[$iterasi]); //flatten array
		//hitbandingkan centroid yang lama dan baru jika berubah return true, jika tidak berubah/jumlah sama=0 return false
		$jumlah_sama=0;
		for($i=0;$i<count($centroid_lama);$i++){
			if($centroid_lama[$i]===$centroid_baru[$i]){
				$jumlah_sama++;
			}
		}
		return $jumlah_sama===count($centroid_lama) ? false : true; 
	}

	function flatten_array($arg) {
	  return is_array($arg) ? array_reduce($arg, function ($c, $a) { return array_merge($c, flatten_array($a)); },[]) : [$arg];
	}

	function pointingHasilCluster($hasil_cluster){
		$result=[];
		foreach ($hasil_cluster as $key => $value) {
			for ($i=0; $i<count($value[0]);$i++) { 
				$result[$key][]=[$hasil_cluster[$key][0][$i],$hasil_cluster[$key][1][$i]];
			}

		}
		return ksort($result);
	}

	//start program
	// get data dari database
	$link  = mysqli_connect("localhost", "root", "", "almuhsinin");
	// cek koneksi
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit;
	}
	$query = $link->query("SELECT * FROM santri");
	$data=[];
	//masukan data santri dan nilai ke array data
	while($row=$query->fetch_assoc()){
		$data[]=[$row['Nahwu'],$row['Shorof'],$row['Hadits'],$row['Fiqih'],$row['Akhlaq']];
	}
	
	//jumlah cluster
	$cluster = 3;
	$variable_0 = 'Nahwu';
	$variable_1 = 'Shorof';
	$variable_2 = 'Hadits';
	$variable_3 = 'Fiqih';
	$variable_4 = 'Akhlaq';

	//centroid awal ambil 
		$centroid[0][]=[
			$data[0][0],
			$data[0][1],
			$data[0][2],
			$data[0][3],
			$data[0][4]
		];
		$centroid[0][]=[
			$data[13][0],
			$data[13][1],
			$data[13][2],
			$data[13][3],
			$data[13][4]
		];
		$centroid[0][]=[
			$data[15][0],
			$data[15][1],
			$data[15][2],
			$data[15][3],
			$data[15][4]
		];
	
	
	$hasil_iterasi=[];
	$hasil_cluster=[];

	//iterasi
	$iterasi=0;
	while(true){
		$table_iterasi=array();
		//untuk setiap data ke i (x dan y)
		foreach ($data as $key => $value) {
			//untuk setiap table centroid pada iterasi ke i
			$table_iterasi[$key]['data']=$value;
			foreach ($centroid[$iterasi] as $key_c => $value_c) {
				//hitung jarak euclidean 
				$table_iterasi[$key]['jarak_ke_centroid'][]=jarakEuclidean($value,$value_c);	
			}
			//hitung jarak terdekat dan tentukan cluster nya
			$table_iterasi[$key]['jarak_terdekat']=jarakTerdekat($table_iterasi[$key]['jarak_ke_centroid'],$centroid);
		}
		array_push($hasil_iterasi, $table_iterasi);
		$centroid[++$iterasi]=perbaruiCentroid($table_iterasi,$hasil_cluster);
		$lanjutkan=centroidBerubah($centroid,$iterasi);
		$boolval = boolval($lanjutkan) ? 'ya' : 'tidak';
		// echo 'proses iterasi ke-'.$iterasi.' : lanjutkan iterasi ? '.$boolval.'<br>';
		if(!$lanjutkan)
			break;
		//loop sampai setiap nilai centroid sama dengan nilai centroid sebelumnya
	} 
	?>
		<div class="row justify-content-md-center">
			
			<!-- <div class="col"> -->
			<?php
			header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=hasil.xls");
			foreach ($hasil_iterasi as $key => $value) { ?>
			<!-- <div class="col"> -->
			<div class="row justify-content-md-center">
			  <div class="col" id="oke">
			    <div class="collapse multi-collapse">
			      <div class="card card-body">
				  <?php $max=count($hasil_iterasi)?>
				  <?php if($key==$max-1){
					  ?>
		      		<h2>Hasil Akhir</h2>
		      		<div class="row">
						<div class="col justify-content-md-center" id="okee">
							<table rules="all" style="display: inline-block;">
								<thead>
									<tr>
										<th rowspan="2" class="text-center">Data ke i</th>
										<th rowspan="2" class="text-center">Nama</th>
										<th rowspan="2" class="text-center" colspan=2>Kelas</th>
									</tr>
									<tr>
									
									</tr>
								</thead>
								<tbody>
									<?php foreach ($value as $key_data => $value_data) { 
									
									?> 
									
									<tr>
										<td align="center" class="text-center" ><?php echo $key_data+1; ?></td>
										<td align="center" class="text-center"><?php echo $nama[$key_data];  ?></td>
								
										<td align="center" class="text-center"><?php  
										if ($value_data['jarak_terdekat']['cluster']==1){echo "Ula";}
										if ($value_data['jarak_terdekat']['cluster']==2){echo "Wustho";}
										if ($value_data['jarak_terdekat']['cluster']==3){echo "Ulya";}
										?></td>
									</tr>

									<?php } ?>
								</tbody>
							</table>
						</div>
			      	</div>
				  <?php } ?>
			    	</div>
			  	</div>
				</div>
			</div>
			<?php
			}
			?>
	</div>
</div>
</body>
</html>