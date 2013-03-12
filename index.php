<?php
    // Инициируем константы
    define('DS',DIRECTORY_SEPARATOR);
    define('BASE_URL', '/testwork/');
    define('FULL_URL', 'http://'.$_SERVER['HTTP_HOST'].BASE_URL);
    define('BASE_PATH', dirname(__FILE__));
    define('TEMPLATES_PATH', BASE_PATH.DS.'templates'.DS);
    define('CONTROLLERS_PATH', BASE_PATH.DS.'controllers'.DS);

    // Находим контроллер
    $uri = explode('/',str_replace(BASE_URL, '', $_SERVER["REQUEST_URI"]));
    switch ($uri[0]) {
    case 'main':
        header( 'Location: '.FULL_URL);
        break;
    case '':
        $name = 'main';
        break;
    case 'login':
    case 'register':
        $name = $uri[0];
        break;
    default:
        $name = 'error';
    }
    // Находим задачу
    $task = isset($uri[1])?$uri[1]:'display';
    
    // Выполняем задачу
    require_once CONTROLLERS_PATH.$name.'.php';
    $controller_name = 'Controllers'.ucfirst($name);
    $controller = new $controller_name;
    if(method_exists($controller, $task))
    {
        $controller->$task();
    }
    else 
    {
        $controller->display();
    }
