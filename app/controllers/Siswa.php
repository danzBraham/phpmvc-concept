<?php
class Siswa extends Controller {
  public function index() {
    $data['title'] = 'Daftar Siswa';
    $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
    $this->view('templates/header', $data);
    $this->view('siswa/index', $data);
    $this->view('templates/footer');
  }

  public function detail($id) {
    $data['title'] = 'Detail Siswa';
    $data['siswa'] = $this->model('Siswa_model')->getSiswaByID($id);
    $this->view('templates/header', $data);
    $this->view('siswa/detail', $data);
    $this->view('templates/footer');
  }

  public function insert() {
    if ($this->model('Siswa_model')->addSiswa($_POST) > 0) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    }
  }

  public function delete($id) {
    if ($this->model('Siswa_model')->deleteSiswa($id) > 0) {
      Flasher::setFlash('berhasil', 'dihapus', 'success');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    }
  }

  public function getEdit() {
    echo json_encode($this->model('Siswa_model')->getSiswaByID($_POST['id']));
  }

  public function edit() {
    if ($this->model('Siswa_model')->editSiswa($_POST) > 0) {
      Flasher::setFlash('berhasil', 'diedit', 'success');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    } else {
      Flasher::setFlash('gagal', 'diedit', 'danger');
      header('Location: ' . BASEURL . '/siswa');
      exit;
    }
  }

  public function search() {
    $data['title'] = 'Daftar Siswa';
    $data['siswa'] = $this->model('Siswa_model')->searchSiswa();
    $this->view('templates/header', $data);
    $this->view('siswa/index', $data);
    $this->view('templates/footer');
  }
}