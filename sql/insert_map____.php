<?php
include_once('function.php');
include_once('connect.php');
    ## MAP    
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    ## MAP

    ## STATION
    $station_name = $_POST['station_name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $provider = $_POST['provider'];
    $charge_type = $_POST['charge_type'];
    $service_period = $_POST['service_period'];
    $facilities = $_POST['facilities'];
    // $image = $_GET['image'];
    // print_r($i0mage);
	## STATION

    // print_r($_POST);
    // exit();

    ## TEST TON API
    ## MAP    
    // $latitude = '12.753980095816215';
    // $longitude = '12.75398009581625';
    // ## MAP

    // ## STATION
    // $station_name = 'TSET1';
    // $location = 'TSET1';
    // $description = 'TSET1';
    // $provider = 'TSET1';
    // $charge_type = 'TSET1';
    // $service_period = 'TSET1';
    // $facilities = 'TSET1';
    // $image = $_POST['image'];
	## STATION
    ## TEST TON API

    $insert_map = new BD_con(); 
    $insert_station = new BD_con(); 
    $insert_img_station = new BD_con(); 
    // $checkmember  = $insert_member->select_rightmember();
    // print_r($checkmember);
    // exit();

    $sqlInsertMap = $insert_map->insert_map($latitude,$longitude);
    // $sqlInsertstation = $insert_img_station->insert_map();
    // echo 'TEST : '.$sqlInsertMap;
    // exit();
    if ($sqlInsertMap != '') {
        $status = 200;
        $sqlInsertstation = $insert_station->insert_station($station_name, $location, $description ,$provider ,$charge_type ,$service_period ,$facilities,$sqlInsertMap);

        // $station_name = $_POST['station_name'];
        $target_dir = "../uploads/station/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]); // กำหนดตำแหน่งที่ต้องการบันทึกไฟล์
        $data = $insert_img_station->insert_image_station($target_dir,$_FILES["file"]["name"],$sqlInsertstation);
        if($data != ''){
            $status = 200;
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
        } else {
            $status = 500;
        }
        echo json_encode(array('status' => $status));
    } else {
        $status = 500;
        echo json_encode(array('status' => $status));
    }


?>