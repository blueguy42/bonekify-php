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

    public function gantiJudul($id,$judulbaru){
        $db = db_util::connect();
        $query = sprintf("UPDATE Song
                SET Judul='%s'
                WHERE song_id=%u;",$judulbaru,$id);
        return mysqli_query($db,$query);
    }

    public function gantiPenyanyi($id,$penyanyibaru){
        $db = db_util::connect();
        $query = sprintf("UPDATE Song
                SET Penyanyi='%s'
                WHERE song_id=%u",$penyanyibaru,$id);
        return mysqli_query($db,$query);
    }

    public function gantiTanggal($id,$tanggalbaru){
        $db = db_util::connect();
        $query = sprintf("UPDATE Song
                SET Tanggal_terbit='%s'
                WHERE song_id=%u",$tanggalbaru,$id);
        return mysqli_query($db,$query);
    }

    public function gantiGenre($id,$genrebaru){
        $db = db_util::connect();
        $query = sprintf("UPDATE Song
                SET Genre='%s'
                WHERE song_id=%u",$genrebaru,$id);
        return mysqli_query($db,$query);
    }

    public function gantiCover($id,$coverbaru){
        $db = db_util::connect();
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["cover-baru"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if file already exists
        if (file_exists($target_file)) {
            return False;
        }
        
        $check = getimagesize($_FILES["cover-baru"]["tmp_name"]);
        if($check == false) {
            return False;
        }

        if(!move_uploaded_file($_FILES["cover-baru"]["tmp_name"], $target_file)){
            return False;
        }

        #hapus cover lama
        $query = "SELECT Image_path FROM Song WHERE song_id=".$id;
        $result = mysqli_query($db,$query);
        $json = mysqli_fetch_assoc($result);
        unlink("img/".$json['Image_path']);

        #update cover saat ini ke db
        $query = sprintf("UPDATE Song SET Image_path='%s' WHERE song_id=%u;",basename($_FILES["cover-baru"]["name"]),$id);
        unset($_FILES["cover-baru"]);
        return mysqli_query($db,$query);
    }

    public function gantiLagu($id,$lagubaru){
        $db = db_util::connect();
        $target_dir = "music/";
        $target_file = $target_dir . basename($_FILES["lagu-baru"]["name"]);
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "1";
            return False;
        }
        
        if($fileType!=="mp3") {
            echo "2";
            return False;
        }

        if(!move_uploaded_file($_FILES["lagu-baru"]["tmp_name"], $target_file)){
            echo "3";
            return False;
        }

        #hapus lagu lama
        $query = "SELECT Audio_path FROM Song WHERE song_id=".$id;
        $result = mysqli_query($db,$query);
        $json = mysqli_fetch_assoc($result);
        unlink("music/".$json['Audio_path']);

        #update lagu saat ini ke db
        $query = sprintf("UPDATE Song SET Audio_path='%s' WHERE song_id=%u;",basename($_FILES["lagu-baru"]["name"]),$id);
        unset($_FILES["lagu-baru"]);
        return mysqli_query($db,$query);
    }
    public function getSomeSong($firstdata, $rowsperpage){
        $db = db_util::connect();
        $query = "SELECT * FROM Song ORDER BY Judul ASC LIMIT $firstdata, $rowsperpage";
        $result = mysqli_query($db, $query);
        $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $json;
    }

    public function getLatestSong(){
        $db = db_util::connect();
        $query = "SELECT * FROM (SELECT * FROM Song ORDER BY song_id DESC limit 10) AS t ORDER BY Judul ASC";
        $result = mysqli_query($db, $query);
        $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $json;
    }
}
?>