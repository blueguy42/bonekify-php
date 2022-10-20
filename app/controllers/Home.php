<?php 
class Home extends Controller{
    public function index(){
        $this->view('Templates/header');
        $this->view('Home/index');
        $this->view('Templates/footer');
    }
}
?>