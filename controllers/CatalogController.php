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
    public function actionCategory($categoryId, $page = 1)
    {
        echo 'category '. $categoryId;
        echo '<br />category '. $page;
        $categories = array();
        $categories = Category::getCategorieList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductListByCategory($categoryId, $page);
        require_once(ROOT.'/views/catalog/category.php');

        return true;
    }
}
?>