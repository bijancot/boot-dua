<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('table');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('BarangModel');
    }

    public function index()
    {
        $data = [
            'title' => "My Profile | KETOKO",
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function barang()
    {
        $dataBarang = $this->BarangModel->getBarang();

        $data = [
            'title' => "Dashboard | KETOKO",
            'Barang' => $dataBarang,
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/barang', $data);
        $this->load->view('templates/footer');
    }

    public function tambahBarang()
    {
        $data = array(
            'title' => 'Tambah Barang | KETOKO',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/tambahbarang', $data);
        $this->load->view('templates/footer');
    }

    public function aksiTambahBarang()
    {
        //menangkap data dari view tambah barang
        $nama_barang = $_POST['nama_barang'];
        $stok = $_POST['stok'];
        $satuan = $_POST['satuan'];
        $harga = $_POST['harga'];

        //mengirimkan dari controller ke barang model dengan fungsi insert
        $this->BarangModel->insert($nama_barang, $stok, $satuan, $harga);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Barang berhasil ditambahkan! </div>');
        redirect('barang');
    }

    public function editBarang($kode_barang)
    {
        $data = [
            'title' => 'Edit Barang | KETOKO',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'barang' => $this->BarangModel->get($kode_barang)
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/editbarang', $data);
        $this->load->view('templates/footer');
    }
    public function aksiEditBarang()
    {
        $nama_barang = $_POST['nama_barang'];
        $stok = $_POST['stok'];
        $satuan = $_POST['satuan'];
        $harga = $_POST['harga'];

        //mengirimkan dari controller ke barang model dengan fungsi insert
        $this->BarangModel->update($nama_barang, $stok, $satuan, $harga);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Barang berhasil Diperbarui! </div>');
        redirect('barang');
    }
    public function deleteBarang($kode_barang)
    {
        $this->BarangModel->delete($kode_barang);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Barang berhasil dihapus! </div>');
        redirect('barang');
    }
}
