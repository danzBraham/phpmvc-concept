<?php
class Home extends Controller {
  public function index() {
    $data['title'] = 'Homepage';
    $data['nama'] = $this->model('User_model')->getUser();
    $this->view('templates/header', $data);
    $this->view('home/index', $data);
    $this->view('templates/footer');
  }
}