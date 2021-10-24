<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('table');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('TransModel');
    }

    public function index()
    {
        $dataTrans = $this->TransModel->getTransaksi();

        $data = [
            'title' => "Transaksi | KETOKO",
            'Transaksi' => $dataTrans,
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/VTransaksi', $data);
        $this->load->view('templates/footer');
    }

    public function tambahTrans()
    {
        $this->load->model('BarangModel');

        $dataTrans = $this->TransModel->getTransaksi();
        $dataBarang = $this->BarangModel->getBarang();

        $data = [
            'title' => 'Tambah Transaksi | KETOKO',
            'Transaksi' => $dataTrans,
            'Barang' => $dataBarang,
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/VTambahtransaksi', $data);
        $this->load->view('templates/footer');
        
    }

    public function aksiTambahTrans()
    {
        //menangkap data dari view tambah barang
        $nama_barang = $_POST['nama_barang'];
        $jumlah = $_POST['jumlah'];
        $tanggal_transaksi = $_POST['tanggal_transaksi'];

        //mengirimkan dari controller ke barang model dengan fungsi insert
        $this->TransModel->insert($nama_barang, $jumlah, $tanggal_transaksi);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Barang berhasil ditambahkan! </div>');
        redirect('transaksi');
    }

    public function editTrans($id_transaksi)
    {
        $data = [
            'title' => 'Edit Barang | KETOKO',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'trans' => $this->TransModel->get($id_transaksi)
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/VEdittransaksi', $data);
        $this->load->view('templates/footer');
    }
    public function aksiEditTrans()
    {
        $id_transaksi = $_POST['id_transaksi'];
        $jumlah = $_POST['jumlah'];
        $tanggal_transaksi = $_POST['tanggal_transaksi'];

        //mengirimkan dari controller ke barang model dengan fungsi insert
        $this->TransModel->update($id_transaksi, $jumlah, $tanggal_transaksi);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Barang berhasil Diperbarui! </div>');
        redirect('transaksi');
    }
    public function deleteTrans($id_transaksi)
    {
        $this->TransModel->delete($id_transaksi);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Barang berhasil dihapus! </div>');
        redirect('transaksi');
    }
}
