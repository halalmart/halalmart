<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_cart extends CI_Model
{
    function get_data()
    {
        return $this->db->get('cart_item');
    }
    function get_data_by_id($id_pembeli)
    {
        $query = $this->db->query("select * from cart_item where id_pembeli = '$id_pembeli'");
        return $query;
    }
    function edit_cart($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    function update_cart($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function insert_cart($data)
    {
        $this->db->insert('cart_item', $data);
    }
    function total_items($id_pembeli)
    {
        $query = $this->db->query("select * from cart_item where id_pembeli = '$id_pembeli'");
        $total = $query->num_rows();

        return $total;
    }
    function buy($data)
    {
        $this->db->insert('pembelian', $data);
    }
    function delete_cart($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
