<?
class Lagupremium extends Controller{
  public function index(){
    $data['lagupremium'] = $this->model('rest_model')->getLaguPremium($_SESSION['user_id']);
    $data['route'] = "lagupremium";
    $data['title'] = "Lagu Premium";

    $this->view('Templates/header',$data);
    $this->view('LaguPremium/index',$data);
    $this->view('Templates/footer',$data);
  }
}
?>