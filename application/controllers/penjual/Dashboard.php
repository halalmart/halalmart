<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_penjual');
        $this->load->helper('url');
    }
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $data['title'] = 'Penjual | HalalMart';
        // $menu['menu'] =  $this->M_penjual->get_menu();
        $this->load->view('tempelate/header', $data);
        $this->load->view('tempelate/navbar');
        $this->load->view('penjual/tempelate/sidebar');
        $this->load->view('penjual/index');
        $this->load->view('tempelate/footer');
    }
}
