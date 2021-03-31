<?php

/**
 * Class User for managing users
 */
class User
{

	/**
	 * action method for "User register"
	 *
	 * @param $username
	 * @param $password
	 *
	 * @return bool
	 */
	public static function register($username, $password)
	{
		$db = Database::connect();

		$sql = 'INSERT INTO `user` (`username`, `password`) '
		       . 'VALUES (:username, :password)';

		$result = $db->prepare($sql);
		$result->bindParam(':username', $username, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);

		return $result->execute();
	}

	/**
	 * method for "Users number"
	 * used in widgets
	 *
	 * @return mixed
	 */
	public static function countUsers()
	{
		$db = Database::connect();

		$sql = 'SELECT COUNT(*) FROM `user`';

		$result = $db->query($sql);
		$count = $result->fetch()[0];
		return $count;
	}

	/**
	 * method for check username and password match
	 * used in login
	 *
	 * @param $username
	 * @param $password
	 *
	 * @return bool
	 */
    public static function checkUserData($username, $password)
    {
        $db = Database::connect();

        $sql = 'SELECT * FROM user WHERE username = :username AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }
        return false;
    }

	/**
	 * save the user in session
	 * used in login
	 *
	 * @param $userId
	 */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

	/**
	 * checks if user is logged in
	 *
	 * @return mixed
	 */
	public static function checkLogged()
	{
		if (isset($_SESSION['user'])) {
			return $_SESSION['user'];
		} else {
			header( "Location: /user/login" );
		}
	}

	/**
	 * checks if user is a guest (not registered)
	 *
	 * @return bool
	 */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

	/**
	 * checks if username is longer than 5 symbols
	 * used in validation during registration and login
	 *
	 * @param $username
	 *
	 * @return bool
	 */
    public static function checkUsername($username)
    {
        if (strlen($username) >= 5) {
            return true;
        }
        return false;
    }

	/**
	 * checks if password is longer than 5 symbols
	 * used in validation during registration and login
	 *
	 * @param $password
	 *
	 * @return bool
	 */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

	/**
	 * checks if user with same username exists in database
	 * used in registration
	 *
	 * @param $username
	 *
	 * @return bool
	 */
    public static function checkUserExists($username)
    {
        $db = Database::connect();

        $sql = 'SELECT COUNT(*) FROM user WHERE username = :username';

        $result = $db->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
	        return true;
        }

        return false;
    }

	/**
	 * gets user data by id
	 * used in admin check
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
    public static function getUserById($id)
    {
        $db = Database::connect();

        $sql = 'SELECT * FROM user WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

	/**
	 * checks if logged in user is an admin
	 * used in admin controller
	 *
	 * @return bool
	 */
	public static function checkAdmin()
	{
		$userId = User::checkLogged();

		$user = User::getUserById($userId);

		if (!empty($user) && $user['role'] == 1) {
			return true;
		} else {
			return false;
		}
	}
}
