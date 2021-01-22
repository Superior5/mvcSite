<?php 


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

        $total = Product::getTotalProductsInCategory($categoryId);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT.'/views/catalog/category.php');

        return true;
    }
}
?>