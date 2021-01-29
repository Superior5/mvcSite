<?php 

class AdminPeoductController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        echo 'eflkrofgnwef';
        $productList = Product::getProductListByCategory()
    }
}


?>