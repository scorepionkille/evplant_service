<?php
include_once('function.php');
include_once('connect.php');
    $name_car = $_POST['name_car'];
    $description = $_POST['description'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $charge_ac = $_POST['charge_ac'];
    $charge_dc = $_POST['charge_dc'];
    $id_member = $_POST['id_member'];
    $image = $_POST['image'];
    $insert_car = new BD_con(); 
    // $checkmember  = $insert_member->select_rightmember();
    // print_r($checkmember);
    // exit();
    
    $imagePath = "http://z225054-8g10mb.ls02.zwhhosting.com/evplant_service/uploads/car/".$image;

    $sqlInsertCar = $insert_car->insert_car($name_car ,$description ,$brand, $model, $charge_ac,$charge_dc, $imagePath,$id_member);
    if ($sqlInsertCar != '') {
        $status = 200;
        echo json_encode(array('status' => $status));
    } else {
        $status = 500;
        echo json_encode(array('status' => $status));
    }

?>