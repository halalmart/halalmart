<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/toko_reseller/master/M_kategori_produk');
        $this->load->library('form_validation');
        $this->load->helper('url', 'show_my_modal');
    }
    function index()
    {
        $data['title'] = 'Admin | HalalMart';
        $data['kategori_produk'] = $this->M_kategori_produk->get_data()->result();
        $this->load->view('admin/tempelate/header', $data);
        $this->load->view('admin/tempelate/navbar');
        $this->load->view('admin/tempelate/sidebar');
        $this->load->view('admin/tempelate/wraper');
        $this->load->view('admin/toko_reseller/master/kategori_produk/v_kategori_produk', $data);
        $this->load->view('admin/tempelate/footer');
    }
    function add()
    {
        $data['title'] = 'Tambah Kategori| HalalMart';
        $data['title_table'] = 'Tambah Kategori';
        $this->load->view('admin/tempelate/header', $data);
        $this->load->view('admin/tempelate/navbar');
        $this->load->view('admin/tempelate/sidebar');
        $this->load->view('admin/tempelate/wraper');
        $this->load->view('admin/toko_reseller/master/kategori_produk/v_kategori_produk_add', $data);
        $this->load->view('admin/tempelate/footer');
    }


    function add_action()
    {
        $nama_kategori = $this->input->post('nama_kategori');

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = FCPATH . '/upload/icon/kategori/';
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
            'nama_kategori' => $nama_kategori,
            'foto' => $foto
        );
        $this->M_kategori_produk->add_data($data, 'kategori_produk');
        redirect('admin/toko_reseller/master/kategori_produk');
    }

    function edit($category_id)
    {
        $where = array('category_id' => $category_id);
        $data['kategori_produk'] = $this->M_kategori_produk->edit_data($where, 'kategori_produk')->result();
        $title['title'] = 'Tambah Kategori| HalalMart';
        $data['title_table'] = 'Tambah Kategori';
        $this->load->view('admin/tempelate/header', $title);
        $this->load->view('admin/tempelate/navbar');
        $this->load->view('admin/tempelate/sidebar');
        $this->load->view('admin/tempelate/wraper');
        $this->load->view('admin/toko_reseller/master/kategori_produk/v_kategori_produk_edit', $data);
        $this->load->view('admin/tempelate/footer');
    }
    function edit_action()
    {
        $category_id = $this->input->post('category_id');
        $nama_kategori = $this->input->post('nama_kategori');
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = FCPATH . '//upload/icon/kategori/';
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
            'nama_kategori' => $nama_kategori,
            'foto' => $foto
        );
        $where = array(
            'category_id' => $category_id
        );
        $this->M_kategori_produk->update_data($where, $data, 'kategori_produk');
        redirect('admin/toko_reseller/master/kategori_produk');
    }
    function delete($category_id)
    {
        $where = array('category_id' => $category_id);
        $this->M_kategori_produk->delete_data($where, 'kategori_produk');
        unlink(FCPATH . '//upload/icon/kategori/' . $category_id);
        redirect('admin/toko_reseller/master/kategori_produk');
    }
}
