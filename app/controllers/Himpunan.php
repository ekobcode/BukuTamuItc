<?php

class Himpunan extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
	} 
	public function index()
	{
		$data['title'] = 'Data Himpunan';
		$data['himpunan'] = $this->model('HimpunanModel')->getAllHimpunan();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('himpunan/index', $data);
		$this->view('templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Himpunan';
		$data['himpunan'] = $this->model('HimpunanModel')->cariHimpunan();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('himpunan/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Himpunan';
		$data['himpunan'] = $this->model('HimpunanModel')->getHimpunanById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('himpunan/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah() 
	{
		$data['title'] = 'Tambah Himpunan';		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('himpunan/create', $data);
		$this->view('templates/footer');
	}

	public function simpanHimpunan()
	{		
		if( $this->model('HimpunanModel')->tambahHimpunan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/himpunan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/himpunan');
			exit;	
		}
	}

	public function updateHimpunan(){	
		if( $this->model('HimpunanModel')->updateDataHimpunan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/himpunan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/himpunan');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('HimpunanModel')->deleteHimpunan($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/himpunan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/himpunan');
			exit;	
		}
	}
}