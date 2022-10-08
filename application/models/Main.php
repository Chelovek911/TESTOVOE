<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public $error;

	

	public function tovarsCount() {
		return $this->db->column('SELECT COUNT(id) FROM posts');
	}

	public function tovarsList($route) {
		$max = 10;
		$params = [
			'max' => $max,
			'start' => ((($route['page'] ?? 1) - 1) * $max),
		];
		return $this->db->row('SELECT * FROM tovar ORDER BY id DESC LIMIT :start, :max', $params);
	}

	public function gettovarData($id){
		return $this->db->row('SELECT * FROM tovar WHERE id ='.$id);
	}

	public function getphoto($id)
	{
		return $this->db->row('SELECT * FROM photo WHERE tov_id='.$id);
	}
	public function getphotoindex($id)
	{
		return $this->db->column('SELECT id FROM photo WHERE tov_id='.$id);
	}
	public function getlisttovar()
	{
		return $this->db->row('SELECT id FROM tovar');
	}
	public function getlistimg()
	{
		return $this->db->row('SELECT id FROM photo');
	}

	public function total_price()
	{
		return $this->db->column("SELECT text FROM tovar");
	}
	public function selectTovar($ids)
	{
		return $this->db->row("SELECT * from tovar WHERE id IN (" . $ids . ")");
	}

}