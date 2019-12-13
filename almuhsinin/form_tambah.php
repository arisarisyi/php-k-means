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
                    <h2 class="intro-text text-center"> Input Data Santri
                    </h2>
                    <hr>
                </div>
                <div class="col-md-6">
<div id="content">
	
	<a href="inputdata.php">
	<button>< Lihat Semua Data</button>
	</a>
	<form action="proses_tambah.php" method="post">		
		<table class="table-zebra-striping" >
			<tr>
				<td>Id</td>
				<td>
				<input type="text" name="Id" required>
				</td>
			</tr>
			<tr>
				<td>Nama Santri</td>
				<td>
					<input type="text" name="Nama" required>
				</td>					
			</tr>	
			<tr>
				<td>Asal</td>
				<td><input type="text" name="Asal" required></td>					
			</tr>	
			<tr>
				<td>Tanggal Lahir</td>
				<td><input type="text" name="Tgl_lhr" required></td>					
			</tr>	
			<tr>
				<td>Nahwu</td>
				<td><input type="text" name="Nahwu" required></td>					
			</tr>
			<tr>
				<td>Shorof</td>
				<td><input type="text" name="Shorof" required></td>					
			</tr>	
			<tr>
				<td>Hadits</td>
				<td><input type="text" name="Hadits" required></td>					
			</tr>
			<tr>
				<td>Fiqih</td>
				<td><input type="text" name="Fiqih" required></td>					
			</tr>
			<tr>
				<td>Akhlaq</td>
				<td><input type="text" name="Akhlaq" required></td>					
			</tr>
				<td></td>
				<td><button type="submit">Simpan</button></td>				
			</tr>				
		</table>
	</form>
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
