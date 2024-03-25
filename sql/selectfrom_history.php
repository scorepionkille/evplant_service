<?php
include_once('function.php');
include_once('connect.php');

$id_car = $_GET['id_car'];

$conn = new BD_con();

$select_history_car  = $conn->select_history_car($id_car);
$data = array();
while($row = mysqli_fetch_assoc($select_history_car)){
    $data[] = $row;
}

echo json_encode($data);
exit();

