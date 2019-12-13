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

$query = mysqli_query($connect, "UPDATE santri SET Nama='$Nama', Asal='$Asal', Tgl_lhr='$Tgl_lhr', Nahwu='$Nahwu', Shorof='$Shorof', Hadits='$Hadits', Fiqih='$Fiqih', Akhlaq='$Akhlaq' WHERE id='$Id'") or die(mysqli_error($connect));
if($query) {
    echo "<script>alert('Data berhasil diedit!'); window.location='inputdata.php';</script>";
} else {
    echo "<script>alert('Data gagal diedit');</script>";
}
?>