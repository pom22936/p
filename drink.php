<?php 
    $host ='localhost';
    $user = 'root';
    $pass ='poppom22936';
    $dbname ='study';
    $con = mysqli_connect($host,$user,$pass,$dbname);
    mysqli_set_charset($con,"utf8");

    $srtquery = 'SELECT * FROM `shop` Where shoptype ="เครื่องดื่ม"';
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
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
    crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
</head>

<body>
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


  <section class="jumbotron text-center" id="bg_drink">
    <div class="container">
      <h1 class="jumbotron-heading">แนะนำร้านเครื่องดื่มชื่อดัง</h1>
      <p class="lead text-muted" id="txt_b">แนะนำสถาที่ร้านเครื่องดืมที่น่ารับประทาน ร้านเด่น ร้านดัง ที่ต้องมาให้ได้ ในจังหวันหนองคาย ถ้าใครไม่มาแสดงว่ามาไม่ถึง
        อดชิมเครื่องดืมของจังหวัดใกล้ริมแม่น้ำโขงพร้อมบรรยากาศดีสบายๆ ของจังหวัดที่น่าอยู่เป็นอับดับต้นๆ ของประเทศไทย</p>
      <p>
        <a class="btn btn-lg btn-primary" href="drink.php" role="button">ข้อมูลร้านเครื่องดืื่ม</a>
        <a class="btn btn-lg btn-primary" href="review.php" role="button">อ่านรีวิว</a>
      </p>
    </div>
  </section>

  <div id="box" class="container">
    <div class="container">
      <div>
        <?php 
             while($row=mysqli_fetch_array($result)){
                  $mid = $row['shopID'];
                  $img = mysqli_query($con,"Select * from image where shopID=$mid");
                  echo "<div style='display:flex;'>";
                        
                  while($rimg=mysqli_fetch_array($img)){
                  echo "<a style='width:250px;height:250px;'>";
                  $src= $rimg['img_name'];
                  $style="width:100%;height:100%;margin:auto";
                  echo "<img class='img-thumbnail' src=$src style=$style>";
                  echo "</a>";  
                  }
                        
                  echo "</div>";

                  echo '<h1> ชื่อร้านค้า :' .$row['shopname']. '</h1>';
                  echo '<p> รายละเอียดร้านค้า :'.$row['shopdetail'].'</p>';
                  echo '<p>เวลาเปิด-ปิด : ทุกวัน เวลา' .$row['opt'].' - '.$row['edt'].'</p>';
                  echo '<p>เบอร์โทรศัพท์ :'.$row['tel'] .'</p>';
                  echo '<p>เว็บไซต์ :'.'<a>'.$row['web'].'</a>' .'</p>';
                  echo '<a  class="btn btn-secondary" href="map.php">ดูแผนที่</a>';
                  echo '<hr>';
              }
          ?>
      </div>
    </div>
  </div>


  <div style="background-color:black;">
    <footer class="container" style="color:wheat;">
      <p class="float-right">
        <a href="#">Back to top</a>
      </p>
      <p>&copy; P_MAOU. &middot; </p>
    </footer>
  </div>

</body>

</html>