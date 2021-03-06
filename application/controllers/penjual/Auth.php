<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Halalmart';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('penjual/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('penjual', ['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 2) {
                        redirect('penjual/Dashboard');
                    } else {
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password salah!
                </div>');
                    redirect('penjual/auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum diaktivasi!
            </div>');
                redirect('penjual/auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Email belum terdaftar!
        </div>');
            redirect('penjual/auth');
        }
    }

    public function reg_penjual()
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil dibuat. Silahkan login.</div>');
            redirect('penjual/auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda telah keluar!
        </div>');
        redirect('penjual/auth');
    }
}
