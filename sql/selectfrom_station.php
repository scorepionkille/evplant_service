<?php
include_once('function.php');
include_once('connect.php');

// $randomuserMember = 'userMember' . rand(1000, 9999);
$id_station = $_GET['id_station'];
// $device_id = 'userMember3103';
// print_r($device_id);
// exit();
$conn = new BD_con();
$conn_image = new BD_con();
$conn_map = new BD_con();


$select_station  = $conn->select_station($id_station);
$data = array();

while($row = mysqli_fetch_assoc($select_station)){
    $i = 0;
    $data_image = array();
        $sql_image  = $conn_image->select_image_station($id_station);
    while($row_image = mysqli_fetch_assoc($sql_image)){
        $data_image[$i] = $row_image['file_path'].$row_image['file_name'];
        $i++;
    };
    
    $sql_map  = $conn_image->select_map($row['id_map']);
    $row_map = mysqli_fetch_assoc($sql_map);
    $data= array(
        'id_map' => $row['id_map'],
        'id_station' => $row['id_station'],
        'latitude' => (double)$row_map['latitude'],
        'longitude' => (double)$row_map['longitude'],
        'station_name' => $row['station_name'],
        'location' => $row['location'],
        'description' => $row['description'],
        'provider' => $row['provider'],
        'charge_type' => $row['charge_type'],
        'service_period' => $row['service_period'],
        'facilities' => $row['facilities'],
        'rating' => $row['rating'],
        'image_path' => $data_image,
    );
}


echo json_encode(array($data));
exit();
