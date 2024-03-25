<?php
include_once('function.php');
include_once('connect.php');

// $randomuserMember = 'userMember' . rand(1000, 9999);
$id_member = $_GET['id_member'];
// $device_id = 'userMember3103';
// print_r($device_id);
// exit();
$conn = new BD_con();

$select_car  = $conn->select_car($id_member);
$data = array();
while($row = mysqli_fetch_assoc($select_car)){
    $data[] = array(
        'id_car' => $row['id_car'],
        'name_car' => $row['name_car'],
        'description' => $row['description'],
        'brand' => $row['brand'],
        'model' => $row['model'],
        'charge_ac' => $row['charge_ac'],
        'charge_dc' => $row['charge_dc'],
        'image_path' => $row['image'],
    );
}

echo json_encode($data);
exit();
