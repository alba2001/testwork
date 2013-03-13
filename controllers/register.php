<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');
require_once CONTROLLERS_PATH.'login.php';

/**
 * Register Controller
 */
class ControllersRegister extends ControllersLogin
{
    public function __construct() 
    {
        parent::__construct();
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
        list($result, $msg) = $this->_model->save();
        if(!$result)
        {
            $this->error_msg=$msg;
            $this->display();
        }
        else
        {
            header( 'Location: '.FULL_URL);
        }
    }
}

