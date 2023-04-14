<?php
require_once 'connect.php';
$tujuan=$_POST['tujuan'];
$bintang=$_POST['bintang'];
$min=$_POST['hargamin'];
$max=$_POST['hargamax'];

$sql="SELECT id_hotel,nama_hotel,kota,bintang,link,jalan,harga
from biohotel";
$ii=0;
if($tujuan!="NULL"){
  $sql.=" where kota='$tujuan'";
  $ii=1;
}
if( $bintang!=0 ){
  if($ii==1){
    $sql.=" and bintang='$bintang'";
  }
  else{
    $sql.=" where bintang='$bintang'";
    $ii=1;
  }
}
if($max!=NULL){
  if($ii==1){
    $sql.=" and harga<='$max'";
  }
  else{
    $sql.=" where harga<='$max'";
    $ii=1;
  }
}
if($min!=NULL){
  if($ii==1){
    $sql.=" and harga>='$min'";
  }
  else{
    $sql.=" where harga>='$min'";
    $ii=1;
  }
}
$result=$conn->query($sql);
$hasil="<div class='row'>"."<div class='col'>";
$i=1;
while($row = $result->fetch_assoc()) {
  $id=$row['id_hotel'];
  if($row['bintang']==1){
    if($i==1){
      $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star '></i>"."<i class='fa fa-star '></i>"."<i class='fa fa-star ' ></i>"."<i class='fa fa-star '></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>";
      $i++;
    }
    else if($i==2){
      $hasil.="<div class='col'>";
        $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star' ></i>"."<i class='fa fa-star' ></i>"."<i class='fa fa-star' ></i>"."<i class='fa fa-star' ></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>";
      $hasil.="<div class='col'>";
      $i++;
    }
    else if($i==3){
      $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star' ></i>"."<i class='fa fa-star' ></i>"."<i class='fa fa-star' ></i>"."<i class='fa fa-star' ></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>"."</div>";
      $hasil.="<div class='row'>"."<div class='col'>";
      $i=1;
    }
   
  }
  else if($row['bintang']==2){
    if($i==1){
      $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star''></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>";
      $i++;
    }
    else if($i==2){
      $hasil.="<div class='col'>";
        $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>";
      $hasil.="<div class='col'>";
      $i++;
    }
    else if($i==3){
      $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>"."</div>";
      $hasil.="<div class='row'>"."<div class='col'>";
      $i=1;
    }
 }
  else if($row['bintang']==3){
    if($i==1){
      $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>";
      $i++;
    }
    else if($i==2){
      $hasil.="<div class='col'>";
        $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>";
      $hasil.="<div class='col'>";
      $i++;
    }
    else if($i==3){
      $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>"."</div>";
      $hasil.="<div class='row'>"."<div class='col'>";
      $i=1;
    }
  }
  else if($row['bintang']==4){
    if($i==1){
      $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>";
      $i++;
    }
    else if($i==2){
      $hasil.="<div class='col'>";
        $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>";
      $hasil.="<div class='col'>";
      $i++;
    }
    else if($i==3){
      $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>"."</div>";
      $hasil.="<div class='row'>"."<div class='col'>";
      $i=1;
    }
    }
  else if($row['bintang']==5){
    if($i==1){
      $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>";
      $i++;
    }
    else if($i==2){
      $hasil.="<div class='col'>";
        $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>";
      $hasil.="<div class='col'>";
      $i++;
    }
    else if($i==3){
      $hasil.= "<a href='roomhotel.php?nomer=$id' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
      $hasil.="</div>"."</div>";
      $hasil.="<div class='row'>"."<div class='col'>";
      $i=1;
    }
    }
  
}
if($i==3){
  $hasil.="<div class='col'>"."</div>"."</div>";
 
}
if($i==2){
  
  $hasil.="<div class='col'>"."</div>"."<div class='col'>"."</div>"."</div>";

}
if($i==1){
 
  $hasil.="</div>"."</div>";
}
if($hasil=="<div class='row'>"."<div class='col'>"."</div>"."</div>"){
  echo "No data found";
}
else{
  echo $hasil;
}
?>