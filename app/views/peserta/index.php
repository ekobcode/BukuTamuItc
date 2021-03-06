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
<div class="row">
    <div class="col-sm-12">
      <?php
        Flasher::Message();
      ?>
    </div>
  </div>
      <!-- Default box -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title'] ?></h3> <div class="btn-group float-right"><a href="<?= base_url; ?>/peserta/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Peserta</a><a href="<?= base_url; ?>/peserta/laporan" class="btn float-right btn-xs btn btn-info">Laporan Peserta</a><a href="<?= base_url; ?>/peserta/lihatlaporan" class="btn float-right btn-xs btn btn-warning">Lihat Laporan Peserta</a></div>
        </div>
        <div class="card-body">
        
      <form action="<?= base_url; ?>/peserta/cari" method="post">
      <div class="card-tools">
      <div class="row mb-3">
          <div class="col-lg-6">
            <div class="input-group">
            <div class="input-group input-group-sm" style="width: 300px;">
            <input type="text" class="form-control" placeholder="" name="key" >
            <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
            <a class="btn btn-outline-danger" href="<?= base_url; ?>/user" >Reset</a>
          </div>
        </div>
    </div>

  </div>
</div>
    </form>
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama</th>
                      <th>Telepon</th>
                      <th>Email</th>
                      <th>Himpunan</th>

                      <th>Status</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['peserta'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['nama'];?></td>
                      <td><?= $row['hp'];?></td>
                      <td><?= $row['email'];?></td>
                      <td><div class="badge badge-warning"><?= $row['nama_himpunan'];?></div></td>
                      <td><?= $row['status_id'];?></div></td>
                      <td>
                        <a href="<?= base_url; ?>/peserta/edit/<?= $row['id'] ?>" class="badge badge-info">Edit</a> <a href="<?= base_url; ?>/peserta/hapus/<?= $row['id'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; endforeach; ?>
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
        <!-- <div class="card-footer">
          Footer
        </div> -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

