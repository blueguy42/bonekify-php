<?php 
class Register extends Controller{
    public function index(){
        if (!isset($_COOKIE["username"])) {
            $this->view('Register/index');
        } else {
            header('Location: ' . BASEURL . '/home');
        }
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
        setcookie("username", $nama, time() + (86400 * 30), "/"); 
        setcookie("admin", 0, time() + (86400 * 30), "/"); 

        header('Location: ' . BASEURL . '/home');
    }
}
?>