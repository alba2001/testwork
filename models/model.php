<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');

/**
 * Main model
 */
class ModelsModel
{
    /**
     * Типы шаблонов
     * @var array 
     */
    protected $shablon_types;
    
    public function __construct() {
        $this->shablon_types = $this->_get_shablon_types();
    }
    
    /**
     * Типы шаблонов и из значения
     * @return type 
     */
    private function _get_shablon_types()
    {
        return array(
            'email'=>'/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/',
            'password'=>'/^[a-zA-Z0-9!@#$%^&\*_\[\]]{6,16}$/',
        );
    }
}

