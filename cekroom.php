<?php
require_once 'connect.php';
$masuk=$_POST['tanggalmasuk'];
$keluar=$_POST['tanggalkeluar'];
$jenis=$_POST['jenis'];
$jumlah=$_POST['jumlah'];
$idhotel=$_POST['idhotel'];
$i=0;
if($masuk< date('Y-m-d')){
    $i++;
    echo " Tnggal check in salah ";
}
if($keluar < date('Y-m-d')){
    $i++; 
    echo " Tnggal check out salah ";
}
if($jenis==NULL){
    $i++;
    echo " Jenis kamar belum diisi ";
}
if($jumlah==0){
    echo " jumlah kamar belum diisi ";
    $i++;
}
if($masuk>$keluar){
    echo " salah input ";
    $i++;
}

if($i==0){
if($jenis=="Standart"){
$jenisangka=1;
}
else{
    $jenisangka=2;
}
$sql="SELECT id_kamar,id_jenis from kamar 
where id_hotel='$idhotel' and id_jenis='$jenisangka'
GROUP BY id_kamar";
$result=$conn->query($sql);
$hasil='tidak tersedia';
$count=0;
while($row=$result->fetch_assoc()){
    $temp=$row['id_kamar'];
    $sql2="SELECT count(*)as itung from transaksi 
    where id_kamar='$temp' and '$masuk'  BETWEEN check_in AND check_out or id_kamar='$temp' and '$keluar'  BETWEEN check_in AND check_out";
    $result2=$conn->query($sql2);
    while($row2=$result2->fetch_assoc()){
      if($row2['itung']==0 && $count!=$jumlah){ 
          $count++;
      }
    }
}
if($count!=$jumlah){
    echo "tidak tersedia";
}
else if($count==$jumlah){
    echo "tersedia";
}
}
?>