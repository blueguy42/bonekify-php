<?
require_once 'db_util.php';
class album_model{
    public function getAllAlbum(){
        $db=db_util::connect();
        $query="SELECT * FROM Album ORDER BY Judul ASC";
        $result = mysqli_query($db,$query);
        $json = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $json;
    }
}
?>