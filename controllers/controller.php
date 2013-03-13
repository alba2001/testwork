<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');

/**
 * Main Controller
 */
class ControllersController
{
    protected $scripts = array();
    protected $stylesheets = array();
    protected $title = 'Василий Наливайко';
    protected $description = '';
    protected $author = '';
    protected $top_navs = array();
    protected $project_name = 'Project name';
    protected $_model;
    /**
     * Сообщение об ошибке
     * @var html 
     */
    protected $error_msg = '';
    
    public function __construct() {
        $this->scripts = $this->get_scripts();
        $this->top_navs = $this->get_top_navs();
        $this->stylesheets = $this->get_stylesheets();
        $this->_model = $this->get_model();
    }

    /**
     * Возвращаем объект модели
     * @param string $prefix
     * @return object model
     */
    protected function get_model($prefix = '')
    {
        if(!$prefix)
        {
            preg_match("/^Controllers(\w+)$/", get_class($this), $regs);
            $prefix = $regs[1];
        }
        else 
        {
            $prefix = ucfirst($prefix);
        }
        require_once MODELS_PATH.strtolower($prefix).'.php';
        $model_class_name = 'Models'.$prefix;
        return new $model_class_name;
    }

    /**
     *  Выводим тело страницы
     */
    public function get_body()
    {
        require_once TEMPLATES_PATH.'body.php';
    }

    /**
     * Показ страницы 
     */
    public function display()
    {
        require_once TEMPLATES_PATH.'main.php';
    }
    /**
     * Список java скриптов, загружаемых на главной странице
     * @return array
     */
    protected function get_scripts()
    {
        return array(
            FULL_URL.'assets/js/jquery.js',
            FULL_URL.'assets/js/bootstrap.js',
        );
    }
    /**
     * Список стилей, загружаемых на главной странице
     * @return array
     */
    protected function get_stylesheets()
    {
        return array(
            FULL_URL.'assets/css/bootstrap.css',
            FULL_URL.'assets/css/bootstrap-responsive.css',
            FULL_URL.'assets/css/page.css',
        );
    }
    /**
     * Горизонтальное меню
     * @return array
     */
    protected function get_top_navs()
    {
        return array(
            array(
                'href'=>FULL_URL,
                'text'=>'Home',
                'class'=>'active',
            ),
            array(
                'href'=>FULL_URL.'login',
                'text'=>'Login',
                'class'=>'',
            ),
        );
    }
}

