<?
class Album extends Controller{
    public function index(){
        $data = [];
        $data['album'] = $this->model('album_model')->getAllAlbum();
        $data['route'] = 'album';
        $this->view('Templates/header',$data);
        $this->view('Album/index',$data);
        $this->view('Templates/footer');
    }

    public function detail($id){
        if(isset($_POST["hapus-lagu"])){
            $berhasil = $this->model('song_model')->hapusDariAlbum($id,$_POST["hapus-lagu"]);
        }
        $data['album_detail'] = $this->model('album_model')->getAlbumDetail($id);
        $data['route'] = 'detail_album';
        $data['song'] = $this->model('song_model')->getAlbumSong($id);
        $this->view('Templates/header',$data);
        $this->view('Album/detail',$data);
        $this->view('Templates/footer');
    }
}
?>