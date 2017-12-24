<?php
    $dbcon = mysqli_connect("localhost","root","poppom22936","study") or die(mysqli_error());
    if (mysqli_connect_error()){
        echo"ไม่สามารถติดต่อฐานข้อมูลได้";
    }
    mysqli_set_charset($dbcon,'utf8');
     $email = $_POST['email'];
     $id = $_POST['id'];
     $name = $_POST['name'];
    

    $q = mysqli_query($dbcon,"Select * from tb_login where lodin_email='$email'");

    
    $num = $q->num_rows;

    if($num == 0){
        echo $name."<br>";
        echo $email."<br>";
        $query = "INSERT INTO tb_login (login_id,login_username,login_password,lodin_email,login_status) VALUES ('','$name','$login_password','$email',1)";
        $result = mysqli_query($dbcon,$query);
        echo true;
    }else{
            session_start();//เก็บตัวแปร ไว้ใช่เพจ อื่นๆ
            $row_user = mysqli_fetch_array($q);//จะดึงค่า id
            $_SESSION['login_id'] = $row_user['login_id'];//ดึง
        echo true;
    }
?>
