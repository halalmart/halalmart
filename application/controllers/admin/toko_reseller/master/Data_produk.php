<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/toko_reseller/master/M_data_produk');
        $this->load->model('admin/toko_reseller/master/M_kategori_produk');
        $this->load->library('form_validation');
        $this->load->helper('form', 'url', 'show_my_modal');
    }
    function index()
    {
        $data['title'] = 'Admin | HalalMart';
        $data['data_produk'] = $this->M_data_produk->get_data()->result();
        $this->load->view('admin/tempelate/header', $data);
        $this->load->view('admin/tempelate/navbar');
        $this->load->view('admin/tempelate/sidebar');
        $this->load->view('admin/tempelate/wraper');
        $this->load->view('admin/toko_reseller/master/data_produk/v_data_produk', $data);
        $this->load->view('admin/tempelate/footer');
    }
    function add()
    {
        $title['title'] = 'Tambah data| HalalMart';
        $t_table['title_table'] = 'Tambah data';
        $data['kategori'] = $this->M_kategori_produk->get_data()->result();
        $this->load->view('admin/tempelate/header', $title);
        $this->load->view('admin/tempelate/navbar');
        $this->load->view('admin/tempelate/sidebar');
        $this->load->view('admin/tempelate/wraper');
        $this->load->view('admin/toko_reseller/master/data_produk/v_data_produk_add', $data);
        $this->load->view('admin/tempelate/footer');
    }


    function add_action()
    {
        $name = $this->input->post('name');
        $desc = $this->input->post('desc');
        $sku = $this->input->post('sku');
        $category_id = $this->input->post('category_id');
        $inventory_id = $this->input->post('inventory_id');
        $price = $this->input->post('price');
        $patner_price = $this->input->post('patner_price');
        $point = $this->input->post('point');
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = FCPATH . '//upload/product/';
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "sabar";
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'foto' => $foto,
            'name' => $name,
            'desc' => $desc,
            'sku' => $sku,
            'category_id' => $category_id,
            'inventory_id' => $inventory_id,
            'price' => $price,
            'patner_price' => $patner_price,
            'point' => $point,
            'created_at' => time()
        );
        $this->M_data_produk->add_data($data, 'product');
        redirect('admin/toko_reseller/master/data_produk');
    }
    function edit($id_product)
    {
        $where = array('id_product' => $id_product);
        $data['data_produk'] = $this->M_data_produk->edit_data($where, 'product')->result();
        $data['kategori'] = $this->M_kategori_produk->get_data()->result();
        $title['title'] = 'Tambah Kategori| HalalMart';
        $data['title_table'] = 'Tambah Kategori';
        $this->load->view('admin/tempelate/header', $title);
        $this->load->view('admin/tempelate/navbar');
        $this->load->view('admin/tempelate/sidebar');
        $this->load->view('admin/tempelate/wraper');
        $this->load->view('admin/toko_reseller/master/data_produk/v_data_produk_edit', $data);
        $this->load->view('admin/tempelate/footer');
    }
    function edit_action()
    {
        $id_product = $this->input->post('id_product');
        $name = $this->input->post('name');
        $desc = $this->input->post('desc');
        $sku = $this->input->post('sku');
        $category_id = $this->input->post('category_id');
        $inventory_id = $this->input->post('inventory_id');
        $price = $this->input->post('price');
        $patner_price = $this->input->post('patner_price');
        $point = $this->input->post('point');
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = FCPATH . '//upload/product/';
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/toko_reseller/master/data_produk/v_data_produk_edit', $error);
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = array(
            'foto' => $foto,
            'name' => $name,
            'desc' => $desc,
            'sku' => $sku,
            'category_id' => $category_id,
            'inventory_id' => $inventory_id,
            'price' => $price,
            'patner_price' => $patner_price,
            'point' => $point,
            'modified_at' => time()
        );
        $where = array(
            'id_product' => $id_product
        );
        $this->M_data_produk->update_data($where, $data, 'product');
        redirect('admin/toko_reseller/master/data_produk');
    }
    function delete($id_product)
    {
        $where = array('id_product' => $id_product);
        $this->M_data_produk->delete_data($where, 'product');
        unlink(FCPATH . '//upload/product/' . $id_product);
        redirect('admin/toko_reseller/master/data_produk');
    }
}
