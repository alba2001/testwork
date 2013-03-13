<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');
require_once MODELS_PATH.'login.php';

/**
 * Register Model
 */
class ModelsRegister extends ModelsLogin
{
    public function save()
    {
//        return array(0,'Test');
        return array(1,'Test');
    }
}

