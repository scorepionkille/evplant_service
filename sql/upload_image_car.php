<?php
$target_dir = '../uploads/car/'; // Directory to store uploaded files
$target_file = $target_dir . basename($_FILES["file"]["name"]); // กำหนดตำแหน่งที่ต้องการบันทึกไฟล์

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo 'File uploaded successfully';
} else {
    echo 'Error uploading file';
}
?>
