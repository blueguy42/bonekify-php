<?php
class db_util{
    public static function connect(){
        $mysqli = new mysqli("db","MYSQL_USER","MYSQL_PASSWORD","MYSQL_DATABASE");

        if($mysqli->connect_error) {
            exit('Could not connect');
        }

        return $mysqli;
    }
}
?>