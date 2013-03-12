<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');
require_once CONTROLLERS_PATH.'controller.php';

/**
 * Login Controller
 */
class ControllersRegister extends ControllersController
{
    private $_msg;
    
    public function __construct() 
    {
        parent::__construct();
        $this->stylesheets[] = FULL_URL.'assets/css/login.css';
        $this->scripts[] = FULL_URL.'assets/js/forms/register.js';
    }
    
    /**
     * Выводим форму регистрации
     */
    public function get_body()
    {
        require_once TEMPLATES_PATH.'register.php';
    }
    
    /**
     * Обработка регистрационных данных
     */
    public function register()
    {
        var_dump($_POST);
//        $this->display();
    }
}

