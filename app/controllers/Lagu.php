<?php
class Lagu extends Controller{
    public function putar($id){
        $data = $this->model('song_model')->getSong($id);
        $this->view('Templates/header');
        $this->view('Lagu/putar',$data);
        $this->view('Templates/footer');
    }
}
?>