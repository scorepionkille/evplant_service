<?php
include_once('function.php');
include_once('connect.php');

// $randomuserMember = 'userMember' . rand(1000, 9999);
// $device_id = $_POST['device_id'];


// $checkmember  = $insert_member->select_rightmember();
// print_r($_POST);
// exit();

$insert_anon = new BD_con();
$data_anon = mysqli_fetch_assoc($insert_anon->select_rightAdmin());
// while($data_anon = mysqli_fetch_assoc($insert_anon->select_rightAdmin())){
//     print_r('<pre>');
//     print_r($anon_user);
// }
print_r('<pre>');
print_r($data_anon);
exit();
