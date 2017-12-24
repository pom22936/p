<?php 
$host ='localhost';
$user = 'root';
$pass ='poppom22936';
$dbname ='study';
$con = mysqli_connect($host,$user,$pass,$dbname);
mysqli_set_charset($con,"utf8");

$srtquery = 'SELECT * FROM `shop` Where shoptype="ของหวาน"';
$result = mysqli_query($con,$srtquery);


    session_start();
    if(!isset($_SESSION['login_id'])){
        header("Location : index.php");
    }
    $dbcon = mysqli_connect("localhost","root","poppom22936","study") or die(mysqli_error());
    if (mysqli_connect_error()){
        echo"ไม่สามารถติดต่อฐานข้อมูลได้";
    }
    mysqli_set_charset($dbcon,'utf8');
    $session_login_id = $_SESSION['login_id'];

    $qre_user = "SELECT * FROM tb_login WHERE login_id='$session_login_id'";
    $result_user = mysqli_query($dbcon,$qre_user);
    if($result_user){
        $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
        $s_login_username = $row_user['login_username'];
        $s_login_email = $row_user['lodin_email'];
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>map v3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBil-dACyKcpUg6N5vfajnyLtFNaQpVIus&callback=myMap"></script>
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
            crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.css">


        <script>
            
            function saveLocation(){

                var lat=$("#lat").val();
                var lng=$("#lng").val();
                var location_name=$("#location_name").val();

                $.ajax({
                    method :"POST",
                    url : "insertlocation.php",
                    data : {"lat" : lat , "lng" : lng , "location_name" : location_name}
                }).done(function(text){
                    alert(text)
                });
            } 

            function setupMap() { 
            
            var myOptions = {
              zoom: 12,
              center: new google.maps.LatLng(15.000682,103.728207),
              mapTypeId: google.maps.MapTypeId.SATELLITE
            };
            var map = new google.maps.Map(document.getElementById('map_canvas'),
                myOptions);

            var marker = new google.maps.Marker({
                map:map,
                position: new google.maps.LatLng(15.000682,103.728207),
                draggable: true
            });
           
            }
            
        </script>
    </head>
    <body onload="setupMap()">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="main_login.php">Project</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link fa fa-cutlery" href="foot.php"> อาหาร</a>
                </li>
                <li class="nav-item">
                <a class="nav-link fa fa-glass" href="drink.php"> เครื่องดื่ม</a>
                </li>
                <li class="nav-item">
                <a class="nav-link fa fa-birthday-cake" href="sweet.php"> ของหวาน</a>
                </li>
                <li class="nav-item">
                <a class="nav-link fa fa-birthday-cake" href="add.php"> เพื่มข้อมูลร้านอาหานของท่าน</a>
                </li>
                <li class="nav-item">
              <a class="nav-link fa fa-birthday-cake" href="shopall.php"> ดูรายละเอียดร้านค้า</a>
            </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link fa fa-user-circle" href="user.php">
                    <?php echo $s_login_username;?>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link fa fa-sign-in" href="logout.php"> ลงชื่อออก</a>
                </li>
            </ul>
            </div>
        </nav>
        <br>
        <div class="container">
        <h1 style="color:white;">Maps</h1>
        <hr>
        <div id="map_canvas" style="width:100%;height:450px">
        </div>
        </div>
        
    </body>
</html>