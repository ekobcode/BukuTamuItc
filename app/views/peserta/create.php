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
              <form role="form" action="<?= base_url; ?>/peserta/simpanPeserta" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nama</label>
                    <input type="text" class="form-control" placeholder="masukkan nama..." name="nama">
                  </div>
                  <div class="form-group">
                    <label >Telepon</label>
                    <input type="text" class="form-control" placeholder="masukkan telepon..." name="hp">
                  </div>
                  <div class="form-group">
                    <label >Email</label>
                    <input type="email" class="form-control" placeholder="masukkan email..." name="email">
                  </div>
                  <div class="form-group">
                    <label >Himpunan</label>
                    <select class="form-control" name="himpunan_id">
                        <option value="">Pilih</option>
                         <?php foreach ($data['himpunan'] as $row) :?>
                        <option value="<?= $row['id']; ?>"><?= $row['nama_himpunan']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <!-- <div class="form-group">
                    <label >Universitas</label>
                    <select class="form-control" name="universitas_id">
                        <option value="">Pilih</option>
                         <?php foreach ($data['himpunan'] as $row) :?>
                        <option value="<?= $row['id']; ?>"><?= $row['nama_universitas'];?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>  -->
                  <!-- <div class="form-group">
                    <label >Status</label>
                    <input type="text" class="form-control" placeholder="masukkan harga buku..." name="harga">
                  </div>
                </div>
                /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->