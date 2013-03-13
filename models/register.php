<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');
require_once MODELS_PATH.'login.php';
require_once LIBRARIES_PATH.'database.php';

/**
 * Register Model
 */
class ModelsRegister extends ModelsLogin
{
    /**
     * Массив обязательных полей
     * @var array 
     */
    protected $required;
    
    /**
     * Список полей, проверяемых шаблоном
     * @var array
     */
    protected $shablon_fields;


    public function __construct() {
        parent::__construct();
        $this->required = array('email', 'password1', 'password2');
        $this->shablon_fields = array(
            'email' =>'email', 'password1'=>'password', 'password2'=>'password'
        );
    }

    /**
     * Сохраняем регистрационные данные в таблице пользователей
     * @return array (bilean, string) 
     */
    public function save()
    {
        $data = $_POST['iform'];
        // Проверка заполнения обязательных полей
        list($result, $msg) = $this->is_not_empty($data);
        if(!$result)
        {
            return array(0, $msg);
        }
        // Проверка соответствия данных заданным шаблонам
        list($result, $msg) = $this->check_with_shablon($data);
        if(!$result)
        {
            return array(0, $msg);
        }
        // Проверка совпадения паролей
        if($data['password1'] != $data['password2'])
        {
            return array(0, 'Passwords do not match');
        }
        $query = "INSERT INTO `dostavim_veles`.`vel_testwork_users` (`email`, `password`) VALUES ('easd@fgh.id', '012345678');";
        $db = new LibrariesDatabaseInterface;
        if(!$db->query($query))
        {
            return array(0, $db->error_query_execute);
        }
        return array(1,'');
        
    }
    
    /**
     * Проверка заполнения обязательных полей
     * @param array $data
     * @return array (bilean, string) 
     */
    protected function is_not_empty($data)
    {
        $msgs = array();
        $result = TRUE;
        // Проверка на заполнение обязательных полей
        foreach ($data as $key=>$value)
        {
            if(in_array($key, $this->required) AND !$value)
            {
                $msgs[] = 'Required field '.$key.' is empty';
                $result = FALSE;
            }
        }
        return array($result, implode('</br>', $msgs));
    }
    
    /**
     * Проверка соответствия данных заданным шаблонам
     * @param array $data
     * @return array (bilean, string) 
     */
    protected function check_with_shablon($data)
    {
        $msgs = array();
        $result = TRUE;
        $types = $this->shablon_types;
        $fields = $this->shablon_fields;
        // Проверка соответствия данных заданным шаблонам
        foreach ($data as $key=>$value)
        {
            if(isset($fields[$key]) AND !preg_match($types[$fields[$key]],$value))
            {
                $msgs[] = 'Field '.$key.' does not match the patern';
                $result = FALSE;
            }
        }
        return array($result, implode('</br>', $msgs));
    }
}

