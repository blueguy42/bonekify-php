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
}
?>