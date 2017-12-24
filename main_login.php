<?php 
    session_start();
    if(!isset($_SESSION['login_id'])){
        header('Location:index.php');
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
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.css"> 
    </head>
    <body> 
      
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Project</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
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
              <a class="nav-link fa fa-user-circle" href="user.php"> <?php echo $s_login_username;?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link fa fa-sign-in" href="logout.php"> ลงชื่อออก</a>
            </li>
          </ul>
        </div>
      </nav>

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="first-slide" id="jb-wh" src="http://holytrinity.be/wp-content/uploads/2017/03/Bring-Share.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption text-left">
              <h1>ประเภทอาหาร</h1>
              <p>แนะนำร้านอาหาร / เมนูเด็จของแต่หละร้าน / ดูข้อมูลร้านอาหาร / ดูรีวิวร้านอาหาร</p>
              <p><a class="btn btn-lg btn-primary" href="#sh-foot" role="button">อาหาร</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide" id="jb-wh" src="https://www.thairath.co.th/media/CiHZjUdJ5HPNXJ92GOy9Gimidj87q6btFo.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>ประเภทเครื่องดื่ม</h1>
              <p>แนะนำร้านนม/กาแฟ /เมนูเด็จของแต่หละร้าน / ดูข้อมูลร้านนม/กาแฟ / ดูรีวิวร้านนม/กาแฟ</p>
              <p><a class="btn btn-lg btn-primary" href="#sh-drink" role="button">นม/กาแฟ</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="third-slide" id="jb-wh" src="https://sites.google.com/site/xahrthiy/_/rsrc/1472778025097/home/7-4.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption text-right">
              <h1>ประเภทร้านขนม</h1>
              <p>แนะนำร้านขนม /เมนูเด็จของแต่หละร้าน / ดูข้อมูลร้านขนม / ดูรีวิวร้านขนม</p>
              <p><a class="btn btn-lg btn-primary" href="#sh-sweets" role="button">ขนม</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


    <div id="sh-foot">
    <div class="container" id="set">
      <div class="row">
          <div class="col-md-7">
            <h2 class="featurette-heading">ร้านอาหารอร่อยในหนองคาย <span class="text-muted">อยู่ไหนน้าาาา</span></h2>
            <p class="lead">แนะนำสถาที่ร้านอาหารที่น่ารับประทาน ร้านเด่น ร้านดัง ที่ต้องมาให้ได้ ในจังหวันหนองคาย ถ้าใครไม่มาแสดงว่ามาไม่ถึง อดชิมอาหารของจังหวัดใกล้ริมแม่น้ำโขงพร้อมบรรยากาศดีสบายๆ ของจังหวัดที่น่าอยู่เป็นอับดับต้นๆ ของประเทศไทย</p>
            <a class="btn btn-lg btn-primary" href="foot.php" role="button">ข้อมูลร้านอาหาร</a>
            <a class="btn btn-lg btn-primary" href="review.php" role="button">อ่านรีวิว</a>
          </div>
          <div class="col-md-5">
            <img class="rounded-circle" src="http://holytrinity.be/wp-content/uploads/2017/03/Bring-Share.jpg" alt="Generic placeholder image" style="width: 500px;height: 500px;">
          </div>
        </div>
    </div>
    </div>
    <div id="sh-drink">
    <div class="container" id="set">
        <div class="row">
          <div class="col-md-6">
            <img class="rounded-circle" src="https://www.thairath.co.th/media/CiHZjUdJ5HPNXJ92GOy9Gimidj87q6btFo.jpg" alt="Generic placeholder image" style="width: 500px;height: 500px;">
          </div>
          <div class="col-md-6">
            <h2 class="featurette-heading">ร้านเครื่องดืมชิวๆในหนองคาย <span class="text-muted">อยู่ไหนน้าาาา</span></h2>
            <p class="lead">แนะนำสถาที่ร้านเครื่องดืมที่น่ารับประทาน ร้านเด่น ร้านดัง ที่ต้องมาให้ได้ ในจังหวันหนองคาย ถ้าใครไม่มาแสดงว่ามาไม่ถึง อดชิมเครื่องดืมของจังหวัดใกล้ริมแม่น้ำโขงพร้อมบรรยากาศดีสบายๆ ของจังหวัดที่น่าอยู่เป็นอับดับต้นๆ ของประเทศไทย</p>
            <a class="btn btn-lg btn-primary" href="drink.php" role="button">ข้อมูลร้านเครื่องดืื่ม</a>
            <a class="btn btn-lg btn-primary" href="review.php" role="button">อ่านรีวิว</a>
          </div>
        </div>
    </div>
    </div>
    <div id="sh-sweets">
    <div class="container" id="set">
      <div class="row">
        <div class="col-md-7">
            <h2 class="featurette-heading">ร้านของหวานน่าทานในหนองคาย <span class="text-muted">อยู่ไหนน้าาาา</span></h2>
            <p class="lead">แนะนำสถาที่ร้านของหวานที่น่ารับประทาน ร้านเด่น ร้านดัง ที่ต้องมาให้ได้ ในจังหวันหนองคาย ถ้าใครไม่มาแสดงว่ามาไม่ถึง อดชิมของหวานของจังหวัดใกล้ริมแม่น้ำโขงพร้อมบรรยากาศดีสบายๆ ของจังหวัดที่น่าอยู่เป็นอับดับต้นๆ ของประเทศไทย</p>
            <a class="btn btn-lg btn-primary" href="sweet.php" role="button">ข้อมูลร้านขนม</a>
            <a class="btn btn-lg btn-primary" href="review.php" role="button">อ่านรีวิว</a>
          </div>
          <div class="col-md-5">
            <img class="rounded-circle" src="https://sites.google.com/site/xahrthiy/_/rsrc/1472778025097/home/7-4.jpg" alt="Generic placeholder image" style="width: 500px;height: 500px;">
          </div>
        </div>
    </div>
    </div>
    <div style="background-color:black;">
    <footer class="container" style="color:wheat;">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>&copy; P_MAOU. &middot; </p>
    </footer>   
    </div> 
    </body>
</html>