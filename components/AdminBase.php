<?php 

abstract class AdminBase
{
    
    public static function checkAdmin()
    {
        $userId = User::checkLogged();

        $user = User::getuserById($userId);

        if ($user['role'] == 'admin') {
            return true;
        }

        die('Acces Denided');
    }


}



?>