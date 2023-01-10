<?php
class About extends Controller {
  public function index($nama = 'Zidan', $hobi = 'Ngoding') {
    $data['nama'] = $nama;
    $data['hobi'] = $hobi;
    $data['title'] = 'About';
    $this->view('templates/header', $data);
    $this->view('about/index', $data);
    $this->view('templates/footer');
  }

  public function page() {
    $data['title'] = 'Page';
    $this->view('templates/header', $data);
    $this->view('about/page');
    $this->view('templates/footer');
  }
}