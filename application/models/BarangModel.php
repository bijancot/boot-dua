<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangModel extends CI_Model
{

    public function insert($nama_barang, $stok, $satuan, $harga)
    {
        $arr = array(
            'NAMA_BARANG' => $nama_barang,
            'STOK'        => $stok,
            'SATUAN'      => $satuan,
            'HARGA'       => $harga
        );
        $this->db->insert('barang', $arr);
        return "Berhasil insert";
    }
    public function getBarang()
    {
        return $this->db->get('barang')->result();
    }
    public function get($kode_barang)
    {
        return $this->db->where('kode_barang', $kode_barang)->get('barang')->row();
    }
    public function update($nama_barang, $stok, $satuan, $harga)
    {
        $data = [
            'NAMA_BARANG' => $nama_barang,
            'STOK'        => $stok,
            'SATUAN'      => $satuan,
            'HARGA'       => $harga
        ];
        $this->db->where('NAMA_BARANG', $nama_barang)->update('barang', $data);
    }
    public function delete($kode_barang)
    {
        $this->db->where('KODE_BARANG', $kode_barang)->delete('barang');
        return 'Berhasil delete';
    }
}
