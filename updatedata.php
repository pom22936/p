<?php 
$dbcon = mysqli_connect("localhost","root","poppom22936","study") or die(mysqli_error());
if (mysqli_connect_error()){
    echo"ไม่สามารถติดต่อฐานข้อมูลได้";
}
mysqli_set_charset($dbcon,'utf8');
$shopID = $_POST['shopID'];
$name = $_POST['name'];
    $detail = $_POST['detail'];
    $type= $_POST['type'];
    $location = $_POST['location'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $opt = $_POST['opt'];
    $edt = $_POST['edt'];
    $tel = $_POST['tel'];
    $web = $_POST['web'];

    $q="UPDATE `shop` SET `shopname`='$name',`shoptype`='$type',`shopdetail`='$detail',`shoplocation`='$location',`shoplat`='$lat',`shoplng`='$lng',`opt`='$opt',`edt`='$edt',`tel`='$tel',`web`='$web' WHERE shopID='$shopID'";
    $re = mysqli_query($dbcon,$q);
    header("Location:main_login.php");
?>