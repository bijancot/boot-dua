    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url('Transaksi/tambahTrans'); ?>" class='btn btn-primary btn-sm' type='submit'><i class="fa fa-plus mr-1"></i>Tambah Transaksi</a>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <?php
                    $template = array('table_open' => '<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">');
                    $this->table->set_template($template);
                    $this->table->set_heading('No', 'Nama Barang', 'Jumlah Beli', 'Tanggal Transaksi', 'Aksi');
                    $no = 1;
                    foreach ($Transaksi as $row) {
                        $this->table->add_row(
                            $no++,
                            $row->nama_barang,
                            $row->jumlah,
                            $row->tanggal_transaksi,
                            '
                            <a title="Edit Transaksi" href="' .  base_url("Transaksi/editTrans/" . $row->id_transaksi) . '" type="button" class="btn btn-sm btn-warning mt-1"><i class="fa fa-edit"></i>
                            </a>
                            <a title="Delete Transaksi" href="' .  base_url("Transaksi/deleteTrans/" . $row->id_transaksi) . '" type="button" class="btn btn-sm btn-danger mt-1"><i class="fa fa-trash"></i>
                            </a>'
                        );
                    ?>
                        <!--Modal Hapus-->
                        <div class="modal fade" id="hapusBarangModal<?= $row->id_transaksi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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