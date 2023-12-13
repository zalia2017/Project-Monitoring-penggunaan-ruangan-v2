</div>
<footer class="container-fluid bg-dark text-light fixed-bottom">
    <h5 align="center">Footer</h5>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#myTable').dataTable();

    $('.alert').alert().delay(3000).slideUp('slow');

    $('body').on('click', '.btn-edit-kelas', function() {
        var id = $(this).data('id');

        $.ajax({
            url: "<?= base_url('Kelas/showKelas/'); ?>" + id,
            type: 'get',
            success: function(result) {
                var status = result.status_kelas
                var statusString = ''
                if (status == 'Kosong') {
                    statusString += '<option value="Kosong" selected>Kosong</option>'
                    statusString += '<option value="Terisi">Terisi</option>'
                } else {
                    statusString += '<option value="Kosong">Kosong</option>'
                    statusString += '<option value="Terisi" selected>Terisi</option>'
                }
                $('.modal-content').html(`
            <form method="POST" action="<?= base_url('Kelas/updateKelas'); ?>">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Ruang Kelas</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="form-floating mb-3">
                    <input type="hidden" value="` + id +
                    `" name="id">
                    <input type="text" class="form-control" name="nama" id="floatingInput" required placeholder="Lab 1" value="` +
                    result.nama_kelas +
                    `">
                    <label for="floatingInput">Nama Kelas</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="lokasi" id="floatingInput" required placeholder="Lantai 1 Gedung A" value="` +
                    result.lokasi_kelas + `">
                    <label for="floatingInput">Lokasi Kelas</label>
                  </div>
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" name="status" required placeholder="Lantai 1 Gedung A">
                      ` + statusString + `
                    </select>
                    <label for="floatingSelect">Status Ruang Kelas</label>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <input type="submit" class="btn btn-primary" value="Update">
                </div>
              </form>
            `)
            }
        })
    })

    $('body').on('click', '.btn-edit-penggunaan', function() {
        var id = $(this).data('id');
        // alert(id);

        $.ajax({
            url: "<?= base_url('Penggunaan_kelas/show/'); ?>" + id,
            type: 'get',
            success: function(result) {
                // return console.log(result.kelas)
                var kelas = result.kelas;
                var penggunaan = result.penggunaan;
                // return console.log(kelas);
                var kelasString = ''
                kelas.forEach((myKelas) => {
                    kelasString += '<option value="'+myKelas.id_kelas+'">'+myKelas.nama_kelas+'</option>'
                })

                $('.modal-content').html(`
            <form method="POST" action="<?= base_url('Penggunaan_kelas/update'); ?>">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Penggunaan Ruang Kelas</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="hidden" value="`+penggunaan.id_penggunaan+`" name="id">
            <input type="text" class="form-control" value="`+penggunaan.nama_kegiatan+`" name="nama" id="floatingInput" required placeholder="Lab 1">
            <label for="floatingInput">Nama Kegiatan</label>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" name="deskripsi" id="floatingTextarea" style="height:100px" required placeholder="Deskripsi Kegiatan">`+penggunaan.deskripsi_kegiatan+`
            </textarea>
            <label for="floatingTexatea">Deskripsi Kegiatan</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" value="`+penggunaan.tanggal_mulai+`" name="tglMulai" id="floatingTanggalMulai" required placeholder="Lantai 1 Gedung A">
            <label for="floatingTanggalMulai">Tanggal Mulai</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control"  value="`+penggunaan.tanggal_selesai+`" name="tglSelesai" id="floatingTanggalSelesai" required placeholder="Lantai 1 Gedung A">
            <label for="floatingTanggalSelesai">Tanggal Selesai</label>
          </div>
          <div class="form-floating mb-3">
            <select class="form-select" id="floatingSelect" name="idKelas" required placeholder="Lantai 1 Gedung A">
                `+kelasString+`
            </select>
            <label for="floatingSelect">Ruang Kelas</label>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <input type="submit" class="btn btn-primary" value="Update">
        </div>
      </form>
            `)
            }
        })
    })
})
</script>
</body>

</html>