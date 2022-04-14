<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Admin | HalalMart';
        $this->load->view('admin/tempelate/header', $data);
        $this->load->view('admin/tempelate/navbar');
        $this->load->view('admin/tempelate/sidebar');
        $this->load->view('admin/index');
        $this->load->view('admin/tempelate/footer');
    }
}
