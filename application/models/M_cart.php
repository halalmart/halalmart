<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_card extends CI_Model
{
    function get_data()
    {
        return $this->db->get('cart_item');
    }

    function insert_cart($data)
    {
        $this->db->insert('cart_item', $data);
    }
}
