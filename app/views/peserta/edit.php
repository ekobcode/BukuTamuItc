  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Peserta</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url; ?>/peserta/updatePeserta" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['peserta']['id']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nama</label>
                    <input type="text" class="form-control" placeholder="masukkan judul buku..." name="nama" value="<?= $data['peserta']['nama'];?>">
                  </div>
                  <div class="form-group">
                    <label >Telepon</label>
                    <input type="text" class="form-control" placeholder="masukkan penerbit buku..." name="hp" value="<?= $data['peserta']['hp'];?>">
                  </div>
                  <div class="form-group">
                    <label >Email</label>
                    <input type="text" class="form-control" placeholder="masukkan pengarang buku..." name="email" value="<?= $data['peserta']['email'];?>">
                  </div>
                  <div class="form-group">
                    <label >Himpunan</label>
                    <select class="form-control" name="himpunan_id">
                        <option value="">Pilih</option>
                         <?php foreach ($data['himpunan'] as $row) :?>
                        <option value="<?= $row['id']; ?>" <?php if($data['peserta']['himpunan_id'] == $row['id']) { echo "selected"; } ?>><?= $row['nama_himpunan']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Status</label>
                    <select class="form-control" name="status_id">
                        <option value="">Pilih</option>
                        <option value="<div class="badge badge-danger">Failed</div>">Failed</option>
                        <option value="<div class="badge badge-warning">Pending</div>">Pendding</option>
                        <option value="<div class="badge badge-success">Paid</div>">Paid</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->