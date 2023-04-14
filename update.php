<?php 
require_once 'connect.php';


$check="SELECT nama_hotel,kota,jalan from biohotel where jalan='$_POST[alamat]' AND kota='$_POST[kota]' AND nama_hotel='$_POST[nama]'";
$result=$conn->query($check);
$temp="";

if($result-> num_rows > 0)
{
    $temp="gagal";
}
else{
    $up="UPDATE biohotel set ";
    if($_POST["harga"]!=0)
    {
        $up.="harga='$_POST[harga]', ";
    }
    if($_POST["nama"]!=NULL)
    {
        $up.="nama_hotel='$_POST[nama]', ";
    }
    if($_POST["alamat"]!=NULL)
    {
        $up.="jalan='$_POST[alamat]', ";
    }
    if($_POST["link"]!=NULL)
    {
        $up.="link_map='$_POST[link]', ";
    }
    if($_POST["telp"]!=NULL)
    {
        $up.="no_telepon='$_POST[telp]', ";
    }
    $id=$_POST["id"];
    $kota=$_POST["kota"];
    $bintang=$_POST["bintang"];

    $up.="kota='$kota', bintang='$bintang' where id_hotel='$id'";
    $ac=$conn->query($up);

    $temp= "Sudah ter-update";
}
echo $temp;
?>