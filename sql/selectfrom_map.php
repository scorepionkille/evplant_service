<?php
include_once('function.php');
include_once('connect.php');

$conn = new BD_con();
$sql_map  = $conn->select_map();
$data = array();
while($row = mysqli_fetch_assoc($sql_map)){
    $data[] = array(
        'id_map' => $row['id_map'],
        'id_station' => $row['id_station'],
        'latitude' => (double)$row['latitude'],
        'longitude' => (double)$row['longitude'],
        'name_station' => $row['station_name'],
        'location' => $row['location'],
    );
}
echo json_encode($data);

exit();
