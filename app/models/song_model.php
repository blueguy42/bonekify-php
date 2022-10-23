<?php
require_once "db_util.php";
class song_model{
    public function getAllSong(){
        $db = db_util::connect();
        $query = "SELECT * FROM Song";
        $result = mysqli_query($db, $query);
        $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
        echo json_encode($json);
    }
}
?>