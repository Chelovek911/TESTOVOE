<?php

return [
	// MainController
	'' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'main/index/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'index',
	],
	
	'tovars/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'tovars',
	],
	'basket' => [
		'controller' => 'main',
		'action' => 'basket',
	],
	'main/add' => [
		'controller' => 'main',
		'action' => 'add',
	],
	// AdminController
	'admin/login' => [
		'controller' => 'admin',
		'action' => 'login',
	],
	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],
	'admin/add' => [
		'controller' => 'admin',
		'action' => 'add',
	],
	'admin/edit/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'edit',
	],
	'admin/delete/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'delete',
	],
	'admin/tovars/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'tovars',
	],
	'admin/tovars' => [
		'controller' => 'admin',
		'action' => 'tovars',
	],
];