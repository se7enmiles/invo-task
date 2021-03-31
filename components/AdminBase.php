<?php

/**
 * Abstract class contains general logic for all controllers used for admin user
 */
abstract class AdminBase
{

    /**
     * method checks if the user is admin
     * @return boolean
     */
    public static function checkAdmin()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        if ($user['role'] == 1) {
            return true;
        } else {
	        $errorMessage = "You have to login as an admin to access those pages!!!<br>Username: <b><i> admin</i></b><br>Password:<b><i> 123456</i></b>";
	        die( require ROOT . "/views/user/login.php" );
        }
    }

}
