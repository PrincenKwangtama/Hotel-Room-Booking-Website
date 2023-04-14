<?php
require_once 'connect.php';
session_start();
$masuk=$_POST['tanggalmasuk'];
$keluar=$_POST['tanggalkeluar'];
$jenis=$_POST['jenis'];
$jumlah=$_POST['jumlah'];
$idhotel=$_POST['idhotel'];
$iduser=$_POST['id_user'];
$harga=$_POST['harga'];
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
$i=0;
$count=0;
while($row=$result->fetch_assoc()){
    $temp=$row['id_kamar'];
    $sql2="SELECT count(*)as itung from transaksi 
    where id_kamar='$temp' and '$masuk'  BETWEEN check_in AND check_out or id_kamar='$temp' and '$keluar'  BETWEEN check_in AND check_out";
    $result2=$conn->query($sql2);

    while( $row2=$result2->fetch_assoc()){

      if($row2['itung']==0 && $count<$jumlah){
          $count++;
      }
    }
}

if($count!=$jumlah){
    echo "tidak tersedia";
}
else if($count==$jumlah){
    $sqll="SELECT id_kamar,id_jenis from kamar 
    where id_hotel='$idhotel' and id_jenis='$jenisangka'
    GROUP BY id_kamar";
    $resultt=$conn->query($sqll);
    $hasil='tidak tersedia';
    $countt=0;
    $sq=" ";
    $iduser=$_SESSION['id_user'];
    while($roww=$resultt->fetch_assoc()){
        $tempp=$roww['id_kamar'];
        $sql22="SELECT count(*)as itung from transaksi 
        where id_kamar='$tempp' and '$masuk'  BETWEEN check_in AND check_out or id_kamar='$tempp' and '$keluar'  BETWEEN check_in AND check_out";
        $result22=$conn->query($sql22);
        while($row22=$result22->fetch_assoc()){
          if($row22['itung']==0 && $countt<$jumlah){
              if($countt==0){
                
                $sq.="INSERT INTO transaksi values('$tempp',NULL,'$iduser','$masuk','$keluar','$harga')";
                
              }
              else{
               
                $sq.=",('$tempp',NULL,'$iduser','$masuk','$keluar','$harga')"; 
              }
            $countt++;
           
          }
        }
    }

$resultttt=$conn->query($sq);
echo "berhasil";   
}
}
?>