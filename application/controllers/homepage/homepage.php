<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{

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
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_card');
		$this->load->helper('cart');
	}
	public function index()
	{
		$data['Product'] = $this->M_card->get_all();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('homepage/homepage');
		$this->load->view('templates/footer');
	}
	public function add_to_cart()
	{
		$id = $this->input->post('id');
		$id_kategori = $this->input->post('id_kategori');
		$price = $this->input->post('price');
		$name = $this->input->post('name');
		$data = array(
			'id' => $id,
			'id_kategori' => $id_kategori,
			'price' => $price,
			'name' => $name
		);
		$this->cart->insert($data);
		redirect('homepage');
	}
}
