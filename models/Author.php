<?php

/**
 * Class Author
 */

class Author {

	/**
	 * action method for "Get all authors"
	 * @return array
	 */
	public static function getAuthorList(){

		$db = Database::connect();

		$authorList = array();

		$result = $db->query('SELECT `id`, `name` FROM `author` ORDER BY `name`');

		$i=0;
		while($row = $result->fetch()){
			$authorList[$i]['id'] = $row['id'];
			$authorList[$i]['name'] = $row['name'];
			$authorList[$i]['books'] = Book::getBookByAuthorId($row['id']);
			$i++;
		}

		return $authorList;
	}

	/**
	 * action method for "Get author by id"
	 * @param $id
	 *
	 * @return mixed
	 */
	public static function getAuthorById($id){

		$id=intval($id);

		if ($id) {

			$db = Database::connect();

			$result = $db->query( 'SELECT `id`, `name`, `date_added` FROM `author` WHERE `id`=' . $id );
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$authorSingle = $result->fetch();
			$authorSingle['books'] = Book::getBookByAuthorId($id);

			return $authorSingle;
		}
	}

	/**
	 * method for "Get author(s) by Book id"
	 * two INNER JOINS are used to get data from 3 tables
	 *
	 * @param $id
	 *
	 * @return array
	 */
	public static function getAuthorByBookId($id){

		$id=intval($id);

		if ($id) {

			$db = Database::connect();

			$authorOfBookList = array();

			$result = $db->query( 'SELECT author.name, author.id
								FROM ((book_author
								INNER JOIN book ON book_author.book_id = book.id)
								INNER JOIN author ON book_author.author_id = author.id)
								WHERE `book_id`='.$id.'
								ORDER BY author.id');

			$i=0;
			while($row = $result->fetch()){
				$authorOfBookList[$i]['id'] = $row['id'];
				$authorOfBookList[$i]['name'] = $row['name'];
				$i++;
			}
			return $authorOfBookList;
		}
	}
	/**
	 * method for "Authors number"
	 * used in widgets
	 *
	 * @return mixed
	 */
	public static function countAuthors()
	{
		$db = Database::connect();

		$sql = 'SELECT COUNT(*) FROM `author`';

		$result = $db->query($sql);
		$count = $result->fetch()[0];
		return $count;
	}




	/**
	 * add authors while creating or updating a book
	 *
	 * @param $bookId
	 * @param $authors
	 */
	public static function addAuthorsForNewBook($bookId, $authors)
	{
		$db = Database::connect();

		$newBookAuthors = array();

		if (!empty($authors['new'])):

			// add new authors to 'authors'

			$sql = 'INSERT INTO `author` (`name`) VALUES (:author)';
			$result = $db->prepare($sql);

			foreach ($authors['new'] as $author):

				if ($id = Author::checkAuthorExists($author)) {
					$newBookAuthors[] = $id;
				} else {
					$result->bindParam( ':author', $author, PDO::PARAM_STR );
					if ( $result->execute() ) {
						$newBookAuthors[] = $db->lastInsertId();
					}
				}
			endforeach;
		endif;

		if(!empty($authors['existing'])):
			foreach ($authors['existing'] as $author):
				$newBookAuthors[] = $author;
			endforeach;
		endif;

		if(!empty($newBookAuthors) && !empty($bookId)):
			$sql = 'INSERT INTO `book_author` (`book_id`, `author_id`) VALUES (:book_id, :author_id)';
			$result = $db->prepare($sql);

			foreach (array_unique($newBookAuthors) as $author_id):
				$result->bindParam(':book_id', $bookId, PDO::PARAM_INT);
				$result->bindParam(':author_id', $author_id, PDO::PARAM_INT);
				$result->execute();
			endforeach;
		endif;
	}
	/**
	 * checks if author with same name exists in database
	 * used in book create and add author
	 *
	 * @param $username
	 *
	 * @return bool
	 */
	public static function checkAuthorExists($name)
	{
		$db = Database::connect();

		$sql = 'SELECT id FROM author WHERE name = :name';

		$result = $db->prepare($sql);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->execute();

		if ($id = $result->fetchColumn()) {
			return $id;
		}

		return false;
	}
}