<?php
include_once('function.php');
include_once('connect.php');

// $randomuserMember = 'userMember' . rand(1000, 9999);
$id_member = $_GET['id_member'];
// $device_id = 'userMember3103';
// print_r($device_id);
// exit();
$conn = new BD_con();
// $checkmember  = $insert_member->select_rightmember();
// print_r($_POST);
// exit();
if(!$id_member == '' || !$id_member == null){
    $data_member = mysqli_fetch_assoc($conn->select_member($id_member));
    
}
// echo json_encode(array('username' => $data_member['username'],'device_id' => $data_member['device_id'],'image_path' => $data_member['image_path']));
echo json_encode($data_member);

exit();
