<?php
class CartController
{
    public function actionAdd($id)
    {
        Cart::addProduct($id);

        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }


    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);

        return true;
    }

    public function actionDelete($id) {

        unset($_SESSION['products'][$id]);
        header('Location: /cart');
        return true;
    }

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategorieList();

        $productsInCart = false;

        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            $productsId = array_keys($productsInCart);
            $products = Product::getProductByIds($productsId);

            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once(ROOT . "/views/cart/index.php");

        return true;
    }

    public function actionCheckout()
    {
        $categories = array();
        $categories = Category::getCategorieList();
        
        $result = false;


        if (isset($_POST['submit'])) {

            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            $errors = false;
            if(!User::checkName($userName)){
                $errors[] = "Неправильное имя";
            }
            if(!User::checkPhone($userPhone)){
                $errors[] = "Неправильный номер";
            }


            if($errors == false){
                $productsInCart = Cart::getProducts();

                if(User::isGuest()){
                    $userId = false;
                } else {
                    $userId = User::checkLogged();
                }

                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

                if($result) {
                    $adminEmail = 'm.a.dasaev@gmail.com';
                    $message = 'HELLO MAGA!';
                    $subject = 'Новый заказ';
                    mail($adminEmail, $subject, $message);

                    Cart::clear();
                }
            } else {

                $productsInCart = Cart::getProducts();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }

        } else {
            $productsInCart = Cart::getProducts();
            if ($productsInCart == false) {
                header('Location: /');
            } else {
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userName = false;
                $userPhone = false;
                $userComment = false;

                if (User::isGuest()) {
                } else {
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);

                    $userName = $user['name'];
                }
            }
        }

        require_once(ROOT . "/views/cart/checkout.php");

        return true;
    }
}
