<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Surat Masuk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php  foreach($SuratMasuk['data'] as $row): ?>
                                    <?= $row['jml'] ?> Surat
                                <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
         

            <!-- Earnings (Monthly) Card Example -->
          

            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-6">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Surat Keluar
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php  foreach($SuratKeluar['data'] as $row): ?>
                                    <?= $row['jml'] ?> Surat
                                <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </h1>

</div>