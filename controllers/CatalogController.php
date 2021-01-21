<?php 
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';
class CatalogController
{

    public function actionIndex()
    {
        
        $categories = array();
        $categories = Category::getCategorieList();

        $latestProduct = array();
        $latestProduct = Product::getLatestProduct(12);
        require_once(ROOT.'/views/catalog/index.php');


        return true;
    }
    public function actionCategory($categoryId)
    {
        $categories = array();
        $categories = Category::getCategorieList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductListByCategory($categoryId);
        require_once(ROOT.'/views/catalog/catalog.php');

        return true;
    }
}
?>