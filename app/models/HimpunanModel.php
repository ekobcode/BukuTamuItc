<?php

class HimpunanModel {
	
	private $table = 'himpunan';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllHimpunan()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getHimpunanById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahHimpunan($data)
	{
		$query = "INSERT INTO himpunan (nama_himpunan,nama_universitas) VALUES(:nama_himpunan,:nama_universitas)";
		$this->db->query($query);
		$this->db->bind('nama_himpunan',$data['nama_himpunan']);
		$this->db->bind('nama_universitas',$data['nama_universitas']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataHimpunan($data)
	{
		$query = "UPDATE himpunan SET nama_himpunan=:nama_himpunan , nama_universitas=:nama_universitas  WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('nama_himpunan',$data['nama_himpunan']);
		$this->db->bind('nama_universitas',$data['nama_universitas']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteHimpunan($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariHimpunan()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama_himpunan LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}