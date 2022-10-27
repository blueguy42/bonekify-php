<?php 
class Home extends Controller{
    public function index($page = 1){
        // PAGINATION
        $rowsperpage = 8;
        $currentPage = (isset($_GET["page"])) ? $_GET["page"] : 1 ;
        $startRow = ($rowsperpage * $currentPage) - $rowsperpage ;

        $data=[];
        $data["song"] = $this->model('song_model')->getLatestSong();
        $data["route"] = 'Home';
        $data["title"] = 'Home | Bonekify';

        if (isset($_SESSION["username"])) {
            if ($_COOKIE["playCount_LoggedIn"] != $_SESSION["playCount_LoggedIn"]) {
                $_SESSION["playCount_LoggedIn"] = $_COOKIE["playCount_LoggedIn"];
                $this->model("user_model")->updatePlayCount($_SESSION["username"], $_SESSION["playCount_LoggedIn"]);
            }
        }

        $this->view('Templates/header',$data);
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
        header('Location: ' . BASEURL . '/login');
    }
}
?>