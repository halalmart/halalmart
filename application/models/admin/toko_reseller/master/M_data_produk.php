<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_data_produk extends CI_Model
{
    function get_data()
    {
        return $this->db->get('product');
        return $this->db->get('kategori_produk');
    }
    function add_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function edit_data($where, $table)
    {
        $this->db->select('product.*, kategori_produk.nama_kategori AS category_id');
        $this->db->join('kategori_produk', 'product.category_id = kategori_produk.category_id');
        return $this->db->get_where($table, $where);
    }
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function jointable()
    {

        return $this->db->get();
    }
}
