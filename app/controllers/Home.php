<?php 
class Home extends Controller{
    public function index(){
        $data=[];
        $data["song"] = $this->model('song_model')->getAllSong();
        $this->view('Templates/header');
        $this->view('Home/index',$data);
        $this->view('Templates/footer');
    }
    public function logout(){
        setcookie("username", "", time() -3600, "/"); 
        setcookie("admin", 0, time() -3600, "/"); 
        header('Location: ' . BASEURL . '/home');
    }
}
?>