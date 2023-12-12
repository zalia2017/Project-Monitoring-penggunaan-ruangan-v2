<div class="card mt-2">
  <div class="card-header">
    Data Master Kelas
  </div>
  <div class="card-body">
  <?= $this->session->flashdata('pesan'); ?>

  <?php 
        if($this->session->has_userdata('isLogin')) { ?>      
    <div class="d-flex flex-row-reverse">
      
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-plus"></i> Tambah
      </button>
    </div>
    <hr />
    <?php } ?>
    <div class="table-responsive">
      <table class="table table-hover table-striped" id="myTable">
        <thead class="thead-dark">
          <tr>
            <th>
              NO
            </th>
            <th>NAMA KELAS</th>
            <th>LOKASI KELAS</th>
            <th>STATUS KELAS</th>
            <?php
                if($this->session->has_userdata('isLogin')) { ?>    
                  <th>AKSI</th>
            <?php } ?>

          </tr>
        </thead>
        <tbody>
          <?php 
            $a = 1;
            foreach($kelas->result_array() as $kelas){ ?>
            <tr>
              <td><?=$a;?></td>
              <td><?=$kelas['nama_kelas'];?></td>
              <td><?=$kelas['lokasi_kelas'];?></td>
              <td><?=$kelas['status_kelas'];?></td>
              <?php
                if($this->session->has_userdata('isLogin')) { ?>    
                  <td></td>
              <?php } ?>
            </tr>
          <?php  $a++ ;} ?>

        </tbody>

      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= base_url('Kelas/simpan'); ?>">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Ruang Kelas</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nama" id="floatingInput" required placeholder="Lab 1">
            <label for="floatingInput">Nama Kelas</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="lokasi" id="floatingInput" required placeholder="Lantai 1 Gedung A">
            <label for="floatingInput">Lokasi Kelas</label>
          </div>
          <div class="form-floating mb-3">
            <select class="form-select" id="floatingSelect" name="status" required placeholder="Lantai 1 Gedung A">
              <option value="Kosong">Kosong</option>
              <option value="Terisi">Terisi</option>
            </select>
            <label for="floatingSelect">Status Ruang Kelas</label>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <input type="submit" class="btn btn-primary" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>