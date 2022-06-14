<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/toko_reseller/master/M_kategori_produk');
        $this->load->model('admin/toko_reseller/master/M_data_produk');
        $this->load->model('pembeli/M_cart');
        $this->load->model('pembeli/M_r_pembeli');
        $this->load->library('form_validation', 'cart');
        $this->load->helper('form', 'url', 'show_my_modal');
    }
    public function index()
    {
        $data['kategori'] = $this->M_kategori_produk->get_data()->result();
        $data['produk'] = $this->M_data_produk->get_data()->result();
        $data['cart'] = $this->M_cart->get_data_by_id(12345678)->result();
        $data['user'] = $this->M_r_pembeli->get_data_by_id(12345678)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pembeli/homepage', $data);
        $this->load->view('templates/footer');
    }
    public function product($id_product)
    {
        $data['kategori'] = $this->M_kategori_produk->get_data()->result();
        $data['produk'] = $this->M_data_produk->get_data_by_id($id_product)->result();
        $data['cart'] = $this->M_cart->get_data_by_id(12345678)->result();
        $data['user'] = $this->M_r_pembeli->get_data_by_id(12345678)->result();
        $this->load->view('pembeli/templates/header');
        $this->load->view('pembeli/templates/sidebar', $data);
        $this->load->view('pembeli/buy/product', $data);
        $this->load->view('templates/footer');
    }
    public function add_product($id_product)
    {
        $role_id = $this->session->userdata('role_id');
        $id_product = $this->input->post('id_product');
        $id_pembeli = $this->input->post('id_pembeli');
        $name = $this->input->post('name');
        $foto = $this->input->post('foto');
        $quantity = $this->input->post('quantity');
        $price = $this->input->post('price');
        $created_at = $this->input->post('created_at');
        $updated_at = $this->input->post('updated_at');
        $data = array(

            'role_id' => $role_id,
            'id_product' => $id_product,
            'id_pembeli' => $id_pembeli,
            'name' => $name,
            'foto' => $foto,
            'quantity' => $quantity,
            'patner_price' => $price,
            'created_at' => time()
        );
        $this->M_cart->insert_cart($data, 'cart_item');
        redirect('pembeli/pembelian/show_cart/12345678');
    }
    public function edit_product($id_product)
    {

        $id = $this->session->userdata('id');
        $role_id = $this->session->userdata('role_id');
        $id_product = $this->input->post('id_product');
        $id_pembeli = $this->input->post('id_pembeli');
        $name = $this->input->post('name');
        $foto = $this->input->post('foto');
        $quantity = $this->input->post('quantity');
        $patner_price = $this->input->post('patner_price');
        $sub_price = $this->input->post('sub_price');
        $created_at = $this->input->post('created_at');
        $modified_at = $this->input->post('modified_at');
        $data = array(
            'id' => $id,
            'role_id' => $role_id,
            'id_product' => $id_product,
            'id_pembeli' => $id_pembeli,
            'name' => $name,
            'foto' => $foto,
            'quantity' => $quantity,
            'patner_price' => $patner_price,
            'sub_price' => $sub_price,
            'modified_at' => time(),
        );
        $where = array(
            'id' => $id
        );
        $this->M_cart->update_cart($where, $data, 'cart_item');
        redirect('pembeli/pembelian/show_cart/12345678');
    }
    public function delete_product($id_product)
    {
        $where = array('id_product' => $id_product);
        $this->M_cart->delete_cart($where, 'cart_item');
        unlink(FCPATH . '//upload/product/' . $id_product);
        redirect('pembeli/pembelian/show_cart/12345678');
    }

    function show_cart($id_pembeli, $id_product)
    {
        $data['cart'] = $this->M_cart->get_data_by_id($id_pembeli)->result();
        $data['user'] = $this->M_r_pembeli->get_data_by_id($id_pembeli)->result();
        $data['produk'] = $this->M_data_produk->get_data_by_id($id_product)->result();
        $this->load->view('pembeli/templates/header');
        $this->load->view('pembeli/templates/sidebar', $data);
        $this->load->view('pembeli/buy/cart', $data);
        $this->load->view('templates/footer');
    }
    public function buy_product($id_pembeli)
    {
        $order_id = $this->session->userdata('order_id');
        $name = $this->input->post('name');
        $id_pembeli = $this->input->post('id_pembeli');
        $id_product = $this->input->post('id_product');
        $role_id = $this->session->userdata('role_id');
        $name = $this->input->post('name');
        $quantity = $this->input->post('quantity');
        $patner_price = $this->input->post('patner_price');
        $sub_price = $this->input->post('sub_price');
        $sub_poin = $this->input->post('sub_poin');
        $created_at = $this->input->post('created_at');
        $modified_at = $this->input->post('modified_at');
        $deleted_at = $this->input->post('deleted_at');
        $data = array(

            'order_id' => $order_id,
            'id_pembeli' => $id_pembeli,
            'name' => $name,
            'role_id' => $role_id,
            'id_product' => $id_product,
            'name' => $name,
            'quantity' => $quantity,
            'patner_price' => $patner_price,
            'sub_price' => $sub_price,
            'sub_poin' => $sub_poin,
            'created_at' => time(),
        );
        $this->M_cart->buy($data, 'pembelian');
        redirect('pembeli/pembelian/');
    }
}
