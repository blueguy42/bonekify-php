<?php 
class Users extends Controller{
    public function index() {
        if (isset($_SESSION["isAdmin"]) and $_SESSION["isAdmin"] == 1) {
            $data=[];
            $data["users"] = $this->model('user_model')->getListUser();
            
            $this->view('Templates/header');
            $this->view('Users/index',$data);
            $this->view('Templates/footer');
        
        } else {
            header('Location: ' . BASEURL . '/');
        }   
    }
}
?>