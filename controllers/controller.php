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
    protected $body;
    
    public function __construct() {
        $this->scripts = $this->get_scripts();
        $this->top_navs = $this->get_top_navs();
        $this->stylesheets = $this->get_stylesheets();
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
     * Список стилей, загружаемых на главной странице
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
     * Список скриптов, загружаемых на главной странице
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
            array(
                'href'=>'#',
                'text'=>'Contact',
                'class'=>'',
            ),
        );
    }
}

