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
            $config['upload_path'] = FCPATH . '/upload';
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

    function edit($id)
    {
        $where = array('id' => $id);
        $data['penjual'] = $this->M_penjual->edit_data($where, 'penjual')->result();
        $this->load->view('admin/data_penjual/v_penjual_edit', $data);
    }
    function edit_action()
    {
        $id = $this->input->post('id');
        $id_penjual = $this->input->post('id_penjual');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $kota = $this->input->post('kota');
        $alamat = $this->input->post('alamat');
        $foto = $this->input->post('foto');
        $data = array(
            'id_penjual' => $id_penjual,
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'jenis_kelamin' => $jenis_kelamin,
            'kota' => $kota,
            'alamat' => $alamat,
            'foto' => $foto
        );
        $where = array(
            'id' => $id
        );
        $this->M_penjual->update_data($where, $data, 'penjual');
        redirect('penjual/r_penjual');
    }
    function delete($id)
    {
        $where = array('id' => $id);
        $this->M_kategori_produk->delete_data($where, 'kategori_produk');
        redirect('admin/toko_reseller/master/kategori_produk');
    }
}
