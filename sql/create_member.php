<?php
include_once('function.php');
include_once('connect.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $device_id = $_POST['device_id'];
    $image = $_POST['image'];
    
    // ไฟล์รูปภาพเข้าระบบ

    // $img_member = $_GET['image'];
    // function เทสระบบ
    // if(isset($_POST['submitImage'])){
    //     print_r('<pre>');
    //     print_r($_POST);
    //     print_r($_FILES);
    //     exit();
    // }
    // function เทสระบบ
    
    // ไฟล์รูปภาพเข้าระบบ
	
$insert_member = new BD_con(); 

$sql_check = "SELECT * FROM member WHERE username='$username' AND email='$email'";
$query = mysqli_query($conn,$sql_check);
$data = mysqli_num_rows($query);
$imagePath = "http://z225054-8g10mb.ls02.zwhhosting.com/evplant_service/uploads/member/".$image;

if($data <= 0){
    $randomuserMember = 'userMember' . rand(1000, 9999);
    $sqlInsertMember = $insert_member->insert_member($randomuserMember,$username, $password,$gender, $birthday, $email, $imagePath, $device_id);
    if ($sqlInsertMember) {
        $success = 200;
        echo json_encode(array('success' => $success));
    } else {
        $success = 500;
        echo json_encode(array('success' => $success));
    }
}else{
    echo json_encode(array('error_user' => 'มีข้อมูลอยู่ในระบบแล้ว'));
}
// print_r('<pre>');
// print_r($data);
// exit();








?>