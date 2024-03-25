<?php
include_once('function.php');
include_once('connect.php');
    
    if(isset($_GET['id_car'])){
        $id_car = $_GET['id_car'];
        $status = $_GET['status'];
        // print_r('<pre>');
        // print_r($_POST);
        // print_r($_FILES);
        $conner_car = new BD_con(); 

        if($id_car != ''){
            $sqlDel_car = $conner_car->del_car($id_car,$status);
            if ($sqlDel_car) {
                $success = 200;
                echo json_encode(array('success' => $success));
            } else {
                $success = 500;
                echo json_encode(array('success' => $success));
            }
        }else{
            echo json_encode(array('error_user' => 'มีข้อมูลอยู่ในระบบแล้ว'));
        }
        // exit();
    }
    








?>