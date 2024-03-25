<?php
include_once('function.php');
include_once('connect.php');

$id_member = $_GET['id_member'];

$conn = new BD_con();

$select_favorite  = $conn->select_favorite($id_member);
$data = array();
while($row = mysqli_fetch_assoc($select_favorite)){
    $sql_image  = $conn->select_image_station($row['id_station']);
    $row_image = mysqli_fetch_assoc($sql_image);
    $data[] = array(
        'id_map' => $row['id_map'],
        'id_station' => $row['id_station'],
        'station_name' => $row['station_name'],
        'location' => $row['location'],
        'image_path' => $row_image['file_path'],
    );
}

echo json_encode($data);
exit();
