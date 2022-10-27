<?
class Album extends Controller{
    public function index(){
        $data = [];
        $data['album'] = $this->model('album_model')->getAllAlbum();
        $data['route'] = 'album';
        $this->view('Templates/header');
        $this->view('Album/index',$data);
        $this->view('Templates/footer');
    }
}
?>