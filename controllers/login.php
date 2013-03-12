<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');
require_once CONTROLLERS_PATH.'controller.php';

/**
 * Login Controller
 */
class ControllersLogin extends ControllersController
{
    public function __construct() 
    {
        parent::__construct();
        $this->stylesheets[] = FULL_URL.'assets/css/login.css';
    }
    
    public function get_body()
    {
        require_once TEMPLATES_PATH.'login.php';
    }
}

