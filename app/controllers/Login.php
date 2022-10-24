<?php 
class Login extends Controller{
    public function index(){
        
        //MENANGKAP KALAU TOMBOL SUBMIT DIPENCET
        if (isset($_POST["emailnama"])){
            $data = array();
            $emailnama = $_POST["emailnama"];
            $sandi = $_POST["sandi"];

            $data = $this->model("user_model")->isLoginValid($emailnama,$sandi);

            if ($data["valid"] == 1){
                $_SESSION["username"] = $data["username"];
                $_SESSION["isAdmin"] = $data["isAdmin"];
                header('Location: ' . BASEURL . '/home');
            }
            else{
                $this->view('Login/index', $data);
            }
        // INI KALAU RENDER TEMPLATE BIASA
        } else {
            $this->view('Login/index');
        }

    }
}
?>