<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjual extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_penjual');
        $this->load->helper('url');
    }
    function index()
    {
        $data['title'] = 'Admin | HalalMart';
        $data['penjual'] = $this->M_penjual->get_data()->result();
        $this->load->view('admin/tempelate/header', $data);
        $this->load->view('admin/tempelate/navbar');
        $this->load->view('admin/tempelate/sidebar');
        $this->load->view('admin/data_penjual/v_penjual', $data);
        $this->load->view('admin/tempelate/footer');
    }
    function add()
    {

        $this->load->view('penjual/registrasi/v_r_penjual_add');
    }

    function add_action()
    {
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
        $this->M_penjual->add_data($data, 'penjual');
        redirect('penjual/r_penjual');
    }
    function edit($id)
    {
        $where = array('id' => $id);
        $data['penjual'] = $this->M_penjual->edit_data($where, 'penjual')->result();
        $this->load->view('penjual/registrasi/v_r_penjual_edit', $data);
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
        $this->M_penjual->delete_data($where, 'penjual');
        redirect('penjual/r_penjual');
    }
}
