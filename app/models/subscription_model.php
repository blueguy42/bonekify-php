<?
require_once "db_util.php";
class subscription_model{
  public function add($creator_id,$subscriber_id){
    $db = db_util::connect();
    $stmt = $db->prepare("INSERT INTO Subscription(creator_id,subscriber_id) VALUES (?,?)");
    $stmt->bind_param("ii", $creator_id, $subscriber_id);
    $stmt->execute();
    $stmt->close();
    $db->close();
  }

  public function setStatus($creator_id,$subscriber_id,$status){
    $db = db_util::connect();
    $stmt = $db->prepare("UPDATE Subscription SET status=? WHERE creator_id=? AND subscriber_id=?");
    $stmt->bind_param("sii", $status, $creator_id, $subscriber_id);
    $stmt->execute();
    $stmt->close();
    $db->close();
  }
}
?>