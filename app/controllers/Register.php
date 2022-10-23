<?php 
class Register extends Controller{
    public function index(){
        $this->view('Register/index');
    }
    public function checkemail($param1){
        $data = array();
        $data["exists"] = $this->model("user_model")->isEmailTaken($param1);
        echo json_encode($data);
    }
}
?>