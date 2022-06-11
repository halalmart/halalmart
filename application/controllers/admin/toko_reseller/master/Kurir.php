<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kurir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/toko_reseller/master/M_kurir');
        $this->load->library('form_validation');
        $this->load->helper('url', 'show_my_modal');
    }
    function index()
    {
        $data['title'] = 'Admin | HalalMart';
        $data['kurir'] = $this->M_kurir->get_data()->result();
        $this->load->view('admin/tempelate/header', $data);
        $this->load->view('admin/tempelate/navbar');
        $this->load->view('admin/tempelate/sidebar');
        $this->load->view('admin/tempelate/wraper');
        $this->load->view('admin/toko_reseller/master/kurir/v_kurir', $data);
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
        $this->load->view('admin/toko_reseller/master/kurir/v_kurir_add', $data);
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
        $this->M_kurir->add_data($data, 'kurir');
        redirect('admin/toko_reseller/master/kurir');
    }

    function edit($category_id)
    {
        $where = array('category_id' => $category_id);
        $data['kurir'] = $this->M_kurir->edit_data($where, 'kurir')->result();
        $title['title'] = 'Tambah Kategori| HalalMart';
        $data['title_table'] = 'Tambah Kategori';
        $this->load->view('admin/tempelate/header', $title);
        $this->load->view('admin/tempelate/navbar');
        $this->load->view('admin/tempelate/sidebar');
        $this->load->view('admin/tempelate/wraper');
        $this->load->view('admin/toko_reseller/master/kurir/v_kurir_edit', $data);
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
        $this->M_kurir->update_data($where, $data, 'kurir');
        redirect('admin/toko_reseller/master/kurir');
    }
    function delete($category_id)
    {
        $where = array('category_id' => $category_id);
        $this->M_kurir->delete_data($where, 'kurir');
        unlink(FCPATH . '//upload/icon/kategori/' . $category_id);
        redirect('admin/toko_reseller/master/kurir');
    }
}
