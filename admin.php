<?php
require_once 'connect.php';
session_start();
if(isset($_SESSION["id_user"]))
{
  if($_SESSION["id_user"] != 1)
  {
    // header("location: logout.php");
  }
}
else{
    header("location:login.php");
}
?>
<html>
    <head>
        <title>Admin</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
       <style type="text/css">
        .navbar {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            }
            .card{
                display:none;
            }
            #update{
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            }
            #add{
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            }
            .card{
                box-shadow: 0 10px 20px 5px rgba(0,0,0,0.2);
            }
       </style>

    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <em><a class="navbar-brand" href="#" id="time"></a> </em>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div  class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto" id="bar">
                <?php

                    $temp="";
                    if(isset($_SESSION["id_user"]))
                    {
                        $temp.='<li class="nav-item active" style="margin:0px auto;"><a class="nav-link">
                       <h5> Hello '.$_SESSION["nama"].'</h5> <span class="sr-only">(current)</span></a>
                   </li>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php" >Logout <span class="sr-only">(current)</span></a>
                   </li>';

                    } 
                    echo $temp;
                ?>
                  

                </ul>
                </div>
            </div>
          </nav>

        <div class="container" style="padding-top:20px;"> 
            <div class="row justify-content">
                <div class="col-12 col-sm-6" >
                    <button id="update" type="button" class="btn btn-outline-dark btn-lg"role="button" aria-pressed="true" style="float:right;">Update</button>
                </div>
                <div class="col-12 col-sm-6" >
                    <button id="add" type="button" class="btn btn-outline-danger btn-lg"role="button" aria-pressed="true">Add hotel</button>
                </div>
            </div>
        </div>
        

        <div class="container" style="padding-top:20px;">
            <div class="row">
                <div class="col-12">

                    <!-- update -->
                    <div class="card  w-50" style="margin:0px auto;" id="cardupdate">
                        <div class="card-header text-center rounded-lg" style="color:white;background-color:black;">
                            <h5>Update</h5>
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                            
                                <label class="col-12 col-sm-4 col-form-label" for="selecthotel">Hotel :</label>

                                <div class="col-12 col-sm-6">
                                <select class="form-control" id="selecthotel" >
                                <?php
                               
                                $temp="";
                                $select="SELECT id_hotel,nama_hotel,kota from biohotel ";
                                $result=$conn -> query($select);
                                
                                while($a = $result -> fetch_assoc())
                                {
                                
                                $temp.="<option value=".$a["id_hotel"].">".$a["nama_hotel"]." - ".$a["kota"]."</option>";
                                }
                                echo $temp;

                                ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kota" class="col-12 col-sm-4 col-form-label">Kota :</label>
                                <div class="col-12 col-sm-5">
                                <select class="form-control" id="kota" >
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
                                    <option value="Makasar">Makasar</option>
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
                                    <option value="Yogyakarta">Yogyakarta</option>
                                </select>
                                <small  class="text-muted">
                                    Pilih kembali
                                </small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="nama" class="col-12 col-sm-4 col-form-label">Nama Hotel :</label>
                                <div class="col-12 col-sm-6">
                                     <input type="text" class="form-control" id="nama" placeholder="Nama Hotel">
                                     <small  class="text-muted">
                                    Jika perlu di ralat
                                     </small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="linkrev" class="col-12 col-sm-4 col-form-label">Link Address :</label>
                                <div class="col-12 col-sm-6">
                                     <input type="text" class="form-control" id="linkrev" placeholder="Link Address">
                                     <small  class="text-muted">
                                    Jika perlu di ralat
                                     </small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="alamat" class="col-12 col-sm-4 col-form-label">Address :</label>
                                <div class="col-12 col-sm-6">
                                     <input type="text" class="form-control" id="alamat" placeholder="Address">
                                     <small  class="text-muted">
                                    Jika perlu di ralat
                                     </small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="alamat" class="col-12 col-sm-4 col-form-label">No telp :</label>
                                <div class="col-12 col-sm-6">
                                     <input type="text" class="form-control" id="uptelp" placeholder="No telp 12-digit">
                                     <small  class="text-muted">
                                    Jika perlu di ralat
                                     </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bintang" class="col-12 col-sm-4 col-form-label">Bintang :</label>
                                <div class="col-12 col-sm-5">
                                <select class="form-control" id="bintang" >
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="harga" class="col-12 col-sm-4 col-form-label">Harga :</label>
                                <div class="col-12 col-sm-6">
                                     <input type="number"min="0" class="form-control" id="harga" value="0" placeholder="Harga">
                                     <small  class="text-muted">
                                    Jika perlu di ralat
                                     </small>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right rounded-lg" style="color:white;background-color:black;">
                        <button id="updateready" type="button" class="btn btn-outline-danger btn-md"role="button" aria-pressed="true">Update</button>
                        </div>
                    </div>


                    <!-- add hotel -->
                    <div class="card  w-50" style="margin:0px auto;" id="cardadd">
                        <div class="card-header text-center rounded-lg" style="color:white;background-color:black;"> 
                            <h5>Add New Hotel </h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="kota" class="col-12 col-sm-4 col-form-label">Kota :</label>
                                <div class="col-12 col-sm-5">
                                <select class="form-control" id="kotabaru" >
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
                                    <option value="Makasar">Makasar</option>
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
                                    <option value="Yogyakarta">Yogyakarta</option>
                                </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="nama" class="col-12 col-sm-4 col-form-label">Nama Hotel :</label>
                                <div class="col-12 col-sm-6">
                                     <input type="text" class="form-control" id="namahotelbaru" placeholder="Address">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="alamat" class="col-12 col-sm-4 col-form-label">Address :</label>
                                <div class="col-12 col-sm-6">
                                     <input type="text" class="form-control" id="alamatbaru" placeholder="Address">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="link" class="col-12 col-sm-4 col-form-label">Link Address :</label>
                                <div class="col-12 col-sm-6">
                                     <input type="text" class="form-control" id="link" placeholder="Address">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="telp" class="col-12 col-sm-4 col-form-label">No telp:</label>
                                <div class="col-12 col-sm-6">
                                     <input type="text" class="form-control" id="telp" placeholder="No telp 12-digit">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bintang" class="col-12 col-sm-4 col-form-label">Bintang :</label>
                                <div class="col-12 col-sm-5">
                                <select class="form-control" id="bintangbaru" >
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="harga" class="col-12 col-sm-4 col-form-label">Harga :</label>
                                <div class="col-12 col-sm-6">
                                     <input type="number"min="0" class="form-control" id="hargabaru" value="0" placeholder="Harga">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12 col-sm-6">
                                    <p style="color:red" id="salah"></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right rounded-lg" style="color:white;background-color:black;">
                        <button id="addready"type="button" class="btn btn-outline-danger btn-md"role="button" aria-pressed="true">Add</button>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
                              
        <!-- modal gambar -->
        <div class="modal fade rounded-lg" id="imagesmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header" style="background-color:black">
                    <h5 class="modal-title" id="staticBackdropLabel" style="color:white;">Add image</h5>
                    <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body ">
                <form>
                    <div class="form-group row">
                            <label for="emailL" class="col-12 col-sm-4 col-form-label">Cover hotel</label>
                            <div class="col-12 col-sm-6">
                            <input type="file" class="form-control-file" id="o1">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="emailL" class="col-12 col-sm-4 col-form-label">Map</label>
                            <div class="col-12 col-sm-6">
                            <input type="file" class="form-control-file" id="o2">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="emailL" class="col-12 col-sm-4 col-form-label">Overview 1</label>
                            <div class="col-12 col-sm-6">
                            <input type="file" class="form-control-file" id="o3">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="emailL" class="col-12 col-sm-4 col-form-label">Overview 2</label>
                            <div class="col-12 col-sm-6">
                            <input type="file" class="form-control-file" id="o4">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="emailL" class="col-12 col-sm-4 col-form-label">Overview 3</label>
                            <div class="col-12 col-sm-6">
                            <input type="file" class="form-control-file" id="o5">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="emailL" class="col-12 col-sm-4 col-form-label">Overview 4</label>
                            <div class="col-12 col-sm-6">
                            <input type="file" class="form-control-file" id="o6">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="emailL" class="col-12 col-sm-4 col-form-label">Overview 5</label>
                            <div class="col-12 col-sm-6">
                            <input type="file" class="form-control-file" id="o7">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="emailL" class="col-12 col-sm-4 col-form-label">Kamar Standart</label>
                            <div class="col-12 col-sm-6">
                            <input type="file" class="form-control-file" id="o8">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="emailL" class="col-12 col-sm-4 col-form-label">Kamar Upsize</label>
                            <div class="col-12 col-sm-6">
                            <input type="file" class="form-control-file" id="o9">
                            </div>
                    </div>
                    <div class="from-group row ">
                        <div class="col-12 col-sm-12">
                            <div style="float:right;" >
                                 <button type="button" class="btn btn-primary" id="addimg">Add images</button>
                            </div>
                        </div>
                    </div>
                    <div class="from-group row ">
                        <div class="col-12 col-sm-12 " >
                          <p id="con1" class="text-danger"></p>
                        </div>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
            
            
          <script>

          $(document).ready(function(){
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
            $("#t").click(function(){
                $("#imagesmodal").modal("show");
            })
            $("#update").click(function(){
                $("#cardadd").hide(500);
                $("#cardupdate").show(1000);
            });
            $("#add").click(function(){
                $("#cardupdate").hide(500);
                $("#cardadd").show(1000);
            });
            $("#updateready").click(function(){
                var id=$("#selecthotel").val();
                var kota=$("#kota").val();
                var alamat=$("#alamat").val();
                var bintang=$("#bintang").val();
                var harga=$("#harga").val();
                var nama=$("#nama").val();
                var link=$("#linkrev").val();
                var telp=$("#uptelp").val();
                var har=false;
                var ctelp=false;
                if($.isNumeric(telp))
                {
                    var b=telp;
                    var i= b.toString().length;
                    if(i==12)
                    {
                        ctelp=true;
                    }
                }
                if(harga>-1)
                {
                    har=true;
                }
                if(ctelp==false)
                {
                    alert("Format telp salah");
                }
                if(har==true && ctelp==true)
                {
                    $.ajax({
                        type:"POST",
                        url:"update.php",
                        data:{id:id,alamat:alamat,kota:kota,bintang:bintang,harga:harga,nama:nama,link:link,telp:telp},
                        success: function(result)
                        {
                            // if(result=="true")
                            // {
                            //     alert("Berhasil di update!");
                            // }
                            if(result=="gagal")
                            alert("Hotel, alamat dan kota sudah ada / sama");
                            else{
                                alert(result);
                            $("#linkrev").val("");
                            $("#alamat").val("");
                            $("#harga").val("");
                            $("#nama").val("");
                            $("#uptelp").val("");
                            $("#cardupdate").hide(500);
                            }
                        },
                        error: function () 
                        {
                            alert('Ada kesalahan');
                        }
                    });
                }
                else
                {
                    if(ctelp!=false)
                    alert("Harga harus numeric tidak boleh kurang dari 0!");
                }
            });
            $("#addready").click(function(){
                var kota=$("#kotabaru").val();
                var namahotel=$("#namahotelbaru").val();
                var alamathotel=$("#alamatbaru").val();
                var bintang=$("#bintangbaru").val();
                var hargaa=$("#hargabaru").val();
                var link=$("#link").val();
                var telp=$("#telp").val();
                var ctelp=false;
                if($.isNumeric(telp))
                {
                    var b=telp;
                    var i= b.toString().length;
                    if(i==12)
                    {
                        ctelp=true;
                    }
                }
                var nama=false;
                var alamat=false;
                var harga=false;
                var links=false;
                var temp="";
                if(namahotel!="")
                {
                    nama=true;
                    
                }
                else{
                    temp+="Nama Hotel belom terisi<br>";
                }
                if(alamathotel!="")
                {
                    alamat=true;
                   
                }
                else{
                    temp+="Alamat Hotel belom terisi<br>";
                }
                if(hargaa>0)
                {
                    harga=true;
                   
                }
                else
                {
                    temp+="Harga Tidak boleh 0 atau kurang<br>";
                }
                if(link!="")
                {
                    links=true;
                }
                else
                {
                    temp+="Link tidak boleh kosong";
                }
                if(ctelp==false)
                {
                    temp+="Format telp salah!";
                }
                $("#salah").html(temp);
                if(nama==true && alamat==true &&harga==true && links==true && ctelp==true)
                {
                    $.ajax({
                        type:"POST",
                        url:"add.php",
                        data:{kota:kota,alamathotel:alamathotel,namahotel:namahotel,bintang:bintang,hargaa:hargaa,link:link,telp:telp},
                        success: function(result)
                        {

                           if(result=="gagal")
                           {
                            $("#salah").html("alamat di kota tersebut sudah ada hotel");
                           }
                           else
                           {
                            $("#link").val("");
                            $("#selecthotel").html(result);
                            $("#namahotelbaru").val("");
                            $("#alamatbaru").val("");
                            $("#hargabaru").val("");
                            $("#salah").html("");
                            $("#telp").val("");
                            $("#imagesmodal").modal("show");
                           }
                        
                        },
                        error: function () 
                        {
                            alert('Ada kesalahan');
                        }

                    });
                }

            });
            $("#addimg").click(function()
            {
                var b=1;
                var checkfile=true;
                var string="";
                for(var i=1;i<9 ;i++)
                {
                    for(var j=i+1;j<10 ;j++)
                    {
                        if($("#o"+i).val()==$("#o"+j).val())
                        {
                            checkfile=false;
                        }
                    }
                }
                if(checkfile==true)
                {
                    var formData=[];
                    for(var i=0;i<9;i++)
                    {
                        formData[i]=new FormData();
                    }
                    formData[0].append('cover', $('#o1')[0].files[0]);
                    formData[1].append('map', $('#o2')[0].files[0]);
                    formData[2].append('o1', $('#o3')[0].files[0]);
                    formData[3].append('o2', $('#o4')[0].files[0]);
                    formData[4].append('o3', $('#o5')[0].files[0]);
                    formData[5].append('o4', $('#o6')[0].files[0]);
                    formData[6].append('o5', $('#o7')[0].files[0]);
                    formData[7].append('ks', $('#o8')[0].files[0]);
                    formData[8].append('ku', $('#o9')[0].files[0]);
                    
                    for(var i=0;i<9;i++){
                    $.ajax({
                          url : 'addimg.php',
                          type : 'POST',
                          data : formData[i],
                          processData: false,  // tell jQuery not to process the data
                          contentType: false,  // tell jQuery not to set contentType
                          success : function(result) 
                            {
                                if(result==0)
                                {
                                    $("#con1").append("File salah atau kosong");
                                }
                                else
                                {
                                    b++;
                                    if(b==10)
                                    {
                                        $("#imagesmodal").modal("hide");
                                        $("#con1").html("");
                                        for(var i=1;i<10 ;i++)
                                        {
                                            $("#o"+1).val("");
                                        }
                                        $("#cardadd").hide(500);
                                    }
                                }
                            },
                            error: function () 
                            {
                                alert('Ada kesalahan');
                            }
                        });
                    }
                    if(b==10)
                   {
                     $("#imagesmodal").modal("hide");
                   }
                    
                }
                else
                {
                   $("#con1").html("File ada yang kembar tolong di ulangi");
                }
           
          });
        });
        
          </script>  

    </body>
</html>