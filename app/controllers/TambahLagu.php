<?php
class TambahLagu extends Controller{
    public function index($page = 1){
        // PAGINATION

        $this->view('Templates/header');
        $this->view('Templates/footer');
}