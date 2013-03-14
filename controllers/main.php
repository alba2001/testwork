<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');
require_once CONTROLLERS_PATH.'controller.php';

/**
 * Main Controller
 */
class ControllersMain extends ControllersController
{
    /**
     *  Выводим тело страницы
     */
    public function get_body()
    {
        require_once TEMPLATES_PATH.'body.php';
    }

}

