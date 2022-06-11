<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembeli/M_cart');
        $this->load->model('admin/toko_reseller/master/M_data_produk');
        $this->load->library('form_validation');
    }
    public function index($id)
    {
        $data['cart'] = $this->M_cart->get_data_by_id($id);
        $data['produk'] = $this->M_data_produk->get_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pembeli/homepage', $data);
        $this->load->view('templates/footer');
    }
}
