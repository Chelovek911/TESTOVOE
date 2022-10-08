<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Main;

class AdminController extends Controller {

	public function __construct($route) {
		parent::__construct($route);
		$this->view->layout = 'admin';
	}

	public function loginAction() {
		if (isset($_SESSION['admin'])) {
			$this->view->redirect('admin/add');
		}
		if (!empty($_POST)) {
			if (!$this->model->loginValidate($_POST)) {
				$this->view->message('error', $this->model->error);
			}
			$_SESSION['admin'] = true;
			$this->view->location('admin/add');
		}
		$this->view->render('Вход');
	}

	public function addAction() {
		if (!empty($_POST)) {
			if (!$this->model->tovarsValidate($_POST, 'add')) {
				$this->view->message('error', $this->model->error);
			}
			$id = $this->model->tovarsAdd($_POST);
			if (!$id) {
				$this->view->message('success', 'Ошибка обработки запроса');
			}
			//var_dump($_FILES);
			if(count($_FILES['img']['tmp_name'])>1){
				foreach($_FILES['img']['tmp_name'] as $val){
					$last_id = $this->model->setimgid($val, $id);
						$this->model->uploadimg($val,$last_id);
					
				}
			}
			//$this->model->tovarsUploadImage($_FILES['img']['tmp_name'], $id);
			$this->view->message('success', 'Пост добавлен');
		}
		$this->view->render('Добавить пост');
	}

	public function editAction() {
		if (!$this->model->isPostExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		if (!empty($_POST)) {
			if (!$this->model->tovarsValidate($_POST, 'edit')) {
				$this->view->message('error', $this->model->error);
			}
			$this->model->tovarsEdit($_POST, $this->route['id']);
			if ($_FILES['img']['tmp_name']) {
				$this->model->tovarsUploadImage($_FILES['img']['tmp_name'], $this->route['id']);
			}
			$this->view->message('success', 'Сохранено');
		}
		$vars = [
			'data' => $this->model->tovarsData($this->route['id'])[0],
		];
		$this->view->render('Редактировать товар', $vars);
	}

	public function deleteAction() {
		if (!$this->model->isTovarsExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$this->model->postDelete($this->route['id']);
		$this->view->redirect('admin/tovars');
	}

	public function logoutAction() {
		unset($_SESSION['admin']);
		$this->view->redirect('admin/login');
	}

	public function tovarsAction() {
		$mainModel = new Main;
		$pagination = new Pagination($this->route, $mainModel->tovarsCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $mainModel->tovarsList($this->route),
		];
		$this->view->render('Товары', $vars);
	}
}