<?php 
class Search extends Controller{
    public function index(){
        // PAGINATION CONFIG
        $data=[];
        $rowsperpage = 10;
        $currentPage = 1;
        $startRow = ($rowsperpage * $currentPage) - $rowsperpage ;
        $data["route"] = 'Search';

        if (isset($_POST["navbar-search"])){
            $data["song"] = $this->model('song_model')->getQuerySong($_POST["navbar-search"], $startRow, $rowsperpage);
            // $data["banyakpage"] = ceil(count($temp) / $rowsperpage); // BANYAK ROWS DI TOTAL DATA

            $this->view('Templates/header',$data);
            $this->view('Search/index');
            $this->view('Templates/tabellagu',$data);
            $this->view('Templates/footer');
        }
        else{
            $this->view('Templates/header',$data);
            $this->view('Search/index');
            $this->view('Templates/tabellagu',$data);
            $this->view('Templates/footer');
        }
    }

    public function livesearchphp($search){
        // PAGINATION CONFIG
        $data=[];
        $rowsperpage = 10;
        $currentPage = 1;
        $startRow = ($rowsperpage * $currentPage) - $rowsperpage ;

        $data["song"] = $this->model('song_model')->getQuerySong($search, $startRow, $rowsperpage);
        $data["exists"] = (count($data["song"]) > 0) ? 1 : 0 ;

        echo json_encode($data);
    }
}
?>