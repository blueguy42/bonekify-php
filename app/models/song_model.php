<?php
require_once "db_util.php";
class song_model{
    public function getAllSong(){
        $db = db_util::connect();
        $query = "SELECT * FROM Song ORDER BY Judul ASC";
        $result = mysqli_query($db, $query);
        $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $json;
    }

    public function getSong($id){
        $db = db_util::connect();
        $query = "SELECT * FROM Song WHERE song_id=".$id;
        $result = mysqli_query($db, $query);
        $json = mysqli_fetch_assoc($result);
        return $json;
    }
}
?>