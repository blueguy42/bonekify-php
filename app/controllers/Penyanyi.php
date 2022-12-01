<?
class Penyanyi extends Controller{
  public function index(){
    $data['penyanyi'] = $this->model("rest_model")->getPenyanyi();
    $data['title'] = "Penyanyi Premium";
    $data['route'] = 'penyanyi';
    $data['status'] = $this->model("subscription_model")->getStatus($_SESSION['user_id']);
    $this->view('Templates/header',$data);
    $this->view("Penyanyi/index",$data);
    $this->view('Templates/footer',$data);
  }
}
?>