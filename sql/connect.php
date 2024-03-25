<?php
$servername = "localhost";
$username = "zgmblszw";
$password = "Ton0800615524";
$db = "zgmblszw_evplant";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";






?>