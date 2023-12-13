<div class="card mt-2">
  <div class="card-header">
    <h2 align="center">Data Penggunaan Kelas</h2>
  </div>
  <div class="card-body">
  <?= $this->session->flashdata('pesan'); ?>

  <?php 
        if($this->session->has_userdata('isLogin')) { ?>      
    <div class="d-flex flex-row-reverse">
      
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahPenggunaanModal">
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
            <th>NAMA KEGIATAN</th>
            <th>DESKRIPSI KEGIATAN</th>
            <th>TANGGAL KEGIATAN</th>
            <th>RUANG KELAS</th>
            <?php
                if($this->session->has_userdata('isLogin')) { ?>    
                  <th>AKSI</th>
            <?php } ?>

          </tr>
        </thead>
        <tbody>
          <?php 
            $a = 1;
            foreach($penggunaan_kelas->result_array() as $kelas){ ?>
            <tr>
              <td><?=$a;?></td>
              <td><?=$kelas['nama_kegiatan'];?></td>
              <td><?=$kelas['deskripsi_kegiatan'];?></td>
              <td>
                  <?=$kelas['tanggal_mulai'];?> s.d
                  <?=$kelas['tanggal_selesai'];?>
              </td>
              <td><?=$kelas['nama_kelas'];?></td>
              <?php
                if($this->session->has_userdata('isLogin')) { ?>    
                  <td>
                  <button type="button" class="btn btn-warning btn-sm btn-edit-penggunaan" data-id="<?= $kelas['id_penggunaan'];?>" data-bs-toggle="modal" data-bs-target="#editPenggunaanModal">
                    <i class="fas fa-edit"></i> Edit
                  </button>


                    <a href="<?= base_url('Penggunaan_kelas/hapus/').$kelas['id_penggunaan'] ?>"
                      onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">
                      <i class="fas fa-trash-alt"></i> Hapus
                    </a>

                  </td>
              <?php } ?>
            </tr>
          <?php  $a++ ;} ?>

        </tbody>

      </table>
    </div>
  </div>
</div>

<!-- Modal tambah kelas -->
<div class="modal fade" id="tambahPenggunaanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= base_url('Penggunaan_kelas/simpan'); ?>">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Penggunaan Ruang Kelas</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nama" id="floatingInput" required placeholder="Lab 1">
            <label for="floatingInput">Nama Kegiatan</label>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" name="deskripsi" id="floatingTextarea" style="height:100px" required placeholder="Deskripsi Kegiatan">
                </textarea>
            <label for="floatingTexatea">Deskripsi Kegiatan</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" name="tglMulai" id="floatingTanggalMulai" required placeholder="Lantai 1 Gedung A">
            <label for="floatingTanggalMulai">Tanggal Mulai</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" name="tglSelesai" id="floatingTanggalSelesai" required placeholder="Lantai 1 Gedung A">
            <label for="floatingTanggalSelesai">Tanggal Selesai</label>
          </div>
          <div class="form-floating mb-3">
            <select class="form-select" id="floatingSelect" name="idKelas" required placeholder="Lantai 1 Gedung A">
            <?php
              foreach($data_kelas->result_array() as $myKelas){ ?>
                <option value="<?= $myKelas['id_kelas'];?>"><?= $myKelas['nama_kelas'];?></option>
            <?php } ?>
            </select>
            <label for="floatingSelect">Ruang Kelas</label>
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

<!-- ------------------------->
<!-- Modal Edit -->
<div class="modal fade" id="editPenggunaanModal" tabindex="-1" aria-labelledby="editKelasModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        ..
    </div>
  </div>
</div>

<!-- -------------------------->