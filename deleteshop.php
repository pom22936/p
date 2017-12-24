<?php 
$dbcon = mysqli_connect("localhost","root","poppom22936","study") or die(mysqli_error());
if (mysqli_connect_error()){
    echo"ไม่สามารถติดต่อฐานข้อมูลได้";
}
        mysqli_set_charset($dbcon,'utf8');
        $shopID = $_GET['shopID'];
        $qu = "DELETE FROM image WHERE shopID='$shopID'";
        $re = mysqli_query($dbcon,$qu);
        $q ="DELETE FROM shop WHERE shopID='$shopID'";
        $res = mysqli_query($dbcon,$q);
        $message = "delete OK";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location:main_login.php");
?>