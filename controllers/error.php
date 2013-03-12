<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');
require_once CONTROLLERS_PATH.'controller.php';

/**
 * Error Controller
 */
class ControllersError extends ControllersController
{
    public function get_body()
    {
        require_once TEMPLATES_PATH.'error.php';
    }
}

