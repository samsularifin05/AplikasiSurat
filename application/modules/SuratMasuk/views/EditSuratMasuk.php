<div class="container-fluid">
    <div class="col-lg-12">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Surat Masuk</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('SuratMasuk/UpdateData') ?>">
                    <?php foreach ($SuratMasuk['data'] as $row): ?>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>No Urut</label>
                                <input type="text"  value="<?= $row['no_urut'] ?>" required class="form-control form-control-user" name="no_urut" placeholder="Masukan No Urut...">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label>No Surat</label>
                                <input type="text"readonly  value="<?= $row['no_surat'] ?>" required class="form-control form-control-user" name="no_surat" placeholder="Masukan No Surat...">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label>Tanggal Pengirim</label>
                                <input type="date" value="<?= $row['tgl_pengirim'] ?>" required class="form-control form-control-user" name="tgl_pengirim" placeholder="Masukan Tanggal Pengirim...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Tanggal Terima</label>
                                <input type="date" value="<?= $row['tgl_terima'] ?>" required class="form-control form-control-user" name="tgl_terima" placeholder="Masukan Tanggal Terima...">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label>Pengirim</label>
                                <input type="text" required value="<?= $row['pengirim'] ?>" class="form-control form-control-user" name="pengirim" placeholder="Masukan Pengirim...">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label>Penerima</label>
                                <input type="text" value="<?= $row['penerima'] ?>" required class="form-control form-control-user" name="penerima" placeholder="Masukan Penerima...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Unit Pengelola</label>
                                <input type="text" value="<?= $row['unit_pengelola'] ?>" required class="form-control form-control-user" name="unit_pengelola" placeholder="Masukan Unit Pengelola...">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label>Perihal</label>
                                <input type="text" required value="<?= $row['perihal'] ?>" class="form-control form-control-user" name="perihal" placeholder="Masukan Perihal...">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label>Disposisi</label>
                                <input type="text" value="<?= $row['disposisi'] ?>" required class="form-control form-control-user" name="disposisi" placeholder="Masukan Disposisi...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control form-control-user" name="keterangan" placeholder="Masukan Unit Pengelola..."><?= $row['keterangan'] ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label>File</label>
                                
                                <input type="hidden" class="form-control form-control-user" value="<?= $row['nama_file'] ?>" name="file_name" placeholder="Masukan Perihal...">
                                <input type="file" class="form-control form-control-user" name="nama_file" placeholder="Masukan Perihal...">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label>Update Informasi Surat</label>
                                <input type="submit" value="Update Informasi Surat" class="form-control btn btn-primary" placeholder="Masukan Perihal...">
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </form>
            </div>
        </div>
    </div>
</div>