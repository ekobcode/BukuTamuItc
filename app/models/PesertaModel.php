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
		$query = "INSERT INTO peserta (nama, hp, email, himpunan_id, status) VALUES(:nama, :hp, :email, :himpunan_id, 'Pendding')";
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('hp', $data['hp']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('himpunan_id', $data['himpunan_id']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPeserta($data)
	{
		$query = "UPDATE peserta SET nama=:nama, hp=:hp, email=:email, himpunan_id=:himpunan_id, status_id=:status_id WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('hp', $data['hp']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('himpunan_id', $data['himpunan_id']);
		$this->db->bind('status_id', $data['status_id']);
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

	public function pembayaranPeserta($data)
	{
		$query = "UPDATE peserta SET status=:status WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('status', $data['status']);
		$this->db->execute();
		return $this->db->rowCount();
	}
}