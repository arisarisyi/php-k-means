<?php 
include 'koneksi.php';

$Id = $_POST['Id'];
$Nama = $_POST['Nama'];
$Asal= $_POST['Asal'];
$Tgl_lhr= $_POST['Tgl_lhr'];
$Nahwu= $_POST['Nahwu'];
$Shorof = $_POST['Shorof'];
$Hadits= $_POST['Hadits'];
$Fiqih = $_POST['Fiqih'];
$Akhlaq= $_POST['Akhlaq'];



$cekdata=mysqli_query($connect,"Select * FROM santri Where Nama='$Nama' AND Asal='$Asal' AND Tgl_lhr='$Tgl_lhr'") or die(mysqli_error($connect));
if (mysqli_num_rows($cekdata) >0 ){
	echo "<script>alert('Data Sudah ADA');window.location='inputdata.php';</script>";
}
Else{
$query = mysqli_query($connect,"INSERT INTO santri (Id, Nama, Asal, Tgl_lhr, Nahwu, Shorof, Hadits, Fiqih, Akhlaq) VALUES ('$Id', '$Nama', '$Asal', '$Tgl_lhr', '$Nahwu', '$Shorof', '$Hadits', '$Fiqih', '$Akhlaq')") or die(mysqli_error($connect));
if($query) {
    echo "<script>alert('Data berhasil ditambahkan!'); window.location='inputdata.php';</script>";
} else {
    echo "<script>alert('Data gagal ditambahkan');</script>";
}
}
?>