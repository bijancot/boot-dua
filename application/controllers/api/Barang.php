<?php

use chriskacerguis\RestServer\RestController;

class Barang extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangModel');
        $this->load->model('TokenModel');
        $this->load->library('notification');
    }

    public function index_get()
    {
        $this->load->model('BarangModel');

        $barang = $this->BarangModel->getBarang();
        $this->response(['status' => true, 'message' => 'Data ditemukan', 'data' => $barang], 200);
    }

    public function index_post()
    {
        $judul = $this->post('judul');
        $isi = $this->post('isi');

        $arr = array(
            'judul' => $judul,
            'isi_berita' => $isi
        );
        $this->BeritaModel->insert($arr);

        $notif['title'] = 'Info';
        $notif['message'] = 'Terdapat Berita Baru!';
        $notif['regisIds'] = $this->TokenModel->get();
        $this->notification->push($notif);
        $this->response(['status' => true, 'message' => 'Data Berhasil ditambahkan'], 200);
    }

    public function index_put($id_berita)
    {
        $judul = $this->put('judul');
        $isi = $this->put('isi');

        $arr = array(
            'judul' => $judul,
            'isi_berita' => $isi,
            'id_berita' => $id_berita
        );
        $this->BeritaModel->update($arr);
        $this->response(['status' => true, 'message' => 'Data berhasil diubah'], 200);
    }

    public function index_delete($id_berita)
    {
        $this->BeritaModel->delete($id_berita);
        $this->response(['status' => true, 'message' => 'Data dihapus'], 200);
    }

    public function detail_get($id_berita)
    {
        $berita = $this->BeritaModel->get($id_berita);
        $this->response(['status' => true, 'data' => $berita], 200);
    }

    public function like_put($id_berita)
    {
        $berita = $this->BeritaModel->get($id_berita);

        $nilaiBaru = $berita->like_berita + 1;
        $arr = array(
            'like_berita' => $nilaiBaru,
            'id_berita' => $id_berita
        );
        $this->BeritaModel->update($arr);
        $this->response(['status' => true, 'message', 'Data terlike'], 200);
    }
}
