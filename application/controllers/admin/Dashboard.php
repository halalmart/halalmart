<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_menu');
        $this->load->helper('url');
    }
    public function index()
    {
        $data['title'] = 'Admin | HalalMart';
        $data['menu'] =  $this->M_menu->get_data()->result();
        $this->load->view('admin/tempelate/header', $data);
        $this->load->view('admin/tempelate/navbar');
        $this->load->view('admin/tempelate/sidebar', $data);
        $this->load->view('admin/index');
        $this->load->view('admin/tempelate/footer');
    }
    public function sidebar()
    {
        $data['menu'] = $this->M_menu->get_menu()->result();
        $this->load->view('admin/tempelate/sidebar', $data);
    }
}
