<?php 
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';
class SiteController
{

    public function actionIndex()
    {
        
        $categories = array();
        $categories = Category::getCategorieList();

        $latestProduct = array();
        $latestProduct = Product::getLatestProduct();

        $recomendProducts = Product::getRecomendedProducts();
        require_once(ROOT.'/views/site/index.php');


        return true;
    }
    public function actionContact()
    {
        $userEmail = '';
        $userText = '';
        $result = '';
        if (isset($_POST['submit'])) {
            $userEmail = $_POST['userEmail'];
            $userText =  $_POST['userText'];

            $errors = false;

            if(!User::checkEmail($userEmail)){
                $errors[] = 'Неправильный Email!';
            }

            if ($errors == false) {
                $adminEmail = 'm.a.dasaev@gmail.com';
                $message = "Текст: {$userText}. От {$userEmail} ";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }
        require_once(ROOT.'/views/site/contact.php');
        return true;
    }
}
?>