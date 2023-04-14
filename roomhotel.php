<?php
require_once 'connect.php';
$id=$_GET['nomer'];
session_start();
if(isset($_SESSION["id_user"])){

}
else{
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function(){
      $("a").on('click', function(event) 
                {
                    if (this.hash !== "") 
                    {
                        event.preventDefault();

                        var hash = this.hash;

                        $('html, body').animate({scrollTop: $(hash).offset().top}, 800, function()
                        {
                            window.location.hash = hash;
                        });
                    } 
                });
      $(function(){
             setInterval(timestamp, 1000);
            });
            
        function timestamp() {
            $.ajax({
                url: 'jam.php',
                success: function(data) {
                 $('#time').html(data);
                },
            });
            }
      $("#cek").click(function(){
        var idhotel = "<?php echo $id; ?>";
        var tanggalmasuk=$("#cekin").val();
        var tanggalkeluar=$("#cekout").val();
        var jenis=$("#jenis").val();
        var jumlah=$("#jumlah").val();
        $.ajax({
          type:"post",
          data:{tanggalmasuk:tanggalmasuk,tanggalkeluar:tanggalkeluar,jenis:jenis,jumlah:jumlah,idhotel:idhotel},
          url:"cekroom.php",
          success:function(result){
            alert(result);
          },
          error: function(){
            alert('Maaf, Server Petra sedang Down');
          }
        });
      });
      $("#submitreview").click(function(){
          var review=$("#exampleFormControlTextarea1").val();
          var idhotel = "<?php echo $id; ?>";
          var id_user="<?php echo $_SESSION['id_user']; ?>";
          $.ajax({
          type:"post",
          data:{review:review,idhotel:idhotel,id_user:id_user},
          url:"review.php",
          success:function(result){
            $("#review").html(result);
          },
          error: function(){
            alert('Maaf, Server Petra sedang Down');
          }
        });
      });
      $("#pesan").click(function(){
        var idhotel = "<?php echo $id; ?>";
        var tanggalmasuk=$("#cekin1").val();
        var tanggalkeluar=$("#cekout1").val();
        var jenis=$("#jenis1").val();
        var jumlah=$("#jumlah1").val();    
        var id_user="<?php echo $_SESSION['id_user']; ?>";
        var harga=$("#harga1").val();
        $.ajax({
          type:"post",
          data:{tanggalmasuk:tanggalmasuk,tanggalkeluar:tanggalkeluar,jenis:jenis,jumlah:jumlah,idhotel:idhotel,id_user:id_user,harga:harga},
          url:"pesenroom.php",
          success:function(result){
            alert(result);
          },
          error: function(){
            alert('Maaf, Server Petra sedang Down');
          }
        });
        $('#exampleModal').modal('hide')
      })
      $("#pesan2").click(function(){
        var harga=$("#harga2").val();
        var idhotel = "<?php echo $id; ?>";
        var tanggalmasuk=$("#cekin2").val();
        var tanggalkeluar=$("#cekout2").val();
        var jenis=$("#jenis2").val();
        var jumlah=$("#jumlah2").val();
        var id_user="<?php echo $_SESSION['id_user']; ?>";        
        $.ajax({
          type:"post",
          data:{tanggalmasuk:tanggalmasuk,tanggalkeluar:tanggalkeluar,jenis:jenis,jumlah:jumlah,idhotel:idhotel,id_user:id_user,harga:harga},
          url:"pesenroom.php",
          success:function(result){
            alert(result);
          },
          error: function(){
            alert('Maaf, Server Petra sedang Down');
          }
        });
        $('#exampleModal1').modal('hide')
      })
    });
  </script>
  <title>Kamar</title>
  <style type="text/css">
    #info{
      position: -webkit-sticky;
  position: sticky;
  top: 0;
  padding: 5px;
  background-color: #cae8ca;
  border: 2px radius #4CAF50;
  z-index: 1;
    }
    .chip {
  display: inline-block;
  padding: 0 25px;
  height: 50px;
  font-size: 16px;
  line-height: 50px;
  border-radius: 25px;
  background-color: #f1f1f1;
}

.chip img {
  float: left;
  margin: 0 10px 0 -25px;
  height: 50px;
  width: 50px;
  border-radius: 50%;
}
#standart {
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
}
#standart1 {
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
}

    
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light " style="background-color:Snow">
        <em><a class="navbar-brand" href="#" id="time"></a></em>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div  class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto" id="bar">
                <?php

                    $temp="";
                    if(isset($_SESSION["id_user"]))
                    {
                        $temp.='<li class="nav-item active" ><a class="nav-link active" href="">
                        <h5> Hello '.$_SESSION["nama"].'</h5> <span class="sr-only">(current)</span></a>
                    </li><li class="nav-item " ><a class="nav-link " href="login.php">
                    home <span class="sr-only">(current)</span></a>
                 </li>
                    <li class="nav-item " ><a class="nav-link " href="history.php">
                       Transaksi <span class="sr-only">(current)</span></a>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php" >Logout <span class="sr-only">(current)</span></a>
                   </li>';

                    } 
                    else
                    {
                        $temp.='<li class="nav-item">
                        <a class="nav-link" href="#" id="login" >Login <span class="sr-only">(current)</span></a>
                   </li>
                   <li class="nav-item">
                        <a class="nav-link" href="#" id="sign">Sign in <span class="sr-only">(current)</span></a>
                   </li>';
                    }
                    echo $temp;
                ?>
                  

                </ul>
                </div>
            </div>
          </nav>
          
  <div class="container">
    <div class="card" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);width: 80%;margin: 0px auto;margin-bottom: 20px;border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;"  id="info">
      <div class="card-body" style="padding: 0px;">
    <div class="row">
      <div class="col-sm-1">
        <a href="#over" style="color: black;" >Info</a>
      </div>
      <div class="col-sm-2">
        <a href="#lokasi" style="color: black;">Lokasi</a>
      </div>
      <div class="col-sm-2">
        <a href="#kamar" style="color: black;">Kamar</a>
      </div>
      <div class="col-sm-2">
        <a href="#fasilitas" style="color: black;">Fasilitas</a>
      </div>
      <div class="col-sm-2">
        <a href="#review" style="color: black;">Review</a>
      </div>
    </div>
    </div>
    </div>
    
    
    <div class="card" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);width: 80%;margin: 0px auto;margin-bottom: 20px;border-top-left-radius: 20px;border-top-right-radius: 20px;" id="over">
      <div class="card-body" style="padding: 0px;">
        <div class="row">
          <div class="col-sm" style="padding-right: 0px;">
          <?php
          $idhotel=$_GET['nomer'];
          $sql="SELECT * from biohotel where id_hotel='$idhotel'";
          $result=$conn -> query($sql);
          $row=$result->fetch_assoc();
          $hasil="<img src=".$row['over_1']." style='width: 100%;height: 100%;border-top-left-radius: 20px;'".">";
          echo $hasil;
          ?>
            
          </div>
          <div class="col-sm" style="padding-right: 0px;padding-left: 0px;">
            <div class="row">
              <div class="col-sm">
              <?php
          $idhotel=$_GET['nomer'];
          $sql="SELECT * from biohotel where id_hotel='$idhotel'";
          $result = $conn -> query($sql);
          $row = $result->fetch_assoc();
          $hasil="<img src=".$row['over_2']." style='width: 100%;height: 100%;'".">";
          echo $hasil;
          ?>
                
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
              <?php
          $idhotel=$_GET['nomer'];
          $sql="SELECT * from biohotel where id_hotel='$idhotel'";
          $result=$conn->query($sql);
          $row=$result->fetch_assoc();
          $hasil="<img src=".$row['over_3']." style='width: 100%;height: 100%;'".">";
          echo $hasil;
          ?>

              </div>
            </div>
          </div>
          <div class="col-sm" style="padding-left: 0px;">
            <div class="row">
              <div class="col-sm">
              <?php
          $idhotel=$_GET['nomer'];
          $sql="SELECT * from biohotel where id_hotel='$idhotel'";
          $result=$conn->query($sql);
          $row=$result->fetch_assoc();
          $hasil="<img src=".$row['over_4']." style='width: 100%;height: 100%;border-top-right-radius: 20px;'".">";
          echo $hasil;
          ?>
               
                
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
              <?php
          $idhotel=$_GET['nomer'];
          $sql="SELECT * from biohotel where id_hotel='$idhotel'";
          $result=$conn->query($sql);
          $row=$result->fetch_assoc();
          $hasil="<img src=".$row['over_5']." style='width: 100%;height: 100%;'".">";
          echo $hasil;
          ?>
                
              </div>
            </div>
            
          </div>
        </div>
        <div class="row" style="padding-left: 10px;margin-bottom: 5px;">
          <?php
          $id=$_GET['nomer'];
          $sql="SELECT nama_hotel,kota,bintang,no_telepon from biohotel where id_hotel='$id'";
          $result=$conn->query($sql);
          $row=$result->fetch_assoc();
          $hasil="";
          $hasil.="<div class='col-sm'>".$row['nama_hotel'];
            if($row['bintang']==1){
              $hasil.="<br>"."<i class='fa fa-star' style='color: gold;'></i> "."<i class='fa fa-star' ></i> "."<i class='fa fa-star'></i> "."<i class='fa fa-star' ></i> "."<i class='fa fa-star' ></i> ".$row['kota']."<br>"."<i class='fa fa-phone' aria-hidden='true'></i> ".$row['no_telepon']."</div>";
            }
            else if($row['bintang']==2){
              $hasil.="<br>"."<i class='fa fa-star' style='color: gold;'></i> "."<i class='fa fa-star' style='color: gold;'></i> "."<i class='fa fa-star' ></i> "."<i class='fa fa-star' ></i> "."<i class='fa fa-star' ></i> ".$row['kota']."<br>"."<i class='fa fa-phone' aria-hidden='true'></i> ".$row['no_telepon']."</div>";
            }
            else if($row['bintang']==3){
              $hasil.="<br>"."<i class='fa fa-star' style='color: gold;'></i> "."<i class='fa fa-star' style='color: gold;'></i> "."<i class='fa fa-star' style='color: gold;'></i> "."<i class='fa fa-star' ></i> "."<i class='fa fa-star' ></i> ".$row['kota']."<br>"."<i class='fa fa-phone' aria-hidden='true'></i> ".$row['no_telepon']."</div>";
            }
            else if($row['bintang']==4){
              $hasil.="<br>"."<i class='fa fa-star' style='color: gold;'></i> "."<i class='fa fa-star' style='color: gold;'></i> "."<i class='fa fa-star' style='color: gold;'></i> "."<i class='fa fa-star' style='color: gold;'></i> "."<i class='fa fa-star' ></i> ".$row['kota']."<br>"."<i class='fa fa-phone' aria-hidden='true'></i> ".$row['no_telepon']."</div>";
            }
            else if($row['bintang']==5){
              $hasil.="<br>"."<i class='fa fa-star' style='color: gold;'></i> "."<i class='fa fa-star' style='color: gold;'></i> "."<i class='fa fa-star' style='color: gold;'></i> "."<i class='fa fa-star' style='color: gold;'></i> "."<i class='fa fa-star' style='color: gold;'></i> ".$row['kota']."<br>"."<i class='fa fa-phone' aria-hidden='true'></i> ".$row['no_telepon']."</div>";
            }
            echo $hasil;
            ?>
        </div>
      </div>
    </div>
      
    
      
    <div class="card" style="width: 80%;margin: 0px auto;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);background-color:oldlace;border-top-left-radius: 20px;border-top-right-radius: 20px" id="lokasi">
      <div class="card-body">
        <p style="text-align:center ;font-size: large;font-weight: bold;">Lokasi</p>
      </div>
    </div>
      <div class="card" style="width: 80%;margin: 0px auto;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);margin-bottom: 20px;" >
        <div class="card-body">
          <div class="row">
            <div class="col-sm-4" >
              <i class='fa fa-road fa-2x' aria-hidden='true'></i>
              <?php
              $id=$_GET['nomer'];
              $sql="SELECT jalan from biohotel where id_hotel='$id'";
              $result=$conn->query($sql);
              $row=$result->fetch_assoc();
              echo $row['jalan'];
              ?>
            </div>
            <div class="col-sm-8" >
            <?php
          $idhotel=$_GET['nomer'];
          $sql="SELECT * from biohotel where id_hotel='$idhotel'";
          $result=$conn->query($sql);
          $row=$result->fetch_assoc();
          $hasil = "<a href =".$row['link_map']."> <img src= 'assets/map.png' style='width: 50%;'></a>";
          echo $hasil;
          $hasil2="<a href=".$row['link_map'].">"."<p style='text-align: right;'>"."<button type='button' class='btn btn-primary' style='height: 10%;border-top-left-radius: 26px;border-top-right-radius: 26px;border-bottom-left-radius: 26px;border-bottom-right-radius: 26px;width: 20%; float: left; margin-left: 75px;'>"."Lihat"."</button></p>"."<a/>";
          echo $hasil2;
          ?>
              
              
            </div>
          </div>
        </div>
      </div>
      
      
      
      <div class="card" style="width: 80%;margin: 0px auto;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);margin-bottom: 20px;">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Check In</label>
                <input type="date" class="form-control" placeholder="" id="cekin">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Check Out</label>
                <input type="date" class="form-control" placeholder="" id="cekout">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Jenis Kamar</label>
                <select class="form-control" id="jenis">
                  <option></option>
                  <option>Standard</option>
                  <option>Up size</option>
                </select> 
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Jumlah</label>
                <input type="number" class="form-control" placeholder="" id="jumlah">
              </div>
            </div>
            <div class="col-sm-2">
              <p style="text-align: right;"><button type="button" class="btn btn-primary" id="cek" style="margin-top: 30px;border-top-left-radius: 26px;border-top-right-radius: 26px;border-bottom-left-radius: 26px;border-bottom-right-radius: 26px;width: 70%;">Cek</button></p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row" style="width: 82%;margin: 0px auto;" id="kamar">
        <div class="col-sm-4" >
          <div class="card" style="margin: 0px auto;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);margin-bottom: 10px;border-top-left-radius: 10px;border-top-right-radius: 10px;" id="standart">
            <div class="card-body" style="padding: 0px;">
            <?php
          $idhotel=$_GET['nomer'];
          $sql="SELECT * from biohotel where id_hotel='$idhotel'";
          $result=$conn->query($sql);
          $row=$result->fetch_assoc();
          $hasil="<img src=".$row['kamar_standart']." style='width: 100%;height: 100%;border-top-left-radius: 10px;border-top-right-radius: 10px;'".">";
          echo $hasil;
          ?>
              
             <p style="padding-left: 7px;font-family: monospace;font-size: large;">Standard</p>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="card" style="margin: 0px auto;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);margin-bottom: 20px;" >
            <div class="card-body" >
              <div class="row">
                <div class="col-sm">
                  <div class="row" style="border-bottom: 0.5px solid;border-right: 1px solid;">
                    <div class="col-sm">
                      Standard Room
                      <br><i class="fa fa-cutlery" aria-hidden="true"></i> <span>Sarapan</span> <i class="fa fa-wifi" aria-hidden="true"></i> <span>Wifi</span>
                      <br>
                      <br>
                      <br>
                    </div>
                  </div>
                  <div class="row" style="border-right: 1px solid;">
                    <div class="col-sm">
                      <i class="fa fa-bed" aria-hidden="true"></i> <span>Double Single Bed</span>
                      <br>
                      <i class="fa fa-user" aria-hidden="true"></i> 2 tamu
                      <br>
                      <i class="fa fa-square-o" aria-hidden="true"></i> 26 m<sup>2</sup>
                    </div>
                  </div>
                </div>
                <div class="col-sm">
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <p style="text-align: right;">
                  <?php
                  $id=$_GET['nomer'];
                  $sql="SELECT harga from biohotel where id_hotel='$id'";
                  $result=$conn->query($sql);
                  $row=$result->fetch_assoc();
                  $hargakamar1=$row['harga'];
                  echo "IDR ".$hargakamar1;
                  ?>
                  <br>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="border-top-left-radius: 26px;border-top-right-radius: 26px;border-bottom-left-radius: 26px;border-bottom-right-radius: 26px;width: 30%;">
                    Pilih
                  </button>
                </p>
                  <br>
                 
                  
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                              <div class="col-sm">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Check In</label>
                                  <input type="date" class="form-control" placeholder="" id="cekin1">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Check Out</label>
                                  <input type="date" class="form-control" placeholder="" id="cekout1">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Jenis Kamar</label>
                                  <select class="form-control" id="jenis1">
                                    <option>Standart</option>
                                  </select> 
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Jumlah</label>
                                  <input type="number" class="form-control" placeholder="" id="jumlah1">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Harga</label>
                                  <select class="form-control" id="harga1">
                                    <option><?php echo $hargakamar1; ?></option>
                                  </select> 
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" id="pesan">Pesan</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row" style="width: 82%;margin: 0px auto;">
        <div class="col-sm-4">
          <div class="card" style="margin: 0px auto;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);margin-bottom: 10px;border-top-left-radius: 10px;border-top-right-radius: 10px;" id="standart1">
            <div class="card-body" style="padding: 0px;">
            <?php
          $idhotel=$_GET['nomer'];
          $sql="SELECT * from biohotel where id_hotel='$idhotel'";
          $result=$conn->query($sql);
          $row=$result->fetch_assoc();
          $hasil="<img src=".$row['kamar_upsize']." style='width: 100%;height: 100%;border-top-left-radius: 10px;border-top-right-radius: 10px;'".">";
          echo $hasil;
          ?>
              
             <p style="padding-left: 7px;font-family: monospace;font-size: large;">Suite</p>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="card" style="margin: 0px auto;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);margin-bottom: 20px;">
            <div class="card-body" >
              <div class="row">
                <div class="col-sm">
                  <div class="row" style="border-bottom: 0.5px solid;border-right: 1px solid;">
                    <div class="col-sm">
                      Suite
                      <br><i class="fa fa-cutlery" aria-hidden="true"></i> <span>Sarapan Prioritas</span> <i class="fa fa-wifi" aria-hidden="true"></i> <span>Wifi</span>
                      <br>
                      <br>
                      <br>
                    </div>
                  </div>
                  <div class="row" style="border-right: 1px solid;">
                    <div class="col-sm">
                      <i class="fa fa-bed" aria-hidden="true"></i> <span>King Size Bed</span> &nbsp; <i class="fa fa-coffee" aria-hidden="true"></i> Coffee Machine
                      <br>
                      <i class="fa fa-user" aria-hidden="true"></i> 3 tamu
                      <br>
                      <i class="fa fa-square-o" aria-hidden="true"></i> 52 m<sup>2</sup>
                      <br>
                      <i class="fa fa-shower" aria-hidden="true"></i> jacuzzi
                      
                      
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm">
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <p style="text-align: right;">
                  <?php
                  $id=$_GET['nomer'];
                  $sql="SELECT harga from biohotel where id_hotel='$id'";
                  $result=$conn->query($sql);
                  $row=$result->fetch_assoc();
                  $hargakamar2=$row['harga']+500000;
                  echo "IDR ".$hargakamar2;
                  ?>
                  <br>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" style="border-top-left-radius: 26px;border-top-right-radius: 26px;border-bottom-left-radius: 26px;border-bottom-right-radius: 26px;width: 30%;">
                    Pilih
                  </button>
                </p>
                  <br>
                 
                  
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                              <div class="col-sm">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Check In</label>
                                  <input type="date" class="form-control" placeholder="" id="cekin2">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Check Out</label>
                                  <input type="date" class="form-control" placeholder="" id="cekout2">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Jenis Kamar</label>
                                  <select class="form-control" id="jenis2">
                                    <option>Up size</option>
                                  </select> 
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Jumlah</label>
                                  <input type="number" class="form-control" placeholder="" id="jumlah2">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Harga</label>
                                  <select class="form-control" id="harga2">
                                    <option><?php echo $hargakamar2; ?></option>
                                  </select> 
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" id="pesan2">Pesan</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="card" style="width: 80%;margin: 0px auto;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);background-color:oldlace;border-top-left-radius: 20px;border-top-right-radius: 20px" id="fasilitas">
        <div class="card-body">
          <p style="text-align:center ;font-size: large;font-weight: bold;">Fasilitas</p>
        </div>
      </div>
      <div class="card" style="margin: 0px auto;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);margin-bottom: 20px;width: 80%;" >
        <div class="card-body" >
         
          <div class="row" style="padding-bottom: 10px;">
            <div class="col-sm-2">
                Olahraga, Spa & Rekreasi
            </div>
            <div class="col-sm">
              <li>Ruang perawatan Spa</li>
              <li>Pemandian Turki/Hammam</li>
              <li>Kolam renang anak & dewasa</li>
              
            </div>
            <div class="col-sm">
              <li>Lapangan golf di dalam properti</li>
              <li>Ruang game</li>
              <li>Spa layanan lengkap</li>
            </div>
            <div class="col-sm">
              <li>Taman</li>
              <li>Fasilitas gym 24 jam</li>
            </div>
          </div>

          <div class="row" style="padding-bottom: 10px;">
            <div class="col-sm-2">
              Fasilitas Umum
            </div>
            <div class="col-sm">
              <li>Teras</li>
              <li>Porter/bell-boy</li>
 
              
            </div>
            <div class="col-sm">
              <li>Lift</li>
              <li>Ruang merokok khusus</li>

            </div>
            <div class="col-sm">
                <li>Area merokok yang ditetapkan</li>
                <li>Surat kabar gratis di lobi</li>
            </div>
          </div>

                    <div class="row">
            <div class="col-sm-2">
              Layanan Hotel
            </div>
            <div class="col-sm">
              <li>Ruang perawatan Spa</li>
              <li>Pemandian Turki/Hammam</li>
              <li>Kolam renang anak</li>
              
            </div>
            <div class="col-sm">
                <li>Lapangan golf di dalam properti</li>
                <li>Ruang game</li>
                <li>Spa layanan lengkap</li>
            </div>
            <div class="col-sm">
                <li>Taman</li>
                <li>Fasilitas gym 24 jam</li>
            </div>
          </div>  
        </div>
      </div>
      


      <div class="card" style="width: 80%;margin: 0px auto;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);background-color:oldlace;border-top-left-radius: 20px;border-top-right-radius: 20px" >
        <div class="card-body">
          <p style="text-align:center ;font-size: large;font-weight: bold;">Review</p>
        </div>
      </div>
      <div style="width: 80%;margin: 0px auto;" id="review">
        <?php
        $id=$_GET['nomer'];
        $sql="SELECT * from review e
        join _user d on d.id_user=e.id_user
        where e.id_hotel='$id'";
        $result=$conn->query($sql);
        $hasil="";
        while($row=$result->fetch_assoc()){
          $hasil.="<div class='row' >"."<div class='col-sm-3'>"."<div class='chip' style='box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2)'>"."<img src='assets/profile.png' alt='Person' width='96' height='96'>".$row['name_user']."</div></div>"."<div class='col-sm-9'>"." <div class='card' style='margin: 0px auto;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);margin-bottom: 20px;border-top-left-radius: 26px;border-top-right-radius: 26px;border-bottom-left-radius: 26px;border-bottom-right-radius: 26px;'>"." <div class='card-body'>".$row['keterangan']."</div></div></div></div>";
         
        }
        echo $hasil;

        ?>
        
      </div>
      
        <div class="row" style="width: 80%;margin: 0px auto;">
          <div class="col-sm">
            <div class="form-group" style="border-top-left-radius: 20px;border-top-right-radius: 20px;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);background-color: oldlace;">
              <label for="exampleFormControlTextarea1" style="padding-left: 10px;">Silakan memberi review terhadap hotel ini</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
          </div>
         
        </div>
        <div class="row" style="width: 80%;margin: 0px auto;">
          <div class="col-sm">
            <p style="text-align: right;"><button type="button" class="btn btn-primary" id="submitreview">Submit</button></p>
          </div>
        </div>
    
      



    </div>
    
   
    
    <br>
    <br>
    <br>
    <br>
   
            <?php
            $id=$_GET['nomer'];
            $sql="SELECT jalan from biohotel where id_hotel='$id'";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();
            echo $row['jalan'];
            ?>
    
  </body>
  </html>