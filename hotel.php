<?php
require_once 'connect.php';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js">
    </script>
    <script>
    $(document).ready(function() {
        // $('#tabel').DataTable();
        $(document).on("click", ".hotel", function() {
            var temp = $(this).attr('id');

        });
        $("#namahotel").keyup(function() {
            var nama = $("#namahotel").val();
            $.ajax({
                type: "post",
                data: {
                    nama: nama
                },
                url: "carinamahotel.php",
                success: function(result) {
                    $("#shdata").html(result);
                },
                error: function() {
                    alert('Maaf, Server kami sedang Down');
                }
            });
        });
        $(function() {
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
        $('#carik').click(function() {
            var tujuan = $("#tujuan").val();
            var bintang = $("#bintang").val();
            var hargamin = $("#min").val();
            var hargamax = $("#max").val();
            $.ajax({
                type: "post",
                data: {
                    tujuan: tujuan,
                    bintang: bintang,
                    hargamin: hargamin,
                    hargamax: hargamax
                },
                url: "buatshowhotel.php",
                success: function(result) {
                    $("#shdata").html(result);
                },
                error: function() {
                    alert('Maaf, Server kami sedang Down');
                }
            });

        });

    });
    </script>
    <title>Hotel</title>
    <style type="text/css">
    .fa option {

        font-weight: 900;
    }

    #link {
        text-decoration: none;
        color: black;
    }

    .hotel:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    div.sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 1;
    }

    .checked {
        color: orange;
    }

    .button {

        font-size: 24px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #4CAF50;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
    }

    .button:hover {
        background-color: #3e8e41
    }

    .button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }

    .hotel {
        transition: transform .2s;
        /* Animation */
        margin: 0 auto;
    }

    .hotel:hover {
        transform: scale(1.1);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }

    
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color:Snow">
        <em><a class="navbar-brand" href="#" id="time"></a></em>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" id="bar">
                <?php
                    $temp="";
                    $kota=$_GET['kota'];
                    if(isset($_SESSION["id_user"]))
                    {
                        $temp.='<li class="nav-item active" ><a class="nav-link active" href="">
                        <h5> Hello '.$_SESSION["nama"].'</h5> <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item " ><a class="nav-link " href="history.php?kota='.$kota.'">
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
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="singapore-246836_1920.jpg" class="d-block w-100" alt="..." style="height: 450px;">
            </div>
            <div class="carousel-item">
                <img src="skyline-255116_1920.jpg" class="d-block w-100" alt="..." style="height: 450px;">
            </div>
            <div class="carousel-item">
                <img src="the-palm-962785_1920.jpg" class="d-block w-100" alt="..." style="height: 450px;">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
    <div class="sticky">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 10px;">
            <a class="navbar-brand" href="#">Hotel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color:snow;">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Home <span class="sr-only">(current)</span></a>
                    </li>


                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                        id="namahotel" placeholder="Nama Hotel">

                </form>
            </div>
        </nav>
    </div>

    <div class="" style="margin-left: 32px;background-color:white;width: 80%;margin: 0px auto;">
        <div class="row">
            <div class="col-sm-3">
                <div class="card" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tujuan</label>
                                    <select class="form-control" id="tujuan">
                                        <option value="NULL"></option>
                                        <?php
                  $sql="SELECT DISTINCT(kota) from biohotel";
                  $result=$conn->query($sql);
                  while($row = $result->fetch_assoc()) {
                    echo "<option>".$row["kota"]."</option>";
                  }
                  ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Bintang</label>
                                    <select class="form-control fa" id="bintang">
                                        <option value="0"></option>
                                        <option class="fa fa-star" style="color: gold;" value="1"> &#xf005; </option>
                                        <option class="fa fa-star" style="color: gold;" value="2"> &#xf005; &#xf005;
                                        </option>
                                        <option class="fa fa-star" style="color: gold;" value="3"> &#xf005; &#xf005;
                                            &#xf005; </option>
                                        <option class="fa fa-star" style="color: gold;" value="4"> &#xf005; &#xf005;
                                            &#xf005; &#xf005; </option>
                                        <option class="fa fa-star" style="color: gold;" value="5"> &#xf005; &#xf005;
                                            &#xf005; &#xf005; &#xf005; </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Harga Min</label>
                                    <input type="number" class="form-control" placeholder="" id="min" min="0">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Harga Max</label>
                                    <input type="number" class="form-control" placeholder="" id="max" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p style="text-align: center;"><button type="button" class="btn btn-primary button"
                                        style="margin:0px auto" id="carik">Search</button></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9" id="shdata">

                <?php
            $kota=$_GET['kota'];
            $iduser=$_SESSION['id_user'];
            $sql="SELECT id_hotel,nama_hotel,kota,bintang,link,jalan,harga
            from biohotel where kota='$kota'";
            $result=$conn -> query($sql);
            $hasil="<div class='row'>"."<div class='col'>";
            $i=1;
            while($row = $result->fetch_assoc()) {
              $id=$row['id_hotel'];
              if($row['bintang']==1){
                if($i==1){
                  $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star '></i>"."<i class='fa fa-star '></i>"."<i class='fa fa-star ' ></i>"."<i class='fa fa-star '></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
                  $hasil.="</div>";
                  $i++;
                }
                else if($i==2){
                  $hasil.="<div class='col'>";
                    $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star' ></i>"."<i class='fa fa-star' ></i>"."<i class='fa fa-star' ></i>"."<i class='fa fa-star' ></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
                  $hasil.="</div>";
                  $hasil.="<div class='col'>";
                  $i++;
                }
                else if($i==3){
                  $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star' ></i>"."<i class='fa fa-star' ></i>"."<i class='fa fa-star' ></i>"."<i class='fa fa-star' ></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
                  $hasil.="</div>"."</div>";
                  $hasil.="<div class='row'>"."<div class='col'>";
                  $i=1;
                }
               
              }
              else if($row['bintang']==2){
                if($i==1){
                  $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star''></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
                  $hasil.="</div>";
                  $i++;
                }
                else if($i==2){
                  $hasil.="<div class='col'>";
                    $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
                  $hasil.="</div>";
                  $hasil.="<div class='col'>";
                  $i++;
                }
                else if($i==3){
                  $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
                  $hasil.="</div>"."</div>";
                  $hasil.="<div class='row'>"."<div class='col'>";
                  $i=1;
                }
             }
              else if($row['bintang']==3){
                if($i==1){
                  $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
                  $hasil.="</div>";
                  $i++;
                }
                else if($i==2){
                  $hasil.="<div class='col'>";
                    $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
                  $hasil.="</div>";
                  $hasil.="<div class='col'>";
                  $i++;
                }
                else if($i==3){
                  $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star checked' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
                  $hasil.="</div>"."</div>";
                  $hasil.="<div class='row'>"."<div class='col'>";
                  $i=1;
                }
              }
              else if($row['bintang']==4){
                if($i==1){
                  $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
                  $hasil.="</div>";
                  $i++;
                }
                else if($i==2){
                  $hasil.="<div class='col'>";
                    $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
                  $hasil.="</div>";
                  $hasil.="<div class='col'>";
                  $i++;
                }
                else if($i==3){
                  $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
                  $hasil.="</div>"."</div>";
                  $hasil.="<div class='row'>"."<div class='col'>";
                  $i=1;
                }
                }
              else if($row['bintang']==5){
                if($i==1){
                  $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
                  $hasil.="</div>";
                  $i++;
                }
                else if($i==2){
                  $hasil.="<div class='col'>";
                    $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
                  $hasil.="</div>";
                  $hasil.="<div class='col'>";
                  $i++;
                }
                else if($i==3){
                  $hasil.= "<a href='roomhotel.php?nomer=$id&kota=$kota' id='link'>"."<div onclick class='hotel' id='$id' style='border-radius: 25px;border: 2px solid lightgray;padding: 10px;margin-bottom: 10px;padding: 0px;'>"."<div onclick class='row'>"."<div class='col'>"."<img src='".$row['link']."' style='width: 100%;height: 100%;border-top-left-radius: 22px;border-top-right-radius: 22px;'></img>"."</div>"."</div>"."<div class='row'>"."<div class='col-sm-12' style='margin-left: 10px;'>"."<br>"."<i class='fa fa-building' aria-hidden='true'></i> ".$row['nama_hotel']."<br>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<i class='fa fa-star' style='color: gold;'></i>"."<br>"."<i class='fa fa-road' aria-hidden='true'></i> ".$row['jalan']."<br>"."<i class='fa fa-map-marker' aria-hidden='true'></i> ".$row['kota']."<br>"."<p class='text-monospace' style='text-align: right;font-family: Gotham-Black;margin-right: 20px;' >IDR ".$row['harga']."<br>"."<span style='font-size: small;'>"."per kamar per malam"."</span>"."</p>"."</div>"."</div>"."</div>"."</a>";
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
            </div>
        </div>
    </div>

</body>

</html>