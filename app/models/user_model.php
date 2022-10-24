<?php
require_once "db_util.php";
class user_model{
    public function isEmailTaken($email){
        $db = db_util::connect();
        $sql = "SELECT * FROM User WHERE email = \"" . $email . "\"";

        $result = mysqli_query($db, $sql);
        $result2 = mysqli_fetch_assoc($result);


        if ($result2) { // KALAU KETEMU
            return 1;
        }
        else{
            return 0;
        }
    }
    public function isNamaTaken($nama){
        $db = db_util::connect();
        $sql = "SELECT * FROM User WHERE username = \"" . $nama . "\"";

        $result = mysqli_query($db, $sql);
        $result2 = mysqli_fetch_assoc($result);


        if ($result2) { // KALAU KETEMU
            return 1;
        }
        else{
            return 0;
        }
    }

    public function addAccount($email, $password, $nama){
        $db = db_util::connect();
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO User (email, password, username, isAdmin) VALUES
        ('" . $email . "','" . $passwordHashed . "','" . $nama ."',0)";
        mysqli_query($db, $sql) ;
    }

    public function isLoginValid($emailnama, $sandi){
        $data = array();

        $db = db_util::connect();
        $sql = "SELECT * FROM User WHERE email = \"" . $emailnama . "\" OR username = \"" . $emailnama . "\"";

        $result = mysqli_query($db, $sql);
        $result2 = mysqli_fetch_assoc($result);


        if ($result2) { // KALAU username / emailnya ada
            $data["exists"] = 1;
            if (password_verify($sandi, $result2["password"])){
                $data["valid"] = 1;
            }
            else{
                $data["valid"] = 0;
            }
            $data["isAdmin"] = $result2["isAdmin"];
            $data["username"] = $result2["username"];
        }
        else{
            $data["exists"] = 0;
            $data["valid"] = 0;
        }
        return $data;
    }
}
?>