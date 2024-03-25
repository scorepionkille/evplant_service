<?php
include_once('function.php');
include_once('connect.php');

$username = $_GET['username'];
$password = $_GET['password'];

$select_member = new BD_con(); 

$sql_select = "SELECT * FROM member WHERE username = '$username' AND password = MD5('$password') ";
$query = mysqli_query($conn,$sql_select);
$data = mysqli_fetch_array($query);
echo json_encode(array('id_member' => $data['id_member'] ?? ''));

// print_r('<pre>');
// print_r($sql_select);
// exit();