<?php 
     $dbcon = mysqli_connect("localhost","root","poppom22936","study") or die(mysqli_error());
     if (mysqli_connect_error()){
         echo"ไม่สามารถติดต่อฐานข้อมูลได้";
     }
     mysqli_set_charset($dbcon,'utf8');

     $login_username = mysqli_real_escape_string($dbcon,$_POST['username']);//รับค่าจากผู้ใช้ที่กรอก
     $login_password = mysqli_real_escape_string($dbcon,$_POST['password']);

     $salt = "tercuyh565niuppoi250opi,yfcwtrbyiniu";
     $hash_login_password = hash_hmac('sha256',$login_password,$salt);//เข้ารหัส

     $sql = "SELECT * FROM tb_login WHERE login_username=? AND login_password=?";//ดึงค่าจากตารางมา รอรับค่าพารามิทเตอร์
     $stmt =mysqli_prepare($dbcon,$sql);//สร้างพารามิเตอร์ให้กับ sql และป้องกัน sql inject
     mysqli_stmt_bind_param($stmt,"ss",$login_username,$hash_login_password);//ส่งพารามิเตอร์
     mysqli_execute($stmt);//รัน คล้ายๆ query
     $result_user = mysqli_stmt_get_result($stmt);//ดึงผลลัพธ์จาก execute
     
     if($result_user->num_rows ==1){//ถ้าผลลัพธ์ ถูกต้อง ค่าที่ส่งมาจากตารางจะเป็น 1 แถว
        session_start();//เก็บตัวแปร ไว้ใช่เพจ อื่นๆ
        $row_user = mysqli_fetch_array($result_user);//จะดึงค่า id
        $_SESSION['login_id'] = $row_user['login_id'];//ดึง
        header('Location:main_login.php');
     } else {
         echo"ผู้ใช้หรือหรัสผ่านไม่ถูกต้อง";
     }

?>