<?php
class Siswa_model {
  private $table = 'tb_siswa';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }
  public function getAllSiswa() {
    $this->db->query("SELECT * FROM $this->table");
    return $this->db->results();
  }

  public function getSiswaByID($id) {
    $this->db->query("SELECT * FROM $this->table WHERE id = :id");
    $this->db->bind('id', $id);
    return $this->db->result();
  }

  public function addSiswa($data) {
    $this->db->query("INSERT INTO $this->table VALUES (
      '', :nama, :kelas, :jurusan
    )");

    $this->db->bind('nama', $data['nama']);
    $this->db->bind('kelas', $data['kelas']);
    $this->db->bind('jurusan', $data['jurusan']);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function deleteSiswa($id) {
    $this->db->query("DELETE FROM $this->table WHERE id = :id");
    $this->db->bind('id', $id);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function editSiswa($data) {
    $this->db->query("UPDATE $this->table SET
                      nama = :nama,
                      kelas = :kelas,
                      jurusan = :jurusan
                      WHERE id = :id");

    $this->db->bind('id', $data['id']);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('kelas', $data['kelas']);
    $this->db->bind('jurusan', $data['jurusan']);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function searchSiswa() {
    $keyword = $_POST['keyword'];
    $this->db->query("SELECT * FROM $this->table WHERE nama LIKE :keyword");
    $this->db->bind('keyword', "%$keyword%");
    return $this->db->results();
  }
}