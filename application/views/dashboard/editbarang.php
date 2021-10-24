    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">
            <a href="<?= base_url('User/barang'); ?>">
                <button class="btn btn-yellow btn-icon mr-2 my-1" type="button"><i class="fas fa-arrow-left"></i></button>
            </a>
            Tambah Stok Barang | KETOKO
        </h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="sbp-preview">
                    <div class="sbp-preview-content">
                        <?= form_open_multipart('User/aksiEditBarang/') ?>
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input class="form-control" name="nama_barang" id="nama_barang" type="text" required="" value="<?= $barang->nama_barang; ?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="stok">Stok Barang</label>
                                <textarea class="form-control" name="stok" id="stok" rows="3"><?= $barang->stok; ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="satuan">Satuan Barang</label>
                                <textarea class="form-control" name="satuan" id="satuan" rows="3"><?= $barang->satuan; ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="harga">Harga Barang</label>
                                <textarea class="form-control" name="harga" id="harga" rows="3"><?= $barang->harga; ?></textarea>
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