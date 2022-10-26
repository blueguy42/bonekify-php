<?php 
class Home extends Controller{
    public function index(){
        $data=[];
        $data["song"] = $this->model('song_model')->getLatestSong();

        $this->view('Templates/header');
        $this->view('Home/index',$data);
        $this->view('Templates/footer');
    }
    public function logout(){
        setcookie("username", "", time() -3600, "/"); 
        setcookie("isAdmin", 0, time() -3600, "/"); 
        unset($_SESSION["username"]);
        unset($_SESSION['isAdmin']);
        header('Location: ' . BASEURL . '/home');
    }
}
?>