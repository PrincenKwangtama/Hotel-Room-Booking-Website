<?php
session_start();

if(isset($_SESSION["stat"]))
{
  if($_SESSION["stat"] == 0 )
  {
    header("location: admin.php");
  }
}

?>
<html>

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="getLocation.js"></script>

    <style type="text/css">
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        height: 250px;
        transition: .5s ease;
        backface-visibility: hidden;
        transition: transform .2s;
        /* Animation */

    }

    .card-img-overlay {
        color: #f1f1f1;
        width: 100%;
        transition: .5s ease;
        opacity: 0;
    }


    .card:hover {
        box-shadow: 0 10px 16px 0;
        opacity: 0.8;
        transform: scale(1.1);
    }

    .card-img-overlay:hover {
        opacity: 1;
    }

    .card-img {
        height: 100%;
    }

    .modal {
        box-shadow: 0 10px 20px 5px rgba(0, 0, 0, 0.2);
    }

    .card-title {
        color: white;
        mix-blend-mode: difference;
    }

    .carousel-caption {
        color: white;
        mix-blend-mode: difference;
    }

    .zoom {
        transition: transform .7s;
    }

    .zoom:hover {
        transform: scale(1.1);
    }

    .dark {
        transition: transform .5s;

    }

    .dark:hover {
        background-color: rgba(0, 0, 0, 0.5);
        box-shadow: 10px 10px 10px 1000px rgba(0, 0, 0, 0.5);
    }
    </style>

</head>

<body style="background-color:Snow">

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
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/NginApp.jpg" class="d-block w-100 img-fluid" alt="Responsive image"
                    style="width:100%;height:400px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>WELCOME</h5>
                    <p>Selamat datang ke website kami.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/surabaya2.jpg" class="d-block w-100 img-fluid" alt="Responsive image"
                    style="width:100%;height:400px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Surabaya</h5>
                    <p>Ibu kota dari provinsi Jawa Timur, di kenal sebagai kota pahlawan.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/medan1.jpg" class="d-block w-100 img-fluid" alt="Responsive image"
                    style="width:100%;height:400px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Medan</h5>
                    <p>Kota terbesar ke 2 di Indonesia, dikenal dengan keberagamannya. </p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
    <!-- <div class="container-fluid">
              <div class="row" style=" box-shadow: 5px 15px 15px 10px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                  <div class="col-12" style="padding:0px;">
                      <img src="hotel-1725150_1280.jpg" class="img-fluid" alt="Responsive image"style="width:100%;height:400px;">
                </div>
              </div> -->
    </div>
    <formm>
        <div class="container" style="padding-top:30px;">
            <div class="form-group row">

                <div class="col-12 col-sm-2">
                    <select class="form-control  form-control-sm " id="cari">
                        <option value="Kota Sekarang">Kota Sekarang</option>
                        <option value="Ambon">Ambon</option>
                        <option value="Bali">Bali</option>
                        <option value="Balikpapan">Balikpapan</option>
                        <option value="Banda Aceh">Banda Aceh</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Banjar">Banjar</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Banjarmasin">Banjarmasin</option>
                        <option value="Batam">Batam</option>
                        <option value="Batu">Batu</option>
                        <option value="Bekasi">Bekasi</option>
                        <option value="Blitar">Blitar</option>
                        <option value="Bogor">Bogor</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Jayapura">Jayapura</option>
                        <option value="Jember">Jember</option>
                        <option value="Lombok">Lombok</option>
                        <option value="Bangka">bangka</option>
                        <option value="Malang">Malang</option>
                        <option value="Medan">Medan</option>
                        <option value="Manado">Manado</option>
                        <option value="Pekanbaru">Pekanbaru</option>
                        <option value="Palangkaraya">Palangkaraya</option>
                        <option value="Pontianak">Pontianak</option>
                        <option value="Salatiga">Salatiga</option>
                        <option value="Samarinda">Samarinda</option>
                        <option value="Semarang">Semarang</option>
                        <option value="Surabaya">Surabaya</option>
                        <option value="Yogyakarta">Jogjakarta</option>
                    </select>
                </div>
                <div class="col-12 col-sm-8">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="search">Search</button>
                </div>
                <?php echo $_COOKIE["location"]?>

            </div>
        </div>
        </form>

        <div class="container" style="padding-top:10px;padding-bottom:20px;">
            <div class="row align-items-center" style="padding-bottom:30px;">
                <div class="col-12 col-sm-6 col-md-3 dark zoom" style="padding-top:10px;">
                    <div class="card bg-dark text-white test" onclick id="surabaya">
                        <img src="assets/surabaya2.jpg" class="card-img img-fluid">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Surabaya</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 dark zoom" style="padding-top:10px;">
                    <div class="card bg-dark text-white test" onclick id="jakarta">
                        <img src="assets/jakarta.jpg" class="card-img img-fluid">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Jakarta</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 dark zoom" style="padding-top:10px;">
                    <div class="card bg-dark text-white test" onclick id="yogyakarta">
                        <img src="assets/jogja.jpg" class="card-img img-fluid">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Yogyakarta</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 dark zoom" style="padding-top:10px;">
                    <div class="card bg-dark text-white test" onclick id="bali">
                        <img src="assets/bali.jpg" class="card-img img-fluid">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Bali</h5>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row align-items-center" style="padding-bottom:30px;">
                <div class="col-12 col-sm-6 col-md-3 dark zoom" style="padding-top:10px;">
                    <div class="card bg-dark text-white test" onclick id="lombok">
                        <img src="assets/lombok.jpg" class="card-img img-fluid">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Lombok</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 dark zoom" style="padding-top:10px;">
                    <div class="card bg-dark text-white test" onclick id="bangka">
                        <img src="assets/bangka.jpg" class="card-img img-fluid">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Bangka Belitung</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 dark zoom" style="padding-top:10px;">
                    <div class="card bg-dark text-white test " onclick id="manado">
                        <img src="assets/manado.jpg" class="card-img img-fluid">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Manado</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 dark zoom" style="padding-top:10px;">
                    <div class="card bg-dark text-white test " onclick id="medan">
                        <img src="assets/medan1.jpg" class="card-img img-fluid">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Medan</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- modal sign -->
        <div class="modal fade" id="signmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:black">
                        <h5 class="modal-title" id="staticBackdropLabel" style="color:white;">Sign In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cls()"
                            style="color:white;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <form>
                            <div class="form-group row">
                                <label for="nama" class="col-12 col-sm-2 col-form-label">Name: </label>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" id="nama" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-12 col-sm-2 col-form-label">Address: </label>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" id="alamat" placeholder="Address">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telp" class="col-12 col-sm-2 col-form-label">Telp:</label>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" id="telp" placeholder="No telp">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-12 col-sm-2 col-form-label">Email:</label>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control" id="email" placeholder="Email" require>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-12 col-sm-2 col-form-label">Password:</label>
                                <div class="col-12 col-sm-6">
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="from-group row ">
                                <div class="col-12 col-sm-6 ">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div style="float:right;">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            onclick="cls()">Close</button>
                                        <button type="button" class="btn btn-primary" id="confirm">Sign up</button>
                                    </div>
                                </div>
                            </div>
                            <div class="from-group row ">
                                <div class="col-12 col-sm-12 ">
                                    <a href="#" id="a" data-dismiss="modal">login?</a>
                                </div>
                            </div>
                            <div class="from-group row ">
                                <div class="col-12 col-sm-12 ">
                                    <p id="con" class="text-danger"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- log -->
        <div class="modal fade" id="loginmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:black">
                        <h5 class="modal-title" id="staticBackdropLabel" style="color:white;">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cs()"
                            style="color:white;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <form>
                            <div class="form-group row">
                                <label for="emailL" class="col-12 col-sm-2 col-form-label">Email:</label>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control" id="emailL" placeholder="Email" require>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="passwordL" class="col-12 col-sm-2 col-form-label">Password:</label>
                                <div class="col-12 col-sm-6">
                                    <input type="password" class="form-control" id="passwordL" placeholder="Password">
                                </div>
                            </div>
                            <div class="from-group row ">
                                <div class="col-12 col-sm-6 ">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div style="float:right;">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            onclick="cs()">Close</button>
                                        <button type="button" class="btn btn-primary" id="log">Login</button>
                                    </div>
                                </div>
                            </div>
                            <div class="from-group row ">
                                <div class="col-12 col-sm-12 ">
                                    <p>create <a href="#" id="b" data-dismiss="modal">account?</a></p>
                                </div>
                            </div>
                            <div class="from-group row ">
                                <div class="col-12 col-sm-12 ">
                                    <p id="con1" class="text-danger"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- modal buat login dulu -->
        <div class="modal fade" id="dulu" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:black">
                        <h5 class="modal-title" id="staticBackdropLabel" style="color:white;">Warning</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cs()"
                            style="color:white;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <p>Login dulu</p>
                    </div>
                </div>
            </div>
        </div>

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

        <script>
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

        function cls() {
            $("#nama").val("");
            $("#alamat").val("");
            $("#telp").val("");
            $("#email").val("");
            $("#password").val("");
            $("#con").html(" ");
        }

        function cs() {
            $("#emailL").val("");
            $("#passwordL").val("");
        }
        // function logindulu()
        // {
        //     $("#dulu").modal('show');
        // }
        $(document).ready(function() {
            // $(document).on('click', '.scl', function () {
            //     alert("a");

            // });
            $("#search").click(function() {
                <?php
                if(isset($_SESSION["id_user"]))
                {
                    $id=$_SESSION['id_user'];
                }
                else{

                    $id=0;
                } 
                ?>
                var iduser = "<?php echo $id; ?>";
                var kota = $("#cari").val();
                if (kota == "Kota Sekarang") {
                    kota = "<?php echo $_COOKIE["location"]?>";
                }
                if (iduser > 0) {

                    window.location.href = 'hotel.php?kota=' + kota;
                } else {
                    $("#dulu").modal('show');
                }
            })
            $(".test").click(function() {
                <?php
                if(isset($_SESSION["id_user"]))
                {
                    $id=$_SESSION['id_user'];
                }
                else{

                    $id=0;
                } 
                ?>
                var iduser = "<?php echo $id; ?>";
                var kota = $(this).attr("id");
                // <?php $hasil = "document.writeln(kota);"; 
                //  $_SESSION["kota"]=$hasil;
                // ?>
                // var as="<?php echo $hasil; ?>";
                // alert(as);
                // $.post('hotel.php', {kota: kota});
                if (iduser > 0) {

                    window.location.href = 'hotel.php?kota=' + kota;
                } else {
                    $("#dulu").modal('show');
                }
            });

            $("#sign").click(function() {
                // alert("login");
                $("#signmodal").modal('show');
            });
            $("#login").click(function() {
                $("#loginmodal").modal('show');
            });
            $("#a").click(function() {
                $("#loginmodal").modal('show');
            });
            $("#b").click(function() {
                $("#signmodal").modal('show');
            });

            //sign in
            $("#confirm").click(function() {
                var ctelp = false;
                var cemail = false;

                var nama = $("#nama").val();
                var alamat = $("#alamat").val();
                var telp = $("#telp").val();
                var email = $("#email").val();
                var password = $("#password").val();

                if ($.isNumeric(telp)) {
                    var b = telp;
                    var i = b.toString().length;
                    if (i == 12) {
                        ctelp = true;
                    }
                }
                if (email.indexOf('@') > 0) {
                    cemail = true;
                }

                if (cemail == true && ctelp == true) {
                    //     alert(nama+" "+alamat+" "+telp+" "+email+" "+password);
                    $.ajax({
                        type: "POST",
                        url: "sign.php",
                        data: {
                            nama: nama,
                            alamat: alamat,
                            telp: telp,
                            email: email,
                            password: password
                        },
                        success: function(result) {
                            if (result == 0) {
                                $("#con").html("Email already register");
                                $("#email").val("");
                            } else {
                                $("#signmodal").modal('hide');
                                $("#nama").val("");
                                $("#alamat").val("");
                                $("#telp").val("");
                                $("#email").val("");
                                $("#password").val("");
                                $("#con").html(" ");
                                $("#loginmodal").modal('show');
                            }
                        },
                        error: function() {
                            alert('Ada kesalahan');
                        }
                    });
                } else {
                    // alert("Email / telp salah");
                    $("#con").html('Email / telp salah!');
                }

            });

            // login
            $("#log").click(function() {
                var email = $("#emailL").val();
                var password = $("#passwordL").val();
                $.ajax({
                    type: "POST",
                    url: "login2.php",
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(result) {
                        if (result == "gagal") {
                            $("#con1").html("Wrong password or email");
                        } else {
                            $("#loginmodal").modal('hide');
                            if (result == 0) {
                                window.location.href = 'admin.php';
                            } else {
                                window.location.href = 'login.php';
                            }

                        }

                    },
                    error: function() {
                        alert('Ada kesalahan');
                    }
                });
            });
        });
        </script>
</body>

</html>