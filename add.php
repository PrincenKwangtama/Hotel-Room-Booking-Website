<?php 
require_once 'connect.php';
session_start();
$kota=$_POST["kota"];
$alamat=$_POST["alamathotel"];
$bintang=$_POST["bintang"];
$harga=$_POST["hargaa"];
$nama=$_POST["namahotel"];
$link=$_POST["link"];
$telp=$_POST["telp"];

$query="SELECT nama_hotel,kota,jalan from biohotel where jalan='$alamat' AND kota='$kota'";
$result=$conn -> query($query);

$temp="";
if($result -> num_rows >0)
{
    $temp.="gagal";
}
else
{
    $ins="INSERT INTO `biohotel`(`id_hotel`, `nama_hotel`, `kota`, `bintang`,  `jalan`, `harga`, `link_map`,`no_telepon`) VALUES 
    (NULL,'$nama','$kota','$bintang','$alamat','$harga','$link','$telp')";
    $result=$conn -> query($ins);

    $select="SELECT id_hotel from biohotel where nama_hotel='$nama' AND kota='$kota' AND jalan='$alamat' ";
    $res=$conn->query($select);
    $a=$res -> fetch_assoc();
    $_SESSION["id_hotel"]=$a["id_hotel"];

    $kamar="INSERT INTO `kamar`(`id_hotel`, `id_kamar`, `id_jenis`) VALUES ";
    for($i=0;$i<5;$i++)
    {
        if($i!=5-1){
            $kamar.="('$_SESSION[id_hotel]',NULL,1),";
        }
        else{
            $kamar.="('$_SESSION[id_hotel]',NULL,1)";
        }
    }
    $act=$conn -> query($kamar);

    $kamar="INSERT INTO `kamar`(`id_hotel`, `id_kamar`, `id_jenis`) VALUES ";
    for($i=0;$i<5;$i++)
    {
        if($i!=5-1){
            $kamar.="('$_SESSION[id_hotel]',NULL,2),";
        }
        else{
            $kamar.="('$_SESSION[id_hotel]',NULL,2)";
        }
    }
    $act=$conn -> query($kamar);

    $select="SELECT id_hotel,nama_hotel,kota from biohotel";
    $res=$conn -> query($select);
    while($a=$res-> fetch_assoc())
    {
    
    $temp.="<option value=".$a["id_hotel"].">".$a["nama_hotel"]." - ".$a["kota"]."</option>";
    }

}
echo $temp;

?>