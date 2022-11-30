<?
class Subscribe extends Controller{
  public function add($creator_id,$subscriber_id){
    $this->model('soap_model')->addSubscription($creator_id,$subscriber_id);
  }
}
?>