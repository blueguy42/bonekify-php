<?php 
class Home extends Controller{
    public function index($page = 1){
        // PAGINATION
        $rowsperpage = 8;
        $currentPage = (isset($_GET["page"])) ? $_GET["page"] : 1 ;
        $startRow = ($rowsperpage * $currentPage) - $currentPage ;

        $data=[];
        $temp = $this->model('song_model')->getAllSong();
        $data["banyakpage"] = ceil(count($temp) / $rowsperpage); // BANYAK ROWS DI TOTAL DATA

        $data["song"] = $this->model('song_model')->getSomeSong($startRow, $rowsperpage);
        $data["currentPage"] = $currentPage;

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