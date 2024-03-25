<?php
include_once('function.php');
include_once('connect.php');

// $randomuserMember = 'userMember' . rand(1000, 9999);
$device_id = $_GET['device_id'];
// $device_id = 'userMember3103';
// print_r($device_id);
// exit();
$insert_anon = new BD_con();
// $checkmember  = $insert_member->select_rightmember();
// print_r($_POST);
// exit();
if(!$device_id == '' || !$device_id == null){
    $data_anon = mysqli_fetch_assoc($insert_anon->select_anon($device_id));
}
echo json_encode(array('username' => $data_anon['code_random'],'device_id' => $data_anon['device_id'],'image_path' => $data_member['image_path'] ?? ''));
// echo json_encode(array('device_id' => $data['device_id'] ?? ''));

exit();
