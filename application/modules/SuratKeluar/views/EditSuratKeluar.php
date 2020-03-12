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
                <form method="post" enctype="multipart/form-data" action="<?= base_url('SuratKeluar/UpdateData') ?>">
                <?php foreach ($SuratKeluar['data'] as $row): ?>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>No Urut</label>
                                <input type="text" required value="<?= $row['no_urut'] ?>" class="form-control form-control-user" name="no_urut" placeholder="Masukan No Urut...">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label>No Surat</label>
                                <input type="text" required readonly value="<?= $row['no_surat'] ?>" class="form-control form-control-user" name="no_surat" placeholder="Masukan No Surat...">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label>Tanggal Surat</label>
                                <input type="date" required value="<?= $row['tgl_surat'] ?>" class="form-control form-control-user" name="tgl_surat" placeholder="Masukan Tanggal Pengirim...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Perihal</label>
                                <input type="text" value="<?= $row['perihal'] ?>" required class="form-control form-control-user" name="perihal" placeholder=" Masukan Perihal...">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label>Sifat Surat</label>
                                <input type="text" value="<?= $row['sifat_surat'] ?>" required class="form-control form-control-user" name="sifat_surat" placeholder="Masukan Sifat Surat...">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label>Tujuan</label>
                                <input type="text" value="<?= $row['tujuan'] ?>" required class="form-control form-control-user" name="tujuan" placeholder="Masukan Tujuan...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" value="<?= $row['alamat'] ?>"required class="form-control form-control-user" name="alamat" placeholder="Masukan ALamat ...">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label>Tembusan</label>
                                <input type="text" value="<?= $row['tembusan'] ?>" required class="form-control form-control-user" name="tembusan" placeholder="Masukan Tembusan...">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                                <label>File</label>
                                <input type="hidden" class="form-control form-control-user" value="<?= $row['nama_file'] ?>" name="file_name" placeholder="Masukan Perihal...">
                                <input type="file" class="form-control form-control-user" name="nama_file" placeholder="Masukan Perihal...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control form-control-user" name="keterangan" placeholder="Masukan Keterangan..."><?= $row['keterangan'] ?></textarea>
                            </div>
                        </div>
                       
                        <div class="col">
                        <div class="form-group">
                                <label>Simpan</label>
                                <input type="submit" value="Simpan" class="form-control btn btn-primary btn-lg btn-block" placeholder="Keluaran Perihal...">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </form>
            </div>
        </div>
    </div>
</div>