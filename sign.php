<?php
require_once 'connect.php';
$nama=$_POST["nama"];
$alamat=$_POST["alamat"];
$email=$_POST["email"];
$password=$_POST["password"];
$telp=$_POST["telp"];

$quer="SELECT email from _user where email = '$email'";
$result=$conn -> query($quer);
$temp="";

if($result-> num_rows >0)
{
    $temp.="gagal";
}
else
{
    $quer="INSERT INTO `_user`(`id_user`, `stat`, `name_user`, `alamat_user`, `telp_user`, `email`, `password_user`) 
    VALUES (NULL,1,'$nama','$alamat','$telp','$email',md5('$password'))";
    $result=$conn -> query($quer);
    $temp.="berhasil";
}
echo $temp;

?>