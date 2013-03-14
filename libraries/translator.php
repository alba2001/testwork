<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');

/**
 * Translator class
 */
class LibrariesTranslator
{
    /**
     * Язык
     * @var string
     */
    private $_language = 'en-GB';


    /**
     * Приложение
     * @var string
     */
    private $_app = '';


    /**
     * Устанавливаем приложение
     * @param string $language
     */
    public function set_app($app)
    {
        $this->_app = $app;
    }

    /**
     * Устанавливаем язык
     * @param string $language
     */
    public function set_language($language)
    {
        $this->_language = $language;
    }

    /**
     * Загружаем переводчик
     * @param type $language
     * @param type $app
     */
    private function _load()
    {
        $translatop = array();
        $language = $this->_language;
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
    protected static $_app = '';
    
    /**
     * Язык
     * @var string 
     */
    protected static $_language = 'en-GB';
    

    /**
     *  Устанавливаем язык
     * @param string $app - имя приложения
     */
    public static  function set_language($language)
    {
        self::$_language = $language;
    }

    /**
     * Устанавливаем приложение
     * @param string $app - имя приложения
     */
    public static  function set_app($app)
    {
        self::$_app = $app;
    }

    public static function _($string)
    {
        var_dump($string);
        echo '<br/>';
        var_dump(func_get_args());
        $translator = new LibrariesTranslator(self::$_app, self::$_language);
        $translator->set_app(self::$_app);
        $translator->set_language(self::$_language);
        return $translator->_($string);
    }
}
