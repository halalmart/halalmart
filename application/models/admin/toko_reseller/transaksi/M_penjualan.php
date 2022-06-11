<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_penjualan extends CI_Model
{
    function get_data()
    {
        return $this->db->get('penjualan');
    }
    function get_pembeli()
    {
        $this->db->select('pembelian.*, pembeli.name AS nama_pembeli, pembeli.role_id AS status_pembeli');
        $this->db->join('pembeli', 'product.category_id = pembeli.category_id');
        return $this->db->get();
    }
    function add_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function edit_data($where, $table)
    {
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
}
