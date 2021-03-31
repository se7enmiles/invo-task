<?php

/**
 * Class BookController
 */
class BookController {

	/**
	 * action method for getting all books
	 * @return bool
	 */
	public function actionIndex(){

		$booksList = Book::getBooksList();

		require_once (ROOT.'/views/book/index.php');

		return true;
	}

	/**
	 * action method for "View book"
	 * @param $id
	 *
	 * @return bool
	 */
	public function actionView($id){

		if ($id){

			$book = Book::getBookById($id);

			require_once (ROOT.'/views/book/view.php');

			return true;
		}
	}

}