<?php
include_once('function_admin.php');
// include_once('connect.php');

$conn = new BD_con();
$sql_map  = $conn->select_map();
$data = array();
while($row = mysqli_fetch_assoc($sql_map)){
    $sql_station  = $conn->select_station_map($row['id_map']);
    $row_station = mysqli_fetch_assoc($sql_station);
    $data[] = array(
        'id_map' => $row['id_map'],
        'id_station' => $row_station['id_station'],
        'latitude' => (double)$row['latitude'],
        'longitude' => (double)$row['longitude'],
        'name_station' => $row_station['station_name'],
        'location' => $row_station['location'],
    );
}
echo json_encode($data);

exit();
