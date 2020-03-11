<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Kelola Surat Masuk</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-10">
               Data Surat Masuk
                </div>
                <div class="col-sm">
                <a href="<?= base_url('SuratMasuk/tambahsurat') ?>" class="float">
                <i class="fa fa-plus my-float"></i>
                </a>
                </div>
            </div>
              <!-- <h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk</h6> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Urut</th>
                      <th>No Surat</th>
                      <th>Tanggal Pengirim</th>
                      <th>Tanggal Terima</th>
                      <th>Pengirim</th>
                      <th>Penerima</th>
                      <th>Unit Pengelola</th>
                      <th>Perihal</th>
                      <th>disposisi</th>
                      <th>keterangan</th>
                      <th>File</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php 
                  $no = 1;
                  $total = count($SudatMasuk);
                  foreach($SudatMasuk as $data): ?>
                    <tr align="center">
                        <td><?= $no++ ?></td>
                        <td><?= $data->no_urut ?></td>
                        <td><?= $data->no_surat ?></td>
                        <td><?= $data->tgl_pengirim ?></td>
                        <td><?= $data->tgl_terima ?></td>
                        <td><?= $data->pengirim ?></td>
                        <td><?= $data->penerima ?></td>
                        <td><?= $data->unit_pengelola ?></td>
                        <td><?= $data->perihal ?></td>
                        <td><?= $data->disposisi ?></td>
                        <td><?= $data->keterangan ?></td>
                        <td><a href="<?= base_url('uploads/'.$data->nama_file.'') ?>" target="_blank">View</a<</td>
                        <td><a href="<?= base_url('SuratMasuk/deletesurat/'.$data->no_surat.'') ?>" >Delete</a<</td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

       