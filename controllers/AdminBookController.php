<?php

/**
 * AdminBookController
 * manage books by admin
 */
class AdminBookController extends AdminBase
{
	/**
	 * action method for getting all books
	 * @return bool
	 */
	public function actionIndex(){

		self::checkAdmin();

		$booksList = Book::getBooksList();

		require_once (ROOT.'/views/admin/index.php');

		return true;
	}

	/**
	 * action method for "Add a book"
	 * @return bool
	 */
    public function actionCreate()
    {
        self::checkAdmin();

        $authorsList = Author::getAuthorList();

        if (isset($_POST['submit'])) {

	        $options['title'] = $_POST['title'];
	        $options['topic'] = $_POST['topic'];
	        $options['pages'] = $_POST['pages'];
	        $options['price'] = $_POST['price'];

	        if(!empty($_POST['authors'])){
	        	$options['authors']['existing'] = $_POST['authors'];
	        }
	        if(!empty($_POST['authors_new'])) {
		        $options['authors']['new'] = array_unique(array_map( 'trim', explode( ',', $_POST['authors_new'] ) ));
	        }

		    $errors = false;

            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Please fill the fields';
            }

            if ($errors == false) {
                $id = Book::createBook($options);

		        header("Location: /admin");
            }
        }

        require_once(ROOT . '/views/admin/create.php');
        return true;
    }

	/**
	 * action method for "Update a book"
	 * @param $id
	 *
	 * @return bool
	 */
    public function actionUpdate($id)
    {
        self::checkAdmin();

        $authorsList = Author::getAuthorList();

        $book = Book::getBookById($id);
	    if (isset($_POST['submit'])) {

		    $options['title'] = $_POST['title'];
		    $options['topic'] = $_POST['topic'];
		    $options['pages'] = $_POST['pages'];
		    $options['price'] = $_POST['price'];

		    if(!empty($_POST['authors'])){
			    $options['authors']['existing'] = $_POST['authors'];
		    }
		    if(!empty($_POST['authors_new'])) {
			    $options['authors']['new'] = array_unique(array_map( 'trim', explode( ',', $_POST['authors_new'] ) ));
		    }

		    $errors = false;

		    if (!isset($options['title']) || empty($options['title'])) {
			    $errors[] = 'Please fill the fields';
		    }

		    if ($errors == false) {
			    Book::updateBookById($id, $options);

			    header("Location: /admin");
		    }
	    }

        require_once(ROOT . '/views/admin/update.php');
        return true;
    }

	/**
	 * action method for "Delete book by id"
	 *
	 * @param $id
	 *
	 * @return bool
	 */
    public function actionDelete($id)
    {
        self::checkAdmin();

	    $authorsList = Author::getAuthorList();

	    $book = Book::getBookById($id);

        if (isset($_POST['submit'])) {
            Book::deleteBookById($id);

            Book::deleteBookRelById($id);

            header("Location: /admin");
        }

        require_once(ROOT . '/views/admin/delete.php');
        return true;
    }

}
