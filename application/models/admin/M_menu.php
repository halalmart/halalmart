<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_menu extends CI_Model
{
    function get_data()
    {
        return $this->db->get('kategori_produk');
    }
    function get_menu()
    {
        //$role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT menu FROM admin_menu";
        return $this->db->query($queryMenu)->result_array();
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
