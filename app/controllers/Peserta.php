<?php

class Peserta extends Controller {
	
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
		$data['title'] = 'Data Peserta';
		$data['peserta'] = $this->model('PesertaModel')->getAllPeserta();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('peserta/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Peserta';
		$data['peserta'] = $this->model('PesertaModel')->getAllPeserta();
		$this->view('peserta/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['peserta'] = $this->model('PesertaModel')->getAllPeserta();

			$pdf = new FPDF('p','mm','A4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',14);
			// mencetak string 
			$pdf->Cell(190,7,'LAPORAN BUKU',0,1,'C');
			 
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,7,'',0,1);
			 
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(85,6,'JUDUL',1);
			$pdf->Cell(30,6,'PENERBIT',1);
			$pdf->Cell(30,6,'PENGARANG',1);
			$pdf->Cell(15,6,'TAHUN',1);
			$pdf->Cell(25,6,'KATEGORI',1);
			  $pdf->Ln();
			$pdf->SetFont('Arial','',10);
			 
			foreach($data['buku'] as $row) {
			    $pdf->Cell(85,6,$row['judul'],1);
			    $pdf->Cell(30,6,$row['penerbit'],1);
			    $pdf->Cell(30,6,$row['pengarang'],1);
			    $pdf->Cell(15,6,$row['tahun'],1); 
			    $pdf->Cell(25,6,$row['nama_kategori'],1);
			    $pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Buku.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data Peserta';
		$data['peserta'] = $this->model('PesertaModel')->cariPeserta();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('peserta/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Peserta';
		$data['himpunan'] = $this->model('HimpunanModel')->getAllHimpunan();
		$data['peserta'] = $this->model('PesertaModel')->getPesertaById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('peserta/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Peserta';		
		$data['himpunan'] = $this->model('HimpunanModel')->getAllHimpunan();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('peserta/create', $data);
		$this->view('templates/footer');
	}

	public function simpanPeserta(){		

		if( $this->model('PesertaModel')->tambahPeserta($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/peserta');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/peserta');
			exit;	
		}
	}

	public function updatePeserta(){	
		if( $this->model('PesertaModel')->updateDataPeserta($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/peserta');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/peserta');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('PesertaModel')->deletePeserta($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/peserta');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/peserta');
			exit;	
		}
	}

	public function pembayaran($id){
		if( $this->model('PesertaModel')->pembayaranPeserta($id) > 0 ) {
			Flasher::setMessage('Berhasil','dibayar','success');
			header('location: '. base_url . '/peserta');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dibayar','danger');
			header('location: '. base_url . '/peserta');
			exit;	
		}
	}
}