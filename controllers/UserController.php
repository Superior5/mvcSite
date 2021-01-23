<?php

class UserController
{
    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';
        $result = false;


        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Короткое имя';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Неаправильный email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль дожен быть длиннее 6-ти символов';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой майл уже есть';
            }
            // var_dump(User::checkEmailExists($email));
            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }
        }



        require_once(ROOT . '/views/user/register.php');
        return true;
    }
}
