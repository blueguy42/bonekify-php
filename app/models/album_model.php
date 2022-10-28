<?
require_once 'db_util.php';
class album_model{
    public function getAllAlbum(){
        $db=db_util::connect();
        $query="SELECT album_id,Judul,Penyanyi,Total_duration,Image_path,YEAR(Tanggal_terbit) as Tanggal_terbit,Genre FROM Album ORDER BY Judul ASC";
        $result = mysqli_query($db,$query);
        $json = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $json;
    }

    public function getAlbumDetail($id){
        $db=db_util::connect();
        $query="SELECT * FROM Album WHERE album_id=".$id;
        $result = mysqli_query($db,$query);
        $json = mysqli_fetch_assoc($result);
        return $json;
    }
    
    public function getAlbum($id){
        $db = db_util::connect();
        $query = "SELECT * FROM Album WHERE album_id=".$id;
        $result = mysqli_query($db, $query);
        $json = mysqli_fetch_assoc($result);
        return $json;
    }

    public function updateDuration($id){
        $db = db_util::connect();
        $query = "UPDATE Album SET Total_duration = (select IFNULL(sum(`Duration`),0) from Song where album_id=". $id . ") FROM Album WHERE album_id=".$id;
        return mysqli_query($db, $query);
    }

    public function addAlbum($file, $judul, $penyanyi, $tanggalterbit, $genre){
        $db = db_util::connect();
        
        $target_dir = "img/";
        $file_name = basename($file["name"]);
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if file already exists
        while (file_exists($target_file)) {
            $file_name = "copy" . $file_name;
            $target_file = $target_dir . $file_name;
        }
        
        $check = getimagesize($file["tmp_name"]);
        if($check == false) {
            return false;
        }

        if(!move_uploaded_file($file["tmp_name"], $target_file)){
            return false;
        }

        # insert album
        $query = "INSERT INTO Album (judul, penyanyi, total_duration, image_path, tanggal_terbit, genre) VALUES 
        ('" . $judul . "', '" . $penyanyi . "', 0, '" . basename($file["name"]) . "', '" . $tanggalterbit . "', '" . $genre . "')";
        return mysqli_query($db,$query);
    }

    public function gantiJudul($id,$judulbaru){
        $db = db_util::connect();
        $query = sprintf("UPDATE Album
                SET Judul='%s'
                WHERE album_id=%u;",$judulbaru,$id);
        return mysqli_query($db,$query);
    }

    public function gantiTanggal($id,$tanggalbaru){
        $db = db_util::connect();
        $query = sprintf("UPDATE Album
                SET Tanggal_terbit='%s'
                WHERE Album_id=%u",$tanggalbaru,$id);
        return mysqli_query($db,$query);
    }

    public function gantiGenre($id,$genrebaru){
        $db = db_util::connect();
        $query = sprintf("UPDATE Album
                SET Genre='%s'
                WHERE Album_id=%u",$genrebaru,$id);
        return mysqli_query($db,$query);
    }

    public function gantiCover($id,$coverbaru){
        $db = db_util::connect();

        #update cover saat ini ke db
        $query = sprintf("UPDATE Album SET Image_path='%s' WHERE album_id=%u;",$coverbaru,$id);
        
        return mysqli_query($db,$query);
    }
}
?>