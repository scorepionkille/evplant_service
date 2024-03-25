<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'zgmblszw');
define('DB_PASS', 'Ton0800615524');
define('DB_NAME', 'zgmblszw_evplant');

class BD_con
{

    function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }

    ## INSER DATA START
    ## insert User Admin
    public function insert_rightAdmin($randomuser, $user, $pass)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO right_admin(`code`,`userneme`,`password`,`status`,`name`,`add_date`) 
        VALUES('$randomuser','$user','$pass','1','name',Now())");
        return $result;
    }
    ## insert User Admin


    ## insert User Random
    public function insert_anon($randomuserAnon,$device_id)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO right_anonymous(`code_random`,`status`,`device_id`) 
            VALUES ('$randomuserAnon','1','$device_id')");
        return $result;
    }
    ## insert User Random

    ## insert User Member
    public function insert_member($randomuserMember,$username, $password, $gender, $birthday, $email , $device_id)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO `member`(`code_member`,`username`, `password`, `gender`, `birthday`, `email`, `status`, `create_date`, `device_id`) 
        VALUES ('$randomuserMember','$username','$password','$gender','$birthday','$email','1',Now(),'$device_id')"); 
        return $result;
    }
    ## insert User Member

    ## insert User car
    public function insert_car($name_car ,$description ,$brand, $model, $charge_ac,$charge_dc, $image,$id_member)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO `car`(`name_car`, `description`, `brand`, `model`, `charge_ac`, `charge_dc`, `create_date`, `image`, `id_member`) 
        VALUES ('$name_car','$description','$brand','$model','$charge_ac','$charge_dc',Now(),'$image','$id_member')");
        return $result;
    }
    ## insert User car
    
    ## insert User comment
    public function insert_comment($barnd, $model, $charge_type, $image)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO `comment`(`id_station`, `id_member`, `message`, `timestamp`, `id_image`) 
        VALUES ('[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')");
        return $result;
    }
    ## insert User comment

    ## insert User favorite
    public function insert_favorite($barnd, $model, $charge_type, $image)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO `favorite`(`id_member`, `id_station`, `timestamp`, `status`) 
        VALUES ('[value-2]','[value-3]','[value-4]','[value-5]')");
        return $result;
    }
    ## insert User favorite
    
    ## insert User history_car
    public function insert_history_car($id_car, $id_station, $charge_time, $percent_start ,$percent_stop)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO `history_car`(`id_car`, `id_station`, `charge_time`, `percent_start`, `percent_stop`, `create_date`) 
        VALUES ('$id_car', '$id_station', '$charge_time', '$percent_start' ,'$percent_stop',Now())");
        return $result;
    }
    ## insert User history_car

    ## insert User image_station
    public function insert_image_station($target_dir,$station_name,$sum)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO `image_station`(`file_path`, `file_name`, `create_date`, `id_station`) 
        VALUES ('$target_dir','$station_name',Now(),'$sum')");
        return $result;
    }
    ## insert User image_station

    ## insert User map
    public function insert_map($latitude, $longitude)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO `map`(`latitude`, `longitude`,`create_date`) 
        VALUES ('$latitude','$longitude',Now())");
        $map_id = mysqli_insert_id($this->dbcon);
        return $map_id; ## ส่ง ID ไปให้ station
    }
    ## insert User map

    ## insert User Station
    public function insert_station($station_name, $location, $description ,$provider ,$charge_type ,$service_period ,$facilities,$sqlInsertMap)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO `station`(`station_name`, `location`, `description`, `provider`, `charge_type`, `service_period`, `facilities`, `status` , `id_map`) 
        VALUES ('$station_name','$location','$description','$provider','$charge_type','$service_period','$facilities','1','$sqlInsertMap')");
        return $result;
    }
    ## insert User Station
    // ## INSER DATA END

    ## CHECK ADMIN
    public function check_Admin($code)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM right_admin WHERE code='$code'");
        return $result;
    }
    ## CHECK ADMIN


    // ## SELECT DATA START
    public function select_rightAdmin($user,$pass)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM right_admin WHERE username='$user' AND password='$pass'");
        return $result;
    }

    public function select_anon($device_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM right_anonymous WHERE device_id='$device_id'");
        return $result;
    }

        public function select_member()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM member WHERE 1 ORDER BY id_member DESC");
        return $result;
    }

    public function select_car($id_member)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM car WHERE 1 AND id_member ='$id_member' AND status='1'");
        return $result;
    }

    public function select_history_car($id_car)
    {
        $result = mysqli_query($this->dbcon, "SELECT station.station_name,history_car.percent_start,history_car.percent_stop,history_car.charge_time FROM history_car,car,station WHERE car.id_car = '$id_car' AND history_car.id_car = car.id_car AND station.id_station=history_car.id_station");
        return $result;
    }
    
    public function select_comment($id_station,$id_member)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM comment,member,image_station WHERE 1 
        AND comment.id_station = '$id_station' 
        AND member.id_member='$id_member'
        AND image_station.id_station='$id_station'");
        return $result;
    }

    public function select_comment_admin()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM comment WHERE 1");
        return $result;
    }

    public function select_favorite($id_member)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM favorite,map WHERE 1 AND favorite.id_member='$id_member' ");
        return $result;
    }
    
    public function select_map()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM map WHERE 1");
        return $result;
    }


    public function select_station()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM station WHERE 1 AND status=1");
        return $result;
    }
    ## SELECT DATA END
    
    ## UPDATE DATA START
    public function update_station($station_name,$location,$description,$provider,$charge_type,$facilities,$id_station)
    {
        $result = mysqli_query($this->dbcon, "UPDATE `station` SET `station_name`='$station_name',`location`='$location',
        `description`='$description',`provider`='$provider',`charge_type`='$charge_type',`facilities`='$facilities'
        WHERE `id_station`='$id_station'");
        return $result;
    }

    public function update_member($name,$email,$gender,$birthday,$id_member)
    {
        $result = mysqli_query($this->dbcon, "UPDATE `member` SET `name`='$name',`gender`='$gender',`birthday`='$birthday',`email`='$email'
        WHERE `id_member`='$id_member'");
        return $result;
    }
    ## UPDATE DATA END
    
    
    ## DEL DATA
    public function del_car($id_car,$status)
    {
        $result = mysqli_query($this->dbcon, "UPDATE `car` SET `status`='$status' WHERE `id_car`='$id_car'");
        return $result;
    }
    ## DEL DATA

}
