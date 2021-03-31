<?php

return array(

	//Admin requests
	'admin/create' => 'adminBook/create',
	'admin/delete/([0-9]+)' => 'adminBook/delete/$1',
	'admin/update/([0-9]+)' => 'adminBook/update/$1',
	'admin' => 'adminBook/index',

	//Book requests
	'book/([0-9]+)'=>'book/view/$1',
	'books'=>'book/index',

	//Author requests
	'author/([0-9]+)'=>'author/view/$1',
	'authors'=>'author/index',

	//User requests
	'user/register' => 'user/register',
	'user/login' => 'user/login',
	'user/logout' => 'user/logout',
	'error'=>'user/error',

	//Home page
	''=>'book/index',

);