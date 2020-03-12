<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Export Laporan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-10">
                    Laporan Surat Masuk
                </div>
                <div class="col-sm">

                </div>
            </div>
            <!-- <h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk</h6> -->
        </div>
        <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="<?= base_url('Laporan/LaporanSuratMasuk/ExportLaporanSuratMasuk') ?>">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Tanggal Dari</label>
                        <input type="date" required class="form-control form-control-user" name="tgl_dari"
                            placeholder="Masukan No Urut...">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Tanggal Sampai</label>
                        <input type="date" required class="form-control form-control-user" name="tgl_sampai"
                            placeholder="Masukan No Urut...">
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col">
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="form-control btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

</div>