<?php


class Book {

	public static function getBooksList(){

		$db = Database::connect();

		$bookList = array();

		$result = $db->query('SELECT `id`, `title`, `topic`, `pages`, `price`, `date_added` FROM `book` ORDER BY `id` LIMIT 10');

		$i=0;
		while($row = $result->fetch()){
			$bookList[$i]['id'] = $row['id'];
			$bookList[$i]['title'] = $row['title'];
			$bookList[$i]['topic'] = $row['topic'];
			$bookList[$i]['pages'] = $row['pages'];
			$bookList[$i]['price'] = $row['price'];
			$bookList[$i]['date_added'] = $row['date_added'];
			$i++;
		}

		return $bookList;
	}

	public static function getBookById($id){

		$id=intval($id);

		if ($id) {

			$db = Database::connect();

			$result = $db->query( 'SELECT `id`, `title`, `topic`, `pages`, `price`, `date_added` FROM `book` WHERE `id`=' . $id );
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$bookSingle = $result->fetch();

			return $bookSingle;
		}
	}


	public static function getBookByAuthorId($id){

		$id=intval($id);

		if ($id) {

			$db = Database::connect();

			$bookOfAuthorList = array();

			$result = $db->query( 'SELECT `book_id` FROM `book_author` WHERE `author_id`=' . $id );

			$i=0;
			while($row = $result->fetch()){
				$bookOfAuthorList[$i]['book_id'] = $row['book_id'];
				$i++;
			}
			return $bookOfAuthorList;
		}
	}

}