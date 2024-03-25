<?php
include_once('function.php');
include_once('connect.php');
    $id_car = $_GET['id_car'];
    $id_station = $_GET['id_station'];
    $charge_time = $_GET['charge_time'];
    $percent_start = $_GET['percent_start'];
    $percent_stop = $_GET['percent_stop'];
    
    // $image = $_POST['image'];
	
    $insert_history = new BD_con(); 
    // $checkmember  = $insert_member->select_rightmember();
    // print_r($checkmember);
    // exit();

    $sqlInserthistory = $insert_history->insert_history_car($id_car, $id_station, $charge_time, $percent_start ,$percent_stop);
    if ($sqlInserthistory != '') {
        $status = 200;
        echo json_encode(array('status' => $status));
    } else {
        $status = 500;
        echo json_encode(array('status' => $status));
    }


?>