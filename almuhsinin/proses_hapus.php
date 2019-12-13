<?php 
include 'koneksi.php';

$Id = $_GET['Id'];

$query = mysqli_query($connect, "DELETE FROM santri WHERE Id = '$Id'") or die(mysqli_error($connect));
if($query) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='inputdata.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus'); window.location='inputdata.php';</script>";
}
?>