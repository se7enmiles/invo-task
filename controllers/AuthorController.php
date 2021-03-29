<?php
include_once (ROOT.'/models/Author.php');

class AuthorController {

	public function actionIndex(){

		$authorsList = array();
		$authorsList = Author::getAuthorList();

		// TODO: remove this snippet
		echo '<pre>';
		print_r($authorsList);
		echo '</pre>';

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