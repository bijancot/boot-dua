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
    public function update($id_transaksi, $jumlah, $tanggal_transaksi)
    {
        $data = [
            'ID_TRANSAKSI' => $id_transaksi,
            'JUMLAH'        => $jumlah,
            'TANGGAL_TRANSAKSI'      => $tanggal_transaksi
        ];
        $this->db->where('ID_TRANSAKSI', $id_transaksi)->update('transaksi', $data);
    }
    public function delete($id_transaksi)
    {
        $this->db->where('ID_TRANSAKSI', $id_transaksi)->delete('transaksi');
        return 'Berhasil delete';
    }
}
