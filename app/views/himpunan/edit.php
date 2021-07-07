  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Himpunan</h1>
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
              <form role="form" action="<?= base_url; ?>/himpunan/updateHimpunan" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?= $data['himpunan']['id']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nama Himpunan</label>
                    <input type="text" class="form-control" placeholder="masukkan himpunan..." name="nama_himpunan" value="<?= $data['himpunan']['nama_himpunan']; ?>">
                  </div>
                  <div class="form-group">
                    <label >Nama Universitas</label>
                    <input type="text" class="form-control" placeholder="masukkan universitas..." name="nama_universitas" value="<?= $data['himpunan']['nama_universitas']; ?>">
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