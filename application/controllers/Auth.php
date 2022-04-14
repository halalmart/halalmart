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
        $this->load->view('templates/auth_header');
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }
    public function reg_penjual()
    {
        $this->load->view('templates/auth_header');
        $this->load->view('auth/reg_penjual');
        $this->load->view('templates/auth_footer');
    }
    public function reg_pembeli()
    {
        $this->form_validation->set_rules('name', 'Name', 'Required|trim');
        $this->form_validation->set_rules('email', 'Email', 'Required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi Pembeli';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/reg_pembeli');
            $this->load->view('templates/auth_footer');
        } else {
            echo "tunggu";
        }
    }
}
