<?php

/**
 * Class Database
 * connection to database
 */
class Database {

	/**
	 * method fo connecting to database
	 * @return PDO
	 */
	public static function connect(){

		$dbParams = ROOT.'/config/db.php';

		$params = include($dbParams);

		$db = new PDO( "mysql:host={$params['dbHost']};dbname={$params['dbName']}", $params['dbUser'], $params['dbPassword'] );

		return $db;
	}
}