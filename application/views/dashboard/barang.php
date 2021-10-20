    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Stok Barang</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url('User/tambahBarang'); ?>" class='btn btn-primary btn-sm' type='submit'><i class="fa fa-plus mr-1"></i>Tambah Stok</a>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <?php
                    $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');
                    $this->table->set_template($template);
                    $this->table->set_heading('No', 'Nama Barang', 'Stok', 'Satuan', 'Harga Per Barang', 'Aksi');
                    $no = 1;
                    foreach ($Barang as $row) {
                        $this->table->add_row(
                            $no++,
                            $row->nama_barang,
                            $row->stok,
                            $row->satuan,
                            $row->harga,
                            '
                            <a title="Edit Stok Barang" href="' .  base_url("User/editBarang/" . $row->kode_barang) . '" type="button" class="btn btn-sm btn-warning mt-1"><i class="fa fa-edit"></i>
                            </a>
                            <button title="Hapus Barang" type="button" class="btn btn-sm btn-danger mt-1" data-toggle="modal" data-target="#hapusBarangModal' . $row->kode_barang . '"><i class="fa fa-trash"></i>
                            </button>'
                        );
                    ?>
                        <!--Modal Hapus-->
                        <div class="modal fade" id="hapusBarangModal<?= $row->kode_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin akan menghapus <b><?= $row->nama_barang ?></b> ?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('User/deleteBarang/') ?><?= $row->kode_barang; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Akhir Modal Hapus-->
                    <?php }
                    echo $this->table->generate(); ?>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->