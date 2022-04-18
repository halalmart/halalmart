<?php
defined('BASEPATH') or exit('No direct script access allowed');

class R_penjual extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('penjual/M_r_penjual');
        $this->load->helper('url');
    }
    function index()
    {
        $data['penjual'] = $this->M_r_penjual->get_data()->result();
        $this->load->view('penjual/registrasi/v_r_penjual', $data);
    }
    function add()
    {

        $this->load->view('penjual/registrasi/v_r_penjual_add');
    }

    function add_action()
    {
        $this->form_validation->set_rules('id_penjual', 'Id_penjual', 'required|trim|is_unique[penjual.id_penjual]', [
            'is_unique' => 'ID sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[penjual.email]', [
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
            $this->load->view('registrasi/reg_penjual');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'id_penjual' => htmlspecialchars($this->input->post('id_penjual', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'city' => htmlspecialchars($this->input->post('city', true)),
                'address' => htmlspecialchars($this->input->post('address', true)),
                'image' => 'default.jpg',
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('penjual', $data);
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil dibuat. Silahkan login.</div>');
            redirect('penjual/R_penjual');
        }
    }
    function edit($id)
    {
        $where = array('id' => $id);
        $data['penjual'] = $this->M_r_penjual->edit_data($where, 'penjual')->result();
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
        $this->M_r_penjual->update_data($where, $data, 'penjual');
        redirect('penjual/r_penjual');
    }
    function delete($id)
    {
        $where = array('id' => $id);
        $this->M_r_penjual->delete_data($where, 'penjual');
        redirect('penjual/r_penjual');
    }
}
