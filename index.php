<?php
    // Инициируем константы
    define('DS',DIRECTORY_SEPARATOR);
//    define('BASE_URL', '/sites/testwork/');
    define('BASE_URL', '/testwork/');
    define('FULL_URL', 'http://'.$_SERVER['HTTP_HOST'].BASE_URL);
    define('BASE_PATH', dirname(__FILE__));
    define('TEMPLATES_PATH', BASE_PATH.DS.'templates'.DS);
    define('CONTROLLERS_PATH', BASE_PATH.DS.'controllers'.DS);
    define('MODELS_PATH', BASE_PATH.DS.'models'.DS);
    define('LIBRARIES_PATH', BASE_PATH.DS.'libraries'.DS);
    define('LANGUAGES_PATH', BASE_PATH.DS.'languages'.DS);
    define('SALT', 'hNt5t_iny#46HTlk5k');
    
    // Инициируем переменные
    IFactory::set_language('en-GB');
    
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
        header("HTTP/1.0 404 Not Found");
        $name = 'error';
    }
    // Загружаем транслятор
    require_once LIBRARIES_PATH.'translator.php';
    
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

    /**
     * Класс лобальных настроек системы 
     */
    class IFactory{
        
        /**
         * Язык интерфейса пользователя
         * @var type 
         */
        private static $_language = 'en-GB';
        
        /**
         * Определяем язык
         * @return type 
         */
        public static function get_language()
        {
            return self::$_language;
        }
        
        /**
        *  Устанавливаем язык
        * @param string $app - имя приложения
        */
        public static  function set_language($language)
        {
            self::$_language = $language;
            
        }
        
    }