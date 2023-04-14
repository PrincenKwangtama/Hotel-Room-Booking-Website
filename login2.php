<?php
require_once 'connect.php';
$email=$_POST["email"];
$password=$_POST["password"];

$query="SELECT name_user,id_user,stat,email,password_user from _user where email = '$email' and password_user=md5('$password')";
$result=$conn -> query($query);
$a=$result -> fetch_assoc();
$temp="";

if($result -> num_rows >0)
{
    session_start();
    $_SESSION["id_user"]=$a["id_user"];
    $_SESSION["nama"]=$a["name_user"];
    $_SESSION["log"]=true;
    $temp.=$a['stat'];
}
else
{
    $temp.="gagal";
}
echo $temp;

?>