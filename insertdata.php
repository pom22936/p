<?php 
    $host ='localhost';//เชื่อม db
    $user = 'root';
    $pass ='poppom22936';
    $dbname ='study';
    $con = mysqli_connect($host,$user,$pass,$dbname);
    mysqli_set_charset($con,"utf8");

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
    
    function check($url){
        if(!file_exists($url))
            mkdir($url);
    }

    $srtquery = "INSERT INTO  shop  VALUE ('','$name','$type','$detail','$location','$lat','$lng','$opt','$edt','$tel','$web')";//เพื่มข้อมูล
    $result = mysqli_query($con,$srtquery);

    check('myfile/'.$type);    
    check('myfile/'.$type.'/'.$name);

    if(isset($_FILES["filUpload"]))
    {
        foreach($_FILES['filUpload']['tmp_name'] as $key => $val)
        {   
            $file_name = $_FILES['filUpload']['name'][$key];
            $file_size =$_FILES['filUpload']['size'][$key];
            $file_tmp =$_FILES['filUpload']['tmp_name'][$key];
            $file_type=$_FILES['filUpload']['type'][$key];  
            move_uploaded_file($file_tmp,"myfile/".$type.'/'.$name.'/'.$file_name);

            $s = mysqli_query($con,"Select * from shop where shopname='$name'");
            $row = mysqli_fetch_array($s);
            $num = $row['shopID'];
            $qye = "INSERT INTO  image  VALUE ('','myfile/$type/$name/$file_name',$num)";//เพื่มข้อมูล
            $result = mysqli_query($con,$qye);
        }
        echo "Copy/Upload Complete";
    }

    header("Location:main_login.php");
    

?>