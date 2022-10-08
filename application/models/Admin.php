<?php

namespace application\models;

use application\core\Model;
use Imagick;

class Admin extends Model
{

	public $error;

	public function loginValidate($post)
	{
		$config = require 'application/config/admin.php';
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
			$this->error = 'Логин или пароль указан неверно';
			return false;
		}
		return true;
	}

	public function tovarsValidate($post, $type)
	{
		$nameLen = iconv_strlen($post['name']);
		$descriptionLen = iconv_strlen($post['description']);
		$textLen = iconv_strlen($post['text']);
		if ($nameLen < 3 or $nameLen > 100) {
			$this->error = 'Название должно содержать от 3 до 100 символов';
			return false;
		} elseif ($descriptionLen < 3 or $descriptionLen > 5000) {
			$this->error = 'Описание должно содержать от 3 до 5000 символов';
			return false;
		} elseif ($textLen < 1 or $textLen > 5000) {
			$this->error = 'Цена должна содержать от 10 до 5000 символов';
			return false;
		}
		if (empty($_FILES['img']['tmp_name']) and $type == 'add') {
			$this->error = 'Изображение не выбрано';
			return false;
		}
		return true;
	}

	public function tovarsAdd($post)
	{
		$params = [
			'id' => '',
			'name' => $post['name'],
			'description' => $post['description'],
			'text' => $post['text'],
		];
		$this->db->query('INSERT INTO tovar VALUES (:id, :name, :description, :text)', $params);
		return $this->db->lastInsertId();
	}

	public function tovarsEdit($post, $id)
	{
		$params = [
			'id' => $id,
			'name' => $post['name'],
			'description' => $post['description'],
			'text' => $post['text'],
		];
		$this->db->query('UPDATE posts SET name = :name, description = :description, text = :text WHERE id = :id', $params);
	}

	public function tovarsUploadImage($path, $id)
	{
		/*$img = new Imagick($path);
		$img->cropThumbnailImage(1080, 600);
		$img->setImageCompressionQuality(80);
		$img->writeImage('public/materials/' . $id . '.jpg');move_uploaded_file($path,'public/tovImg/'.$id.'.jpg');*/
	}

	public function setimgid($path, $id){
		$params = [
			'id' => '',
			'tov_id' => $id
		];
		$this->db->query("INSERT INTO photo VALUES (:id,:tov_id)", $params);
		return $this->db->lastInsertId();
	}

	public function uploadimg($path, $id){
		move_uploaded_file($path,'public/tovImg/'.$id.'.jpg');
	}

	public function isTovarsExists($id)
	{
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM tovar WHERE id = :id', $params);
	}

	public function tovarsDelete($id)
	{
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM tovar WHERE id = :id', $params);
		unlink('public/materials/' . $id . '.jpg');
	}

	public function tovarsData($id)
	{
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM tovar WHERE id = :id', $params);
	}
}
