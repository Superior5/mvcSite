<?php 

    // FRONT CONTROLLERcd
    
    // 1. Общие настройки
    ini_set('dispaly_errors', 1);
    error_reporting(E_ALL);


    // 2. Подключение файлов системы
    define('ROOT', dirname(__FILE__));
    require_once(ROOT.'/components/Router.php');
    include_once(ROOT.'/components/Db.php');
    include_once(ROOT.'/models/Category.php');

    


    // 3. Установка соединения с БД

    // 4. Вызов Router 
    $router = new Router;
    $router -> run();

?>