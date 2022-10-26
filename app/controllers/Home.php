<?php 
class Home extends Controller{
    public function index(){
        $data=[];
        $data["song"] = $this->model('song_model')->getLatestSong();

        if (isset($_SESSION["username"])) {
            if ($_COOKIE["playCount_LoggedIn"] != $_SESSION["playCount_LoggedIn"]) {
                $_SESSION["playCount_LoggedIn"] = $_COOKIE["playCount_LoggedIn"];
                $this->model("user_model")->updatePlayCount($_SESSION["username"], $_SESSION["playCount_LoggedIn"]);
            }
        }

        $this->view('Templates/header');
        $this->view('Home/index',$data);
        $this->view('Templates/footer');
    }
    public function logout(){
        if (isset($_COOKIE["playCount_LoggedIn"])) {
            $this->model("user_model")->updatePlayCount($_SESSION["username"], $_COOKIE["playCount_LoggedIn"]);
        }
        
        setcookie("username", "", time() -3600, "/"); 
        setcookie("isAdmin", 0, time() -3600, "/"); 
        setcookie("playCount_LoggedIn", 0, time() -3600, "/"); 
        unset($_SESSION["username"]);
        unset($_SESSION['isAdmin']);
        unset($_SESSION['playCount_LoggedIn']);
        header('Location: ' . BASEURL . '/');
    }
}
?>