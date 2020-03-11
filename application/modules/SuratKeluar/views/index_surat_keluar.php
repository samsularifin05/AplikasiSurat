<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Kelola Surat Keluar</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-10">
               Data Surat Keluar
                </div>
                <div class="col-sm">
                <a href="<?= base_url('SuratKeluar/tambahsurat') ?>" class="float">
                  <i class="fa fa-plus my-float"></i>
                </a>
                </div>
            </div>
              <!-- <h6 class="m-0 font-weight-bold text-primary">Data Surat Keluar</h6> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Urut</th>
                      <th>No Surat</th>
                      <th>Tanggal Surat</th>
                      <th>Perihal</th>
                      <th>Sifat Surat</th>
                      <th>Tujuan</th>
                      <th>Alamat</th>
                      <th>Tembusan</th>
                      <th>Keterangan</th>
                      <th>File</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php 
                  $no = 1;
                  $total = count($SudatKeluar);
                  foreach($SudatKeluar as $data): ?>
                    <tr align="center">
                        <td><?= $no++ ?></td>
                        <td><?= $data->no_urut ?></td>
                        <td><?= $data->no_surat ?></td>
                        <td><?= $data->tgl_surat ?></td>
                        <td><?= $data->perihal ?></td>
                        <td><?= $data->sifat_surat ?></td>
                        <td><?= $data->tujuan ?></td>
                        <td><?= $data->alamat ?></td>
                        <td><?= $data->tembusan ?></td>
                        <td><?= $data->keterangan ?></td>
                        <td><a href="<?= base_url('uploads/'.$data->nama_file.'') ?>" target="_blank">View</a<</td>
                        <td>
                        
                        <a href="<?= base_url('SuratKeluar/Edit/'.$data->no_surat.'') ?>" >Edit</a>
                        <a href="<?= base_url('SuratKeluar/deletesurat/'.$data->no_surat.'') ?>" >Delete</a>
                        
                        </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

       