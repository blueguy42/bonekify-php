<?php
class Lagu extends Controller{
    public function putar($id){
        $data=[];
        if(isset($_POST["judul-baru"])){
            $berhasil = $this->model('song_model')->gantiJudul($id,$_POST["judul-baru"]);
        }
        if(isset($_POST["penyanyi-baru"])){
            $berhasil = $this->model('song_model')->gantiPenyanyi($id,$_POST["penyanyi-baru"]);
        }
        if(isset($_POST["tanggal-baru"])){
            $berhasil = $this->model('song_model')->gantiTanggal($id,$_POST["tanggal-baru"]);
        }
        if(isset($_POST["genre-baru"])){
            $berhasil = $this->model('song_model')->gantiGenre($id,$_POST["genre-baru"]);
        }
        if(isset($_FILES["cover-baru"])){
            $berhasil = $this->model('song_model')->gantiCover($id,$_FILES["cover-baru"]);
        }
        if(isset($_FILES["lagu-baru"])){
            $berhasil = $this->model('song_model')->gantiLagu($id,$_FILES["lagu-baru"]);
        }

        if (isset($_SESSION["username"])) {
            if ($_COOKIE["playCount_LoggedIn"] != $_SESSION["playCount_LoggedIn"]) {
                $_SESSION["playCount_LoggedIn"] = $_COOKIE["playCount_LoggedIn"];
                $this->model("user_model")->updatePlayCount($_SESSION["username"], $_SESSION["playCount_LoggedIn"]);
            }
        }

        $data["song"] = $this->model('song_model')->getSong($id);
        $data["title"] = $data["song"]["Judul"] . ' - ' . $data["song"]["Penyanyi"] . " | Bonekify";
        $this->view('Templates/header',$data);
        $this->view('Lagu/putar',$data);
        $this->view('Templates/footer');
    }
}
?>