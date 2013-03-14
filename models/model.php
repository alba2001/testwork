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
    /**
     * Префикс модели
     * @var string 
     */
    protected $_prefix;
    
    public function __construct() {
        $this->get_prefix();
        // Устанавливаем приложение в трансляторе
        IText::set_app(strtolower($this->_prefix));
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
    /**
     * Возвращаем префикс модели
     * @return object model
     */
    protected function get_prefix()
    {
        if(!$this->_prefix)
        {
            preg_match("/^Models(\w+)$/", get_class($this), $regs);
            $this->_prefix = $regs[1];
        }
        return $this->_prefix;
    }
}

