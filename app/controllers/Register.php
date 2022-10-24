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
    public function checknama($param1){
        $data = array();
        $data["exists"] = $this->model("user_model")->isNamaTaken($param1);
        echo json_encode($data);
    }
    public function submit(){
        $email = $_POST["email"];
        $sandi = $_POST["sandi"];
        $nama = $_POST["nama"];
        $this->model("user_model")->addAccount($email,$sandi,$nama);
        $_SESSION["username"] = $nama;
        $_SESSION["admin"] = 0;
        header('Location: ' . BASEURL . '/home');
    }
}
?>