<?php 
class Users extends Controller{
    public function index() {
        $data=[];
        $data["users"] = $this->model('user_model')->getListUser();
        
        $this->view('Templates/header');
        $this->view('Users/index',$data);
        $this->view('Templates/footer');
    }
}
?>