<?php
    $dbcon = mysqli_connect("localhost","root","poppom22936","study") or die(mysqli_error());
    if (mysqli_connect_error()){
        echo"ไม่สามารถติดต่อฐานข้อมูลได้";
    }
    mysqli_set_charset($dbcon,'utf8');

    $login_username = $_POST['username'];
    $login_password = $_POST['password'];
    $login_email = $_POST['email'];

    $salt = "tercuyh565niuppoi250opi,yfcwtrbyiniu";
   $hash_login_password = hash_hmac('sha256',$login_password,$salt);

   $query = "INSERT INTO tb_login (login_username,login_password,lodin_email,login_status) VALUES ('$login_username','$hash_login_password','$login_email',1)";
   $result = mysqli_query($dbcon,$query);
   echo $query;
        header("Location:fb_login.php");
?>