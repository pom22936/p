<?php 
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
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link fa fa-user-circle" href="user.php"> <?php echo"$s_login_username";?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link fa fa-sign-in" href="logout.php"> ลงชื่อออก</a>
            </li>
          </ul>
        </div>
      </nav>
    <br><br><br>
      
      <?php 
        $shopID = $_GET['shopID'];
        $q ="SELECT * FROM `shop` WHERE shopID='$shopID'";
        $res = mysqli_query($dbcon,$q);
        $row = mysqli_fetch_array($res);
      ?>
       
    <div class="container">
    <h1>แก้ไขข้อมูลร้านค้า</h1>
        <form action="updatedata.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">ชื่อร้าน</label>
                <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="ชื่อร้าน" value="<?php echo $row['shopname'] ?>">
            </div>
            <div class="form-group">
                <label for="type">ประเภทร้านค้า</label>
                <select class="form-control" name="type" value="<?php echo $row['shoptype'] ?>">
                    <option>อาหาร</option>
                    <option>เครื่องดื่ม</option>
                    <option>ของหวาน</option>
                </select>
            </div>
            <div class="form-group">
                <label for="detail">รายละเอียดร้านค้า</label>
                <textarea class="form-control" name="detail" rows="3" value="<?php echo $row['shopdetail'] ?>"></textarea>
            </div>
            <div class="form-group">
                <label for="location">ที่ตั่ง</label>
                <input type="text" class="form-control" name="location" aria-describedby="location" placeholder="xxxxx" value="<?php echo $row['shoplocation'] ?>">
            </div>
            <div class="form-group">
                <label for="tel">เบอร์โทรศัพท์</label>
                <input type="text" class="form-control" name="tel" aria-describedby="tel" placeholder="0xxxxxxxx" value="<?php echo $row['tel'] ?>">
            </div>
            <div class="form-group">
                <label for="web">Web ของร้านค้า</label>
                <input type="text" class="form-control" name="web" aria-describedby="web" value="<?php echo $row['web'] ?>">
            </div>
            <div class="row">
                <label>พิกัด</label>
                <div class="col">
                    <br>
                    <label>ละติจูด</label>
                    <input type="text" class="form-control" placeholder="ละติจูด" name="lat" value="<?php echo $row['shoplat'] ?> ">
                </div>
                <div class="col">
                    <br>
                    <label>ลองติจูด</label>
                    <input type="text" class="form-control" placeholder="ลองติจูด" name="lng" value="<?php echo $row['shoplng'] ?>">
                </div>
            </div>

            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <label>เวลาเปิดร้าน</label>
                        <div class='input-group date' id='datetimepicker3'>
                            <input type='time' class="form-control" name="opt" value="<?php echo $row['opt'] ?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class='col-sm-6'>
                    <div class="form-group">
                        <label>เวลาปิดร้าน</label>
                        <div class='input-group date' id='datetimepicker3'>
                            <input type='time' class="form-control" name="edt" value="<?php echo $row['edt'] ?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker3').datetimepicker({
                            format: 'LT'
                        });
                    });
                </script>
            </div>
            <input type="hidden" name="shopID" value="<?php echo $row['shopID'] ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <br><br><br>
    <div style="background-color:black;">
    <footer class="container" style="color:wheat;">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>&copy; P_MAOU. &middot; </p>
    </footer>   
    </div> 
    
</body>

</html>