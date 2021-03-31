<?php

/**
 * Class Book
 */
class Book {

	/**
	 * action method for "Get all books"
	 * @return array
	 */
	public static function getBooksList(){

		$db = Database::connect();

		$bookList = array();

		$result = $db->query('SELECT `id`, `title`, `topic`, `pages`, `price`, `date_added` FROM `book` ORDER BY `id`');

		$i=0;
		while($row = $result->fetch()){
			$bookList[$i]['id'] = $row['id'];
			$bookList[$i]['title'] = $row['title'];
			$bookList[$i]['topic'] = $row['topic'];
			$bookList[$i]['pages'] = $row['pages'];
			$bookList[$i]['price'] = $row['price'];
			$bookList[$i]['date_added'] = $row['date_added'];
			$bookList[$i]['authors'] = Author::getAuthorByBookId($row['id']);
			$i++;
		}

		return $bookList;
	}

	/**
	 * method for "Delete book by id"
	 * @param $id
	 *
	 * @return bool
	 */
	public static function deleteBookById($id)
	{
		$db = Database::connect();

		$sql = 'DELETE FROM book WHERE id = :id';

		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		return $result->execute();
	}
	/**
	 * method for "Delete book-author relation"
	 * @param $id
	 *
	 * @return bool
	 */
	public static function deleteBookRelById($id)
	{
		$db = Database::connect();

		$sql = 'DELETE FROM book_author WHERE book_id = :id';

		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		return $result->execute();
	}

	/**
	 * method for "Update book by id"
	 *
	 * @param $id
	 * @param $title
	 * @param $topic
	 * @param $pages
	 * @param $price
	 *
	 * @return bool
	 */
	public static function updateBookById($id, $options)
	{
		$db = Database::connect();

		$sql = 'UPDATE `book` SET `title` = :title, `topic` = :topic, `pages` = :pages, `price` = :price WHERE id = :id';

		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_STR);
		$result->bindParam(':title', $options['title'], PDO::PARAM_STR);
		$result->bindParam(':topic', $options['topic'], PDO::PARAM_STR);
		$result->bindParam(':pages', $options['pages'], PDO::PARAM_INT);
		$result->bindParam(':price', $options['price'], PDO::PARAM_INT);
		if ($result->execute()) {
			Book::deleteBookRelById($id);
			Author::addAuthorsForNewBook( $id, $options['authors'] );
		}
	}

	/**
	 * method for "Get book by id"
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
	public static function getBookById($id){

		$id=intval($id);

		if ($id) {

			$db = Database::connect();

			$result = $db->query( 'SELECT `id`, `title`, `topic`, `pages`, `price`, `date_added` FROM `book` WHERE `id`=' . $id );
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$bookSingle = $result->fetch();
			$bookSingle['authors'] = Author::getAuthorByBookId($id);

			return $bookSingle;
		}
	}

	/**
	 * method for "Get book(s) by author id"
	 * two INNER JOINS are used to get data from 3 tables
	 *
	 * @param $id
	 *
	 * @return array
	 */
	public static function getBookByAuthorId($id){

		$id=intval($id);

		if ($id) {

			$db = Database::connect();

			$bookOfAuthorList = array();

			$result = $db->query( 'SELECT book.id, book.title
								FROM ((book_author
								INNER JOIN book ON book_author.book_id = book.id)
								INNER JOIN author ON book_author.author_id = author.id)
								WHERE `author_id`=' . $id );

			$i=0;
			while($row = $result->fetch()){
				$bookOfAuthorList[$i]['id'] = $row['id'];
				$bookOfAuthorList[$i]['title'] = $row['title'];
				$i++;
			}
			return $bookOfAuthorList;
		}
	}

	/**
	 * method for "Add a book to database"
	 *
	 * @param $options
	 *
	 * @return bool
	 */
	public static function createBook($options)
	{
		$db = Database::connect();

		$sql = 'INSERT INTO book (`title`, `topic`, `pages`, `price`) VALUES (:title, :topic, :pages, :price)';

		$result = $db->prepare($sql);
		$result->bindParam(':title', $options['title'], PDO::PARAM_STR);
		$result->bindParam(':topic', $options['topic'], PDO::PARAM_STR);
		$result->bindParam(':pages', $options['pages'], PDO::PARAM_INT);
		$result->bindParam(':price', $options['price'], PDO::PARAM_INT);
		$final = $result->execute();
		if ($final){
			$newBookId = $db->lastInsertId();
		}
		Author::addAuthorsForNewBook($newBookId, $options['authors']);

	}

	/**
	 * method for "Books number"
	 * used in widgets
	 *
	 * @return mixed
	 */
	public static function countBooks()
	{
		$db = Database::connect();

		$sql = 'SELECT COUNT(*) FROM `book`';

		$result = $db->query($sql);
		$count = $result->fetch()[0];
		return $count;
	}
}