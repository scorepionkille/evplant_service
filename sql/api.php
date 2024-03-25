<?php
// include '192..../cearte_member.php';
// class test
// {

//     function __construct()
//     {
//         $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
//         $this->dbcon = $conn;

//         if (mysqli_connect_errno()) {
//             echo "Failed to connect to MySQL : " . mysqli_connect_error();
//         }
//     }

//     ## INSER DATA START
//     public function insert_rightAdmin($randomuser, $user, $pass)
//     {
//         $result = mysqli_query($this->dbcon, "INSERT INTO right_admin(code,userneme,password,status,add_date) 
//         VALUES('$randomuser','$user','$pass','1',Now())");
//         return $result;
//     }

//     $randomuserAnon = 'userAnon' . rand(1000, 9999);
//     public function insert_anon($randomuserAnon,$status){
//         $result = mysqli_query($this->dbcon , "INSERT INTO right_anonymous(code_random,status) 
//         VALUES('$randomuserAnon','1')");
//         return $result;
//     }

//     $randomuserMember = 'userMember' . rand(1000, 9999);
//     public function insert_member($randomuserMember,$user,$pass,$imageuser,$namemember,$gender,$age,$email){
//         $result = mysqli_query($this->dbcon , "INSERT INTO member(code,username,password,image,name,gender,age,email,status,add_date) 
//         VALUES('$randomuserMember','$user','$pass','$imageuser','$namemember','$gender','$age','$email','1',Now())");
//         return $result;
//     }

//     public function insert_car($barnd,$model,$charge_type,$image){
//         $result = mysqli_query($this->dbcon , "INSERT INTO car(barnd,model,charge_type,image,status,add_date) 
//         VALUES($barnd,$model,$charge_type,$image,'1',Now())");
//         return $result;
//     }

//     public function insert_car($barnd,$model,$charge_type,$image){
//         $result = mysqli_query($this->dbcon , "INSERT INTO car(barnd,model,charge_type,image,status,add_date) 
//         VALUES($barnd,$model,$charge_type,$image,'1',Now())");
//         return $result;
//     }

//     ## INSER DATA END


//     ## SELECT DATA START
//     public function select_rightAdmin()
//     {
//         $result = mysqli_query($this->dbcon, "SELECT * FROM right_admin WHERE 1");
//         return $result;
//     }
//     ## SELECT DATA END




// }
?>