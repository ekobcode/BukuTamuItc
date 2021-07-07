<?php

class PesertaModel {
	
	private $table = 'peserta';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPeserta()
	{
		$this->db->query("SELECT peserta.*, himpunan.nama_himpunan FROM " . $this->table . " JOIN himpunan ON himpunan.id = peserta.himpunan_id");
		return $this->db->resultSet();
	}

	public function getPesertaById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahPeserta($data)
	{
		$query = "INSERT INTO peserta (judul, penerbit, pengarang, tahun, kategori_id, harga) VALUES(:judul, :penerbit, :pengarang, :tahun, :kategori_id, :harga)";
		$this->db->query($query);
		$this->db->bind('judul', $data['judul']);
		$this->db->bind('penerbit', $data['penerbit']);
		$this->db->bind('pengarang', $data['pengarang']);
		$this->db->bind('tahun', $data['tahun']);
		$this->db->bind('kategori_id', $data['kategori_id']);
		$this->db->bind('harga', $data['harga']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPeserta($data)
	{
		$query = "UPDATE peserta SET judul=:judul, penerbit=:penerbit, pengarang=:pengarang, pengarang=:pengarang, tahun=:tahun, kategori_id=:kategori_id, harga=:harga WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('judul', $data['judul']);
		$this->db->bind('penerbit', $data['penerbit']);
		$this->db->bind('pengarang', $data['pengarang']);
		$this->db->bind('tahun', $data['tahun']);
		$this->db->bind('kategori_id', $data['kategori_id']);
		$this->db->bind('harga', $data['harga']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deletePeserta($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariPeserta()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE judul LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}