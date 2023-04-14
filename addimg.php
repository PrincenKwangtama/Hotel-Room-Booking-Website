
<?php
require_once 'connect.php';   
session_start();
$temp=1;

if(isset($_FILES) &&  !empty($_FILES)){
    //cover
    if (isset($_FILES["cover"]) && !empty($_FILES["cover"]))
    {
        $file = $_FILES['cover'];
        $name = $file['name'];
        $path = $file['tmp_name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES['cover']['name']);
            
            // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            // Valid file extensions
        $uploadOk = 0;
        $extensions_arr = array("jpg","jpeg","png","gif");
        if (file_exists($target_file)) 
        {
        $temp= "Sorry,cover file".$name." already exists.";
        $uploadOk = 1;
        }

        // Check extension
        if( in_array($imageFileType,$extensions_arr) && $uploadOk == 0 )
        {
        // Upload file
        $namafile=$target_dir."cover".$_SESSION["id_hotel"].".".$imageFileType;
        move_uploaded_file($_FILES['cover']["tmp_name"],$namafile);
        
        $quer="UPDATE `biohotel`set link='$namafile' where id_hotel='$_SESSION[id_hotel]'" ;
        $result=$conn -> query ($quer);

        $temp=1;
        }   
        else{
            $temp=0;
        }  
    }


    // map
    if (isset($_FILES["map"]) && !empty($_FILES["map"]))
    {
        $file = $_FILES['map'];
        $name = $file['name'];
        $path = $file['tmp_name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES['map']['name']);
            
            // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 0;
            // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        if (file_exists($target_file)) 
        {
            $temp= "Sorry,map file".$name." already exists.";
            $uploadOk = 1;
        }

        // Check extension
        if( in_array($imageFileType,$extensions_arr) && $uploadOk == 0)
        {
        // Upload file
        $namafile=$target_dir."map".$_SESSION["id_hotel"].".".$imageFileType;
        move_uploaded_file($_FILES['map']["tmp_name"],$namafile);
        $quer="UPDATE `biohotel`set Map='$namafile' where id_hotel='$_SESSION[id_hotel]'" ;
        $result=$conn -> query($quer);
        $temp=1;
        }   
        else{
            $temp=0;
        }  
    }



    // o1
    if (isset($_FILES["o1"]) && !empty($_FILES["o1"]))
    {
        $file = $_FILES['o1'];
        $name = $file['name'];
        $path = $file['tmp_name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES['o1']['name']);
            
            // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 0;
            // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        if (file_exists($target_file)) 
        {
            $temp= "Sorry,overview 1 file".$name." already exists.";
            $uploadOk = 1;
        }

        // Check extension
        if( in_array($imageFileType,$extensions_arr) && $uploadOk == 0 )
        {
        // Upload file
        $namafile=$target_dir."o1".$_SESSION["id_hotel"].".".$imageFileType;
        move_uploaded_file($_FILES['o1']["tmp_name"],$namafile);
        $temp=1;
        $quer="UPDATE `biohotel`set over_1='$namafile' where id_hotel='$_SESSION[id_hotel]'" ;
        $result=$conn -> query($quer);
        }   
        else{
            $temp=0;
        }  
    }



    // o2
    if (isset($_FILES["o2"]) && !empty($_FILES["o2"]))
    {
        $file = $_FILES['o2'];
        $name = $file['name'];
        $path = $file['tmp_name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES['o2']['name']);
            
            // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 0;
            // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        if (file_exists($target_file)) 
        {
            $temp= "Sorry,overview 2 file".$name." already exists.";
            $uploadOk = 1;
        }

        // Check extension
        if( in_array($imageFileType,$extensions_arr) && $uploadOk == 0 )
        {
        // Upload file
        $namafile=$target_dir."o2".$_SESSION["id_hotel"].".".$imageFileType;
        move_uploaded_file($_FILES['o2']["tmp_name"],$namafile);
        $temp=1;
        $quer="UPDATE `biohotel`set over_2='$namafile' where id_hotel='$_SESSION[id_hotel]'" ;
        $result=$conn-> query($quer);
        }   
        else{
            $temp=0;
        }  
    }



    // o3
    if (isset($_FILES["o3"]) && !empty($_FILES["o3"]))
    {
        $file = $_FILES['o3'];
        $name = $file['name'];
        $path = $file['tmp_name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES['o3']['name']);
            
            // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 0;
            // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        if (file_exists($target_file)) 
        {
            $temp= "Sorry,overview 3 file".$name." already exists.";
            $uploadOk = 1;
        }

        // Check extension
        if( in_array($imageFileType,$extensions_arr) && $uploadOk == 0 )
        {
        // Upload file
        $namafile=$target_dir."o3".$_SESSION["id_hotel"].".".$imageFileType;
        move_uploaded_file($_FILES['o3']["tmp_name"],$namafile);
        $temp=1;
        $quer="UPDATE `biohotel`set over_3='$namafile' where id_hotel='$_SESSION[id_hotel]'" ;
        $result=$conn-> query($quer);
        }   
        else{
            $temp=0;
        }  
    }


    //o4
    if (isset($_FILES["o4"]) && !empty($_FILES["o4"]))
    {
        $file = $_FILES['o4'];
        $name = $file['name'];
        $path = $file['tmp_name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES['o4']['name']);
            
            // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 0;
            // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        if (file_exists($target_file)) 
        {
            $temp= "Sorry, overview 4 file".$name." already exists.";
            $uploadOk = 1;
        }

        // Check extension
        if( in_array($imageFileType,$extensions_arr) && $uploadOk == 0 )
        {
        // Upload file
        $namafile=$target_dir."o4".$_SESSION["id_hotel"].".".$imageFileType;
        move_uploaded_file($_FILES['o4']["tmp_name"],$namafile);
        $temp=1;
        $quer="UPDATE `biohotel`set over_4='$namafile' where id_hotel='$_SESSION[id_hotel]'" ;
        $result=$conn->query($quer);
        }   
        else{
            $temp=0;
        }  
    }

    //  o5
    if (isset($_FILES["o5"]) && !empty($_FILES["o5"]))
    {
        $file = $_FILES['o5'];
        $name = $file['name'];
        $path = $file['tmp_name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES['o5']['name']);
            
            // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 0;
            // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        if (file_exists($target_file)) 
        {
            $temp= "Sorry,overview 5 file".$name." already exists.";
            $uploadOk = 1;
        }

        // Check extension
        if( in_array($imageFileType,$extensions_arr) && $uploadOk == 0 )
        {
        // Upload file
        $namafile=$target_dir."o5".$_SESSION["id_hotel"].".".$imageFileType;
        move_uploaded_file($_FILES['o5']["tmp_name"],$namafile);
        $temp=1;
        $quer="UPDATE `biohotel`set over_5='$namafile' where id_hotel='$_SESSION[id_hotel]'" ;
        $result=$conn->query($quer);
        }   
        else{
            $temp=0;
        }  
    }



    //ks
    if (isset($_FILES["ks"]) && !empty($_FILES["ks"]))
    {
        $file = $_FILES['ks'];
        $name = $file['name'];
        $path = $file['tmp_name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES['ks']['name']);
            
            // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 0;
            // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        if (file_exists($target_file)) 
        {
            $temp= "Sorry, kamar standard file".$name." already exists.";
            $uploadOk = 1;
        }

        // Check extension
        if( in_array($imageFileType,$extensions_arr) && $uploadOk == 0 )
        {
        // Upload file
        $namafile=$target_dir."ks".$_SESSION["id_hotel"].".".$imageFileType;
        move_uploaded_file($_FILES['ks']["tmp_name"],$namafile);
        $temp=1;
        $quer="UPDATE `biohotel`set kamar_standart='$namafile' where id_hotel='$_SESSION[id_hotel]'" ;
        $result=$conn->query($quer);
        }   
        else{
            $temp=0;
        }  
    }



    // ku
    if (isset($_FILES["ku"]) && !empty($_FILES["ku"]))
    {
        $file = $_FILES['ku'];
        $name = $file['name'];
        $path = $file['tmp_name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES['ku']['name']);
            
            // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 0;
            // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        if (file_exists($target_file)) 
        {
        $temp= "Sorry,kamar upsize file".$name." already exists.";
        $uploadOk = 1;
        }

        // Check extension
        if(in_array($imageFileType,$extensions_arr) && $uploadOk == 0 )
        {
        // Upload file
        $namafile=$target_dir."ku".$_SESSION["id_hotel"].".".$imageFileType;
        move_uploaded_file($_FILES['ku']["tmp_name"],$namafile);
        $temp=1;
        $quer="UPDATE `biohotel`set kamar_upsize='$namafile' where id_hotel='$_SESSION[id_hotel]'" ;
        $result=$conn->query($quer);
        } 
        else{
            $temp=0;
        }  
    }
}
else{
    $temp=0;
}
                    
    echo $temp;                
                    
                    
?>