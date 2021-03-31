<?php

/**
 * UserController Class
 */
class UserController
{
    /**
     * action method for "Register"
     */
    public function actionRegister()
    {
        $username = false;
        $password = false;
        $result = false;

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkUsername($username)) {
                $errors[] = 'Username must be longer than 2 symbols';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Password must be longer than 5 symbols';
            }
            if (User::checkUserExists($username)) {
                $errors[] = 'User <b>'.$username.'</b> already exists, try to <a href="/user/login" class="text-success">Log In</a>';
            }
            
            if ($errors == false) {
                $result = User::register($username, $password);
            }
        }

        require_once(ROOT . '/views/user/register.php');
        return true;
    }
    
    /**
     * action method for "Login"
     */
    public function actionLogin()
    {
        $username = false;
        $password = false;

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkUsername($username)) {
                $errors[] = 'Wrong Username';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Password should be longer than 5 symbols';
            }

            $userId = User::checkUserData($username, $password);

            if ($userId == false) {
                $errors[] = 'Wrong username and/or password';
            } else {
                User::auth($userId);
				if (User::checkAdmin()){
					header("Location: /admin");
				} else {
					header( "Location: /books" );
				}
            }
        }

        require_once(ROOT . '/views/user/login.php');
        return true;
    }

	/**
	 * action method for "Logout"
	 * deletes the user from session
	 */
	public function actionLogout()
	{

		unset($_SESSION["user"]);

		header("Location: /user/login");
	}

	/**
	 * action method for "error"
	 * redirects to 404 page
	 */
	public function actionError()
	{

		header("Location: /views/user/404.php");
	}

}
