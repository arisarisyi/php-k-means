<!DOCTYPE html>
<html lang="en">

<head>

    <title>Pondok Pesantren Kreatif Al-Muhsinin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

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
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/1.jpg" alt="">
                            </div>
							<div class="item">
                                <img class="img-responsive img-full" src="img/2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/4.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Selamat Datang</small>
                    </h2>
                    <h1 class="brand-name">Pondok Pesantren Kreatif Al-Muhsinin</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>Cukir Diwek Jombang
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Latar Belakang
                    </h2>
                    <hr>
                    <img class="img-responsive img-border img-left" src="img/logos.jpg" alt="" width="151" height="227">
                    <hr class="visible-xs">
                    <p>Pondok Pesantren Kreatif Al-Muhsinin
merupakan sebuah lembaga yang bergerak di
bidang sosial dan da’wah. Lembaga ini
didirikan oleh Kyai Agus Maulana di desa
cukir kab. Jombang. Tujuan didirikan lembaga
ini adalah membentuk dan menciptakan santri
yang berjiwa kreatif serta dapat menyiarkan
ajaran agama islam yang berfaham
Ahlussunnah wal jamaah. </p>
                    
                </div>
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

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
