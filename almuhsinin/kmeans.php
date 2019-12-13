<!DOCTYPE html>
<html lang="en">

<head>

    <title>Pondok Pesantren Kreatif Al-Muhsinin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" type="text/css" />
<link href="css/table.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="brand">Pondok Pesantren Kreatif Al-Muhsinin</div>
    <div class="address-bar">Cukir - Diwek - Jombang</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                       <a class="navbar-brand" href="index.php">Pondok Pesantren Kreatif Al-Muhsinin</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="inputdata.php">Data Santri</a>
                    </li>
					<li>
                        <a href="daftarnilai.php">Nilai Santri</a>
                    </li>
					<li>
                        <a href="form_tambah.php">Input Data</a>
                    </li>
                    <li>
                        <a href="kmeans.php">Clustering</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Klasterisasi Menggunakan K-means
					
                    </h2>
                    <hr>
                </div>
                <div class="col-md-6">
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
			$data[4][0],
			$data[4][1],
			$data[4][2],
			$data[4][3],
			$data[4][4]
		];
		$centroid[0][]=[
			$data[9][0],
			$data[9][1],
			$data[9][2],
			$data[9][3],
			$data[9][4]
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
		
	</div>
	<div class="row justify-content-md-center">
			<p>
				<a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample" role="button" aria-expanded="false" aria-controls="multiCollapseExample">Inisialisasi</a>
				<?php foreach ($hasil_iterasi as $key => $value) { ?>
				<a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample<?php echo $key ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample<?php echo $key ?>">Iterasi ke <?php echo ($key+1); ?></a>
				<?php }  ?>
			</p>
			<!-- <div class="col"> -->
			<div class="row justify-content-md-center">
			  <div class="col">
			    <div class="collapse multi-collapse" id="multiCollapseExample">
			      <div class="card card-body">
		      		<h2>Inisialisasi</h2>
		      		<div class="row">
		      			<div class="center">
			      			<table class="table-zebra-striping" style="display: inline-block;">
								<thead>
									<tr>
										<th rowspan="1">Centroid</th>
										<th rowspan="1"><?php echo $variable_0; ?></th>
										<th rowspan="1"><?php echo $variable_1; ?></th>
										<th rowspan="1"><?php echo $variable_2; ?></th>
										<th rowspan="1"><?php echo $variable_3; ?></th>
										<th rowspan="1"><?php echo $variable_4; ?></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($centroid[0] as $key_c => $value_c) { ?>
									<tr>
										<td align="center"><?php echo ($key_c+1); ?></td>
										<td align="center"><?php echo $value_c[0]; ?></td>
										<td align="center"><?php echo $value_c[1]; ?></td>
										<td align="center"><?php echo $value_c[2]; ?></td>
										<td align="center"><?php echo $value_c[3]; ?></td>
										<td align="center"><?php echo $value_c[4]; ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="col justify-content-md-center">
							<table class="table-zebra-striping" style="display: inline-block;">
								<thead>
									<tr>
										<th rowspan="1">Data ke-i</th>
										<th rowspan="1"><?php echo $variable_0; ?></th>
										<th rowspan="1"><?php echo $variable_1; ?></th>
										<th rowspan="1"><?php echo $variable_2; ?></th>
										<th rowspan="1"><?php echo $variable_3; ?></th>
										<th rowspan="1"><?php echo $variable_4; ?></th>
										
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data as $key_c => $value_c) { ?>
									<tr>
										<td align="center"><?php echo ($key_c+1); ?></td>
										<td align="center"><?php echo $value_c[0]; ?></td>
										<td align="center"><?php echo $value_c[1]; ?></td>
										<td align="center"><?php echo $value_c[2]; ?></td>
										<td align="center"><?php echo $value_c[3]; ?></td>
										<td align="center"><?php echo $value_c[4]; ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
			      	</div>
			    	</div>
			  	</div>
				</div>
			</div>
			<?php
			foreach ($hasil_iterasi as $key => $value) { ?>
			<!-- <div class="col"> -->
			<div class="row justify-content-md-center">
			  <div class="col" id="oke">
			    <div class="collapse multi-collapse" id="multiCollapseExample<?php echo $key; ?>">
			      <div class="card card-body">
		      		<h2 align="center">Iterasi ke <?php echo ($key+1) ?></h2>
		      		<div class="row">
		      			<div class="center">
			      			<table class="table-zebra-striping" style="display: inline-block;">
								<thead>
									<tr>
										<th rowspan="1" class="text-center">Centroid</th>
										<th rowspan="1" class="text-center"><?php echo $variable_0; ?></th>
										<th rowspan="1" class="text-center"><?php echo $variable_1; ?></th>
										<th rowspan="1" class="text-center"><?php echo $variable_2; ?></th>
										<th rowspan="1" class="text-center"><?php echo $variable_3; ?></th>
										<th rowspan="1" class="text-center"><?php echo $variable_4; ?></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($centroid[$key] as $key_c => $value_c) { ?>
									<tr>
										<td align="center" class="text-center"><?php echo ($key_c+1); ?></td>
										<td align="center" class="text-center"><?php echo $value_c[0]; ?></td>
										<td align="center" class="text-center"><?php echo $value_c[1]; ?></td>
										<td align="center" class="text-center"><?php echo $value_c[2]; ?></td>
										<td align="center" class="text-center"><?php echo $value_c[3]; ?></td>
										<td align="center" class="text-center"><?php echo $value_c[4]; ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="col justify-content-md-center" id="okee">
							<table class="table-zebra-striping" style="display: inline-block;">
								<thead>
									<tr>
										<th rowspan="2" class="text-center">Data ke i</th>
										<th rowspan="2" class="text-center">Nama</th>
										<th rowspan="2" class="text-center" colspan=1><?php echo $variable_0; ?></th>
										<th rowspan="2" class="text-center" colspan=1><?php echo $variable_1; ?></th>
										<th rowspan="2" class="text-center" colspan=1><?php echo $variable_2; ?></th>
										<th rowspan="2" class="text-center" colspan=1><?php echo $variable_3; ?></th>
										<th rowspan="2" class="text-center" colspan=1><?php echo $variable_4; ?></th>
										<th rowspan="1" class="text-center" colspan="<?php echo $cluster; ?>"> Jarak ke centroid</th>
										<th rowspan="2" class="text-center" >Jarak terdekat</th>
										<th rowspan="2" class="text-center" colspan=2>Cluster</th>
									</tr>
									<tr>
									<?php for ($i=1; $i <=$cluster ; $i++) { ?> 
										<th rowspan="1" class="text-center"><?php echo $i; ?></th>
									<?php }?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($value as $key_data => $value_data) { 
									
									?> 
									
									<tr>
										<td align="center" class="text-center" ><?php echo $key_data+1; ?></td>
										<td align="center" class="text-center"><?php echo $nama[$key_data];  ?></td>
										<td align="center" class="text-center"><?php echo $value_data['data'][0]; ?></td>
										<td align="center" class="text-center"><?php echo $value_data['data'][1]; ?></td>
										<td align="center" class="text-center"><?php echo $value_data['data'][2]; ?></td>
										<td align="center" class="text-center"><?php echo $value_data['data'][3]; ?></td>
										<td align="center" class="text-center"><?php echo $value_data['data'][4]; ?></td>
										
										<?php
										foreach ($value_data['jarak_ke_centroid'] as $key_jc => $value_jc) { ?>
											<td align="center" class="text-center"><?php echo $value_jc; ?></td>
										<?php 
										}
										?>
										<td align="center" class="text-center"><?php echo $value_data['jarak_terdekat']['value']; ?></td>
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
			    	</div>
			  	</div>
				</div>
			</div>
			<?php
			}
			?>
	</div>
	<div class="row justify-content-md-center">
		<a href="cetak.php" target="_blank">
	<button class="button-flat" >Cetak Laporan</button> </a>
	</div>
</div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>


    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Al-Muhsinin</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
