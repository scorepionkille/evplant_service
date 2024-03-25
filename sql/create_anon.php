<?php
include_once('function.php');
include_once('connect.php');

$randomuserMember = 'userMember' . rand(1000, 9999);
$device_id = $_POST['device_id'];


// $checkmember  = $insert_member->select_rightmember();
// print_r($_GET);
// print_r($_POST);
// exit();

$insert_anon = new BD_con();
// $check_a
// $sql_check = "SELECT * FROM right_anonymous WHERE device_id='$device_id'";
// $query = mysqli_query($conn, $sql_check);
// $data = mysqli_num_rows($query);

$sqlInsertAnon = $insert_anon->insert_anon($randomuserMember, $device_id);
    if ($sqlInsertAnon) {
        $success = 1;
        echo json_encode(array('success' => $success));
    } else {
        $success = 0;
        echo json_encode(array('success' => $success));
    }

// if ($data < 0) {
//     $sqlInsertAnon = $insert_anon->insert_anon($randomuserMember, $device_id);
//     if ($sqlInsertAnon) {
//         $success = 1;
//         echo json_encode(array('success' => $success));
//     } else {
//         $success = 0;
//         echo json_encode(array('success' => $success));
//     }
// } else {
//     echo json_encode(array('error_user' => $data));
//     echo "TEST : TEST";
// }
// print_r('<pre>');
// print_r($data);
// exit();
