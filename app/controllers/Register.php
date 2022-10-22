<?php 
class Register extends Controller{
    public function index(){
        $this->view('Register/index');
    }
    public function checkemail(){
        $data = array();
        //127.0.0.1 adalah kata lain mysql
        $mysqli = mysqli_connect("localhost", "root", "MYSQL_ROOT_PASSWORD", "db");

        if($mysqli->connect_error) {
            exit('Could not connect');
        }

        $sql = "SELECT * FROM User";

        $result = mysqli_query($mysqli, $sql);

        if ($result) { // KALAU KETEMU
            $data["exist"] = true;
        }
        else{
            $data["exist"] = true;
        }

        echo($data);
        // echo json_encode($data);
    }
}
?>