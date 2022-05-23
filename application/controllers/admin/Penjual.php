<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjual extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_penjual');
        //$this->load->library('template');
        $this->load->helper('url', 'show_my_modal');
    }
    function index()
    {
        $data['title'] = 'Admin | HalalMart';
        $data['penjual'] = $this->M_penjual->get_data()->result();
        $this->load->view('admin/tempelate/header', $data);
        $this->load->view('admin/tempelate/navbar');
        $this->load->view('admin/tempelate/sidebar');
        $this->load->view('admin/tempelate/wraper');
        $this->load->view('admin/data_penjual/v_penjual', $data);
        $this->load->view('admin/tempelate/footer');
    }
    function add()
    {
        $data['title'] = 'Tambah Penjual| HalalMart';
        $data['title_table'] = 'Tambah Penjual';
        $this->load->view('admin/tempelate/header', $data);
        $this->load->view('admin/tempelate/navbar');
        $this->load->view('admin/tempelate/sidebar');
        $this->load->view('admin/tempelate/wraper');
        $this->load->view('admin/data_penjual/v_penjual_add', $data);
        $this->load->view('admin/tempelate/footer');
    }

    function add_action()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pembeli.email]', [
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi Pembeli';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('registrasi/reg_pembeli');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'city' => htmlspecialchars($this->input->post('city', true)),
                'address' => htmlspecialchars($this->input->post('address', true)),
                'image' => 'default.jpg',
                'role_id' => 4,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('penjual', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil dibuat. Silahkan login.</div>');
            redirect('dashboard');
        }
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
        $this->M_penjual->delete_data($where, 'penjual');
        redirect('admin/dashboard');
    }
}
