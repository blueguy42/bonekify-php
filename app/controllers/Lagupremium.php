<?
class Lagupremium extends Controller{
  public function detail($creator_id){
    $data['lagupremium'] = $this->model('rest_model')->getLaguPremium($creator_id,$_SESSION['user_id']);
    $data['route'] = "lagupremium";
    $data['title'] = "Lagu Premium";

    $this->view('Templates/header',$data);
    $this->view('LaguPremium/index',$data);
    $this->view('Templates/footer',$data);
  }
}
?>