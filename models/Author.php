<?php


class Author {

	public static function getAuthorList(){

		$db = Database::connect();

		$authorList = array();

		$result = $db->query('SELECT `id`, `name` FROM `author` ORDER BY `id`');

		$i=0;
		while($row = $result->fetch()){
			$authorList[$i]['id'] = $row['id'];
			$authorList[$i]['name'] = $row['name'];
			$i++;
		}

		return $authorList;
	}

	public static function getAuthorById($id){

		$id=intval($id);

		if ($id) {

			$db = Database::connect();

			$result = $db->query( 'SELECT `id`, `name` FROM `author` WHERE `id`=' . $id );
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$authorSingle = $result->fetch();

			return $authorSingle;
		}
	}

	public static function getAuthorByBookId($id){

		$id=intval($id);

		if ($id) {

			$db = Database::connect();

			$authorOfBookList = array();

			$result = $db->query( 'SELECT `author_id` FROM `book_author` WHERE `book_id`=' . $id );

			$i=0;
			while($row = $result->fetch()){
				$authorOfBookList[$i]['author_id'] = $row['author_id'];
				$i++;
			}
			return $authorOfBookList;
		}
	}

}