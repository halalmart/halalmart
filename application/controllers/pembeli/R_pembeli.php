<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_pembeli extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('pembeli/M_r_pembeli');
        $this->load->helper('url');
    }
	function index(){// tampilan awal
        $data['pembeli'] = $this->M_r_pembeli->get_data()->result();
        $this->load->view('pembeli/registrasi/v_r_pembeli',$data);
    }
    function add(){//link masuk ke add
		
        $this->load->view('pembeli/registrasi/v_r_pembeli_add');
	}
    
    function add_action(){// untuk klik save
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $kota = $this->input->post('kota');
        $alamat = $this->input->post('alamat');
        $foto = $this->input->post('foto');
        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'jenis_kelamin' => $jenis_kelamin,
            'kota' => $kota,
            'alamat' => $alamat,
            'foto' => $foto
        );
        $this->M_r_pembeli->add_data($data,'pembeli');
        redirect('pembeli/r_pembeli');
    }
    function edit($id){//untuk klik edit
		$where = array('id' => $id);
		$data['pembeli'] = $this->M_r_pembeli->edit_data($where,'pembeli')->result();
		$this->load->view('pembeli/registrasi/v_r_pembeli_edit',$data);
	}
    function edit_action(){//untuk klik save edit
        $id= $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $kota = $this->input->post('kota');
        $alamat = $this->input->post('alamat');
        $foto = $this->input->post('foto');
        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'jenis_kelamin' => $jenis_kelamin,
            'kota' => $kota,
            'alamat' => $alamat,
            'foto' => $foto
        );
        $where = array(
            'id'=>$id
        );
        $this->M_r_pembeli->update_data($where,$data,'pembeli');
        redirect('pembeli/r_pembeli');
    }
    function delete($id){// untuk delete
		$where = array('id' => $id);
		$this->M_r_pembeli->delete_data($where,'pembeli');
		redirect('pembeli/r_pembeli');
	}
}
