<?php
include_once (ROOT.'/models/Author.php');

class AuthorController {

	public function actionIndex(){

		$authorList = array();
		$authorList = Author::getAuthorList();

		require_once (ROOT.'/views/author/index.php');

		return true;
	}

	public function actionView($id){

		if ($id){
			$authorSingle = Author::getAuthorById($id);

			// TODO: remove this snippet
			echo '<pre>';
			print_r($authorSingle);
			echo '</pre>';
		}
	}

}