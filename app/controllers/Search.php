<?php 
class Search extends Controller{
    public function index(){
        $this->view('Templates/header');
        $this->view('Search/Index');
        $this->view('Templates/footer');
    }
}
?>