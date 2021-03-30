<?php

include_once (ROOT.'/models/Book.php');

class BookController {

	public function actionIndex(){

		$booksList = array();
		$booksList = Book::getBooksList();

		require_once (ROOT.'/views/book/index.php');

		return true;
	}

	public function actionView($id){

		if ($id){
			$bookSingle = Book::getBookById($id);

			// TODO: remove this snippet
			echo '<pre>';
			print_r($bookSingle);
			echo '</pre>';

			return true;
		}
	}

}