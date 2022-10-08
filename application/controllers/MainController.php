<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Admin;

class MainController extends Controller
{

	public function indexAction()
	{
		$vars = [
			'list' => $this->model->tovarsList($this->route),
			'tovars' => $this->model->getlisttovar(),
		];
		/*foreach ($vars['list'] as $val) {
			$val['photo'] = $this->model->getphoto($val['id']);
		}*/

		for ($i = 0; $i < count($vars['list']); $i++) {
			$vars['list'][$i]['photo'] = $this->model->getphotoindex($vars['list'][$i]['id']);
		}

		//var_dump($val['photo']);
		$this->view->render('Cписок товаров', $vars);
	}

	public function tovarAction()
	{
		$adminModel = new Admin;
		if (!$adminModel->isTovarsExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$vars = [
			'data' => $adminModel->tovarsData($this->route['id'])[0],
		];
		$this->view->render('Пост', $vars);
	}
	public function tovarsAction()
	{
		$params = [
			'data' => $this->model->gettovarData($this->route['id']),
			'photo' => $this->model->getphoto($this->route['id'])
		];
		$this->view->render('Товар', $params);
	}
	public function basketAction()
	{
		if (!empty($_SESSION['urn'])) {
			$ids = implode(',', $_SESSION['urn']['id_tovar']);
			$params = [
				'row' => $this->model->selectTovar($ids),
				'total' => $this->model->total_price(),
			];
		} else {
			$params = [
				
			];
		}

		$this->view->render('Корзина', $params);
	}
	public function addAction()
	{

		if (!isset($_SESSION['urn'])) {
			session_destroy();
			session_start();
			$_SESSION['urn']['tovar'] = '';
			$_SESSION['urn']['num'] = 0;


			goto a;
		} else {
			a:
			$i = $_SESSION['urn']['num'];
			foreach ($_SESSION['urn']['id_tovar'] as $val) :
				if ($val == $_POST['id_of_tovar']) {
					$this->view->message('Товар', ' Уже есть');
					return false;
				}
			endforeach;
			$tovar =  $_POST['id_of_tovar'];
			$_SESSION['urn']['id_tovar'][$i] = $tovar;


			$_SESSION['urn']['num']++;
			$referer = substr($_SERVER['HTTP_REFERER'], 17);
			$this->view->location($referer);
		}
	}
}
