<?php

// TODO: check functions and docs

class AuthorController {

	public function actionIndex(){

		$authorsList = Author::getAuthorList();

		require_once (ROOT.'/views/author/index.php');

		return true;
	}

	public function actionView($id){

		if ($id){
			$author = Author::getAuthorById($id);

			require_once (ROOT.'/views/author/view.php');

			return true;
		}
	}

}