<?php 
class Home extends Controller{
    public function index(){
        $data=[];
        $data["song"] = $this->model('song_model')->getAllSong();
        $this->view('Templates/header');
        if (isset($_COOKIE["playedSong_notLoggedIn"])) {
            echo $_COOKIE["playedSong_notLoggedIn"];
        }
        $this->view('Home/index',$data);
        $this->view('Templates/footer');
    }
}
?>