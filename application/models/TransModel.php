<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransModel extends CI_Model
{

    public function insert($kode_barang, $jumlah, $tanggal_transaksi)
    {
        $arr = array(
            'KODE_BARANG' => $kode_barang,
            'JUMLAH'        => $jumlah,
            'TANGGAL_TRANSAKSI' => $tanggal_transaksi
        );
        $this->db->insert('transaksi', $arr);
        return "Berhasil insert";
    }
    public function getTransaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('barang', 'transaksi.kode_barang = barang.kode_barang');
        $query = $this->db->get();
        return $query->result();
    }
    public function get($id_transaksi)
    {
        return $this->db->where('id_transaksi', $id_transaksi)->get('transaksi')->row();
    }
    public function update($nama_barang, $stok, $satuan)
    {
        $data = [
            'NAMA_BARANG' => $nama_barang,
            'STOK'        => $stok,
            'SATUAN'      => $satuan
        ];
        $this->db->where('NAMA_BARANG', $nama_barang)->update('barang', $data);
    }
    public function delete($kode_barang)
    {
        $this->db->where('KODE_BARANG', $kode_barang)->delete('barang');
        return 'Berhasil delete';
    }
}
