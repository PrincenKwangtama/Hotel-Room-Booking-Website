<?php
require_once 'connect.php';
session_start();
if(isset($_SESSION["id_user"]))
{
  if($_SESSION["id_user"]==1 )
  {
    header("location: admin.php");
  }
}

?>
<html>

<head>
    <title>History</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
    .navbar {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    h2 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .table {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
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
                    if(isset($_SESSION["id_user"]))
                    {
                        $temp.='<li class="nav-item active" ><a class="nav-link active" href="">
                        <h5> Hello '.$_SESSION["nama"].'</h5> <span class="sr-only">(current)</span></a>
                    </li><li class="nav-item " ><a class="nav-link " href="login.php">
                       Home <span class="sr-only">(current)</span></a>
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
    <div class="container" style="padding-top:30px;">
        <div class="row">
            <div class="col-12 text-center">
                <h2>History</h2>
            </div>
        </div>
    </div>


    <div class="container table-responsive rounded-lg " style="padding-top:20px;">
        <div class="col-sm-12">
            <table class="table  table-striped table-hover rounded-lg ">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Hotel</th>
                        <th scope="col">Check in</th>
                        <th scope="col">Check out</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                $quer="SELECT a.id_hotel,b.check_in,b.check_out,b.total,a.nama_hotel from _user c join
                transaksi b on c.id_user = b.id_user join kamar d on b.id_kamar=d.id_kamar
                join biohotel a on d.id_hotel=a.id_hotel
                where c.id_user ='$_SESSION[id_user]'";
                $result = $conn -> query($quer);
                $temp="";
                $i=1;
                while($row= $result->fetch_assoc())
                {
                    $temp.="<tr><td>".$i."</td><td>".$row["nama_hotel"]."</td><td>".$row["check_in"].
                    "</td><td>".$row["check_out"]."</td><td>".$row["total"]."</td></tr>";
                    $i++;
                }
                echo $temp;
                ?>
                </tbody>
            </table>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
                integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
                crossorigin="anonymous"></script>

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
            $(document).ready(function() {

            })
            </script>


</body>

</html>