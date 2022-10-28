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

    public function getAlbumSong($id){
        $db = db_util::connect();
        $query = "SELECT * FROM Song WHERE album_id=".$id;
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

    public function hapusDariAlbum($albumid,$id){
        $db = db_util::connect();
        $query = sprintf("UPDATE Song
                SET album_id=null
                WHERE song_id=%u",$id);
        if(!mysqli_query($db,$query)){
            return False;
        }

        $query = "SELECT Duration FROM Song WHERE song_id=".$id;
        $result = mysqli_query($db,$query);
        $json = mysqli_fetch_assoc($result);
        $duration = $json['Duration'];

        $query = sprintf("UPDATE Album
                SET Total_duration=Total_duration-%u
                WHERE album_id=%u",$duration,$albumid);
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

    public function gantiLagu($id,$lagubaru,$durasibaru){
        $db = db_util::connect();
        $target_dir = "music/";
        $target_file = $target_dir . basename($_FILES["lagu-baru"]["name"]);
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if file already exists
        if (file_exists($target_file)) {
            return False;
        }

        if(!move_uploaded_file($_FILES["lagu-baru"]["tmp_name"], $target_file)){
            return False;
        }

        #hapus lagu lama
        $query = "SELECT Audio_path,Duration,album_id FROM Song WHERE song_id=".$id;
        $result = mysqli_query($db,$query);
        $json = mysqli_fetch_assoc($result);
        $durasilama = $json['Duration'];
        $albumid = $json["album_id"];
        unlink("music/".$json['Audio_path']);

        #update lagu saat ini ke db
        $query = sprintf("UPDATE Song SET Audio_path='%s',Duration=%u WHERE song_id=%u;",basename($_FILES["lagu-baru"]["name"]),$durasibaru,$id);
        if(!mysqli_query($db,$query)){
            return False;
        }
        unset($_FILES["lagu-baru"]);

        #update total durasi
        $query = sprintf("UPDATE Album SET Total_duration=Total_duration+%u-%u WHERE album_id=%u",$durasibaru,$durasilama,$albumid);
        return mysqli_query($db,$query);
    }

    public function hapusLagu($id){
        $db = db_util::connect();
        $query = "SELECT Image_path,Audio_path,album_id,Duration FROM Song WHERE song_id=".$id;
        $result = mysqli_query($db, $query);
        $json = mysqli_fetch_assoc($result);
        $album_id = $json['album_id'];
        $img = $json['Image_path'];
        $audio = $json['Audio_path'];
        $durasi = $json['Duration'];

        $query = "SELECT song_id FROM Song WHERE album_id=".$json['album_id'];
        $result = mysqli_query($db, $query);
        $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $jumlah_lagu = count($json);

        $query = "DELETE FROM Song WHERE song_id=".$id;
        if(!mysqli_query($db,$query)){
            return False;
        }

        $query = sprintf("UPDATE Album SET Total_duration=Total_duration-%u WHERE album_id=%u",$durasi,$album_id);
        if(!mysqli_query($db,$query)){
            return False;
        }

        #hapus album bila hanya terdiri dari satu lagu
        if($jumlah_lagu===1){
            $query = "DELETE FROM Album WHERE album_id=".$album_id;
            if(!mysqli_query($db,$query)){
                return False;
            }
            unlink("img/".$img);
        }

        #hapus audio
        unlink("music/".$audio);

        return True;
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

    public function getQuerySong($search, $firstdata){
        $db = db_util::connect();
        $query = "SELECT * FROM Song" ;
        $query2 = " WHERE Judul LIKE '%$search%' OR Penyanyi LIKE '%$search%' OR YEAR(Tanggal_terbit) LIKE '%$search%' ";
        $query3 = " ORDER BY Judul ASC LIMIT $firstdata, 10";

        $allquery = $query . $query2 . $query3;
        $result = mysqli_query($db, $allquery);
        $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $json;
    }

    public function getQuerySongLengkap($search, $firstdata, $Orderby, $filters){
        $db = db_util::connect();
        //SET SEARCH
        if ($search == "tampilkansemua"){
            $search = '';
        }
        //SET ORDER
        $arr_OrderBy = explode('-', $Orderby);
        $Orderby_kiri = $arr_OrderBy[0];
        $Orderby_kanan = $arr_OrderBy[1];
        //SET FILTERS
        if ($filters == "none") {
            $query3 = "";
        }
        else{
            $arr_filters = explode('-', $filters);
            $query3 = " AND (";
            foreach ($arr_filters as $filter) {
                $temp = str_replace("xxx"," ",$filter);
                $query3 = $query3 .  "GENRE = '$temp'";
                if (next($arr_filters)) {
                    $query3 = $query3 . " OR ";
                }
            }
            $query3 = $query3 . ") ";
        }

        $query = "SELECT * FROM Song" ;
        $query2 = " WHERE (Judul LIKE '%$search%' OR Penyanyi LIKE '%$search%' OR YEAR(Tanggal_terbit) LIKE '%$search%')";
        $query4 = " ORDER BY $Orderby_kiri $Orderby_kanan LIMIT $firstdata, 10";

        $allquery = $query . $query2 . $query3 . $query4 ;
        $result = mysqli_query($db, $allquery);
        $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $json;
    }

    public function countQuerySong($search, $filters = "none"){
        $db = db_util::connect();
        //SET SEARCH
        if ($search == "tampilkansemua"){
            $search = '';
        }

        //SET FILTERS
        if ($filters == "none") {
            $query3 = "";
        }
        else{
            $arr_filters = explode('-', $filters);
            $query3 = " AND (";
            foreach ($arr_filters as $filter) {
                $temp = str_replace("xxx"," ",$filter);
                $query3 = $query3 .  "GENRE = '$temp'";
                if (next($arr_filters)) {
                    $query3 = $query3 . " OR ";
                }
            }
            $query3 = $query3 . ") ";
        }
        $query = "SELECT * FROM Song" ;
        $query2 = " WHERE (Judul LIKE '%$search%' OR Penyanyi LIKE '%$search%' OR YEAR(Tanggal_terbit) LIKE '%$search%')";

        $allquery = $query . $query2 . $query3;
        // echo $allquery;
        $result = mysqli_query($db, $allquery);
        $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // print_r($json);
        return count($json);
    }

    public function getGenres(){
        $db = db_util::connect();
        $query = "SELECT DISTINCT GENRE FROM Song" ;
    
        $result = mysqli_query($db, $query);
        $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $json;
    }
    
    public function addSong($judul, $penyanyi, $tanggalterbit, $genre, $duration, $audio, $image, $album, $single){
        $db = db_util::connect();
        
        if ($single) {
            $target_dir = "img/";
            $target_file = $target_dir . basename($image["name"]);
            // Check if file already exists
            if (file_exists($target_file)) {
                return false;
            }
            
            $check = getimagesize($image["tmp_name"]);
            if($check == false) {
                return false;
            }
    
            if(!move_uploaded_file($image["tmp_name"], $target_file)){
                return false;
            }    
        }
        
        $target_dir = "music/";
        $target_file = $target_dir . basename($audio["name"]);
        // Check if file already exists
        if (file_exists($target_file)) {
            return False;
        }

        if(!move_uploaded_file($audio["tmp_name"], $target_file)){
            return False;
        }

        # insert song
        if (!$single) {
            $query = "INSERT INTO Song (judul, penyanyi, tanggal_terbit, genre, duration, audio_path, image_path, album_id) VALUES 
            ('" . $judul . "', '" . $penyanyi . "', '" . $tanggalterbit . "', '" . $genre . "', " . $duration . ", '" . basename($audio["name"]) . "', '" . $image . "', " . ($album != -1 ? $album : "null") . ")";
        } else {
            $query = "INSERT INTO Song (judul, penyanyi, tanggal_terbit, genre, duration, audio_path, image_path, album_id) VALUES 
            ('" . $judul . "', '" . $penyanyi . "', '" . $tanggalterbit . "', '" . $genre . "', " . $duration . ", '" . basename($audio["name"]) . "', '" . basename($image["name"]) . "', " . ($album != -1 ? $album : "null") . ")";
        }
        return mysqli_query($db,$query);


    }
}
?>