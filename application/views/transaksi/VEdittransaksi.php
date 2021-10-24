    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">
            <a href="<?= base_url('transaksi'); ?>">
                <button class="btn btn-yellow btn-icon mr-2 my-1" type="button"><i class="fas fa-arrow-left"></i></button>
            </a>
            Edit Transaksi | KETOKO
        </h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="sbp-preview">
                    <div class="sbp-preview-content">
                        <?= form_open_multipart('Transaksi/aksiEditTrans/') ?>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="id_transaksi">ID Transaksi</label>
                                <input name="id_transaksi" class="form-control" id="id_transaksi" type="number" placeholder="" value="<?= $trans->id_transaksi;?>" readonly/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="jumlah">Jumlah Beli</label>
                                <input name="jumlah" class="form-control" id="jumlah" type="number" placeholder="" value="<?= $trans->jumlah;?>"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal_transaksi">Tanggal Transaksi</label>
                                <input name="tanggal_transaksi" class="form-control" id="tanggal_transaksi" type="date" placeholder="" value="<?= $trans->tanggal_transaksi;?>"/>
                            </div>
                        </div>
                        <div class="text-md-right">
                            <button type="submit" class="btn btn-primary "> Submit </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->