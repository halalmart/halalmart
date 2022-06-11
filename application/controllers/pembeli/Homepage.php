<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/toko_reseller/master/M_kategori_produk');
        $this->load->model('admin/toko_reseller/master/M_data_produk');
        $this->load->model('pembeli/M_cart');
        $this->load->model('pembeli/M_r_pembeli');
        $this->load->library('form_validation');
        $this->load->helper('form', 'url', 'show_my_modal');
    }
    public function index()
    {
        $data['kategori'] = $this->M_kategori_produk->get_data()->result();
        $data['produk'] = $this->M_data_produk->get_data()->result();
        $data['cart'] = $this->M_cart->get_data_by_id(87654321)->result();
        $data['user'] = $this->M_r_pembeli->get_data_by_id(12345678)->result();
        $this->load->view('pembeli/templates/header');
        $this->load->view('pembeli/templates/sidebar', $data);
        $this->load->view('pembeli/homepage', $data);
        $this->load->view('pembeli/templates/footer');
    }
    public function tambah_ke_keranjang()
    {
        $id_produk = $this->input->post('id_produk');
        $jumlah = $this->input->post('jumlah');
        $this->session->set_userdata('id_produk', $id_produk);
        $this->session->set_userdata('jumlah', $jumlah);
        redirect('admin/toko_reseller/master/data_produk/detail/' . $id_produk);
    }
}
