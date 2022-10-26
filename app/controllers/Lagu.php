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
        if(!$berhasil){
            echo "ndak berhasil maszeh";
        }
        
        $data["song"] = $this->model('song_model')->getSong($id);
        $this->view('Templates/header');
        $this->view('Lagu/putar',$data);
        $this->view('Templates/footer');
    }
}
?>