<?php
// untuk mengkoneksi ke database 
$server='localhost';
$user='root';
$password='';
$nama_database='toko_tantri';

$db=mysqli_connect($server,$user,$password,$nama_database);
if (!$db) {
    die ("Gagal menghubungkan database");
}

?>