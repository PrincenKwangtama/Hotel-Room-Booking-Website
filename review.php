<?php
require_once 'connect.php';
$iduser=$_POST['id_user'];
$id=$_POST['idhotel'];
$review=$_POST['review'];
$sqll="INSERT INTO `review`(`id_review`, `id_user`, `id_hotel`, `keterangan`, `tanggal`) VALUES (NULL,'$iduser','$id','$review',sysdate())";
$resultt=$conn->query($sqll);

$sql="SELECT * from review e
join _user d on d.id_user=e.id_user
where e.id_hotel='$id'";
$result=$conn->query($sql);
$hasil="";
while($row=$result->fetch_assoc()){
  $hasil.="<div class='row' >"."<div class='col-sm-3'>"."<div class='chip'>"."<img src='profile.png' alt='Person' width='96' height='96'>".$row['name_user']."</div></div>"."<div class='col-sm-9'>"." <div class='card' style='margin: 0px auto;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);margin-bottom: 20px;border-top-left-radius: 26px;border-top-right-radius: 26px;border-bottom-left-radius: 26px;border-bottom-right-radius: 26px;'>"." <div class='card-body'>".$row['keterangan']."</div></div></div></div>";

}
echo $hasil;

?>