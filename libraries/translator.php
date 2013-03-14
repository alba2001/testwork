<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');

/**
 * Translator class
 */
class LibrariesTranslator
{
    /**
     * Приложение
     * @var string
     */
    private $_app;

    public function __construct($app) {
        $this->_app = $app;
    }

    /**
     * Загружаем переводчик
     * @param type $language
     * @param type $app
     */
    private function _load()
    {
        $translatop = array();
        $language = IFactory::get_language();
        $app = $this->_app;
        $file_name = LANGUAGES_PATH.$language.DS.$language.'_'.  $app.'.ini';
        if(file_exists($file_name))
        {
            $translatop = parse_ini_file($file_name);
        }
        return $translatop;
    }
    
    /**
     * Перевод ключевого слова
     * @param type $key
     * @return type
     */
    public function _($string)
    {
        $translatop = $this->_load();
        $key = strtoupper($string);
        // Если есть перевод ключевого слова,то возвращаем перевод,
        // Если нет, то возвращаем ключевое слово
        if(isset($translatop[$key]))
        {
            $string = $translatop[$key];
        }
        return $string;
    }
}

/**
 * Text  handling class.
 *
 */
class IText
{
    /**
     * Приложение
     * @var string
     */
    private static $_app = '';
    

    /**
     * Устанавливаем приложение
     * @param string $app - имя приложения
     */
    public static  function set_app($app)
    {
        self::$_app = $app;
    }

    /**
     * Врзвращаем переведенную строку
     *  Если передано больше одного параметра, то то их подставляем как переменные
     * @param type $string more then one
     * @return type 
     */
    public static function _($string)
    {
        $translator = new LibrariesTranslator(self::$_app);
        $args = func_get_args();
        $count = count($args);
        $string = $translator->_($string);
        if($count == 1)
        {
            return $string;
        }
        $args[0] = $string;
        return call_user_func_array('sprintf', $args);
    }
}
