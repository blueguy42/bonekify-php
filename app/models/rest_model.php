<?
class rest_model{
  public function getPenyanyi(){
    $webservice_url = "http://bonekify-rest-service:3000/penyanyi";
    
    $request_param = '';

    // $headers = array(
    //     'Content-Type: text/xml; charset=utf-8',
    //     'Content-Length: '.strlen($request_param)
    // );
    
    $ch = curl_init($webservice_url);
    // curl_setopt ($ch, CURLOPT_GET, true);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $data = curl_exec ($ch);
    
    $result = $data;
    echo $result;
    if ($result === FALSE) {
        printf("CURL error (#%d): %s<br>\n", curl_errno($ch),
        htmlspecialchars(curl_error($ch)));
    }
    
    curl_close ($ch);
    
  }
}
?>