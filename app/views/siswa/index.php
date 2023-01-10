<div class="container py-3">
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary my-3 modalAdd" data-bs-toggle="modal" data-bs-target="#modalForm">
        Tambah Data Siswa
      </button>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <form action="<?= BASEURL; ?>/siswa/search" method="POST" autocomplete="off">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search Siswa" aria-label="Recipient's username" aria-describedby="search" id="keyword" name="keyword">
          <button class="btn btn-primary" type="submit" id="search">Button</button>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <h3>Daftar Siswa</h3>
      <ul class="list-group">
        <?php foreach($data['siswa'] as $siswa) : ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <?= $siswa['nama']; ?>
            <div class="col-4 d-flex justify-content-evenly align-items-center">
              <a href="<?= BASEURL;?>/siswa/detail/<?= $siswa['id']?>" class="badge text-bg-primary text-decoration-none">Detail</a>
              <a href="<?= BASEURL;?>/siswa/edit" data-id="<?= $siswa['id']; ?>" class="badge text-bg-success text-decoration-none modalEdit" data-bs-toggle="modal" data-bs-target="#modalForm">Edit</a>
              <a href="<?= BASEURL;?>/siswa/delete/<?= $siswa['id']?>" class="badge text-bg-danger text-decoration-none" onclick="return confirm('Are you sure want to delete this data?');">Delete</a>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalForm" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalTitle">Tambah Data Siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= BASEURL;?>/siswa/insert" method="POST" autocomplete="off">
      <input type="hidden" name="id" id="id">
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama siswa..." name="nama">
          </div>
          <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <select class="form-select" aria-label="kelas" id="kelas" name="kelas">
              <option selected>Pilih Kelas</option>
              <option value="X">X</option>
              <option value="XI">XI</option>
              <option value="XII">XII</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select class="form-select" aria-label="jurusan" id="jurusan" name="jurusan">
              <option selected>Pilih Jurusan</option>
              <option value="RPL">RPL</option>
              <option value="MM">MM</option>
              <option value="DKV">DKV</option>
              <option value="TKJ">TKJ</option>
              <option value="ANIMASI">ANIMASI</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
      </form>
    </div>
  </div>
</div>