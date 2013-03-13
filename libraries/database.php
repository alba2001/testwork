<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');

/**
 * Data base class
 */
class LibrariesDatabaseInterface
{
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = 'xspsxs123';
    private $_dbname = ' dostavim_veles';
    private $_db;
    public $error_query_execute = '';


    /**
     * Конструктор 
     */
    public function __construct() {
       // Create connection
        $this->_db = mysqli_connect(
                $this->_host,$this->_username,$this->_password,$this->_dbname
                );

        // Check connection
        if (mysqli_connect_errno($this->_db))
        {
            die("Failed to connect to MySQL: " . mysqli_connect_error());
        };
    }
    
    /**
     * Деструктор 
     */
    public function __destruct() {
        mysqli_close($this->_db);
    }

    /**
     * Выполнение запросов
     * @param string (query) $query
     * @return boolean 
     */
    public function query($query)
    {
        // Execute query
        if(!mysqli_query($this->_db,$query))
        {
            $this->error_query_execute = mysqli_error();
            return FALSE;
        }
        return TRUE;
    }
    
    /**
     * Выполнение запросов с возвращением резулььаьа
     * @param string (query) $query
     * @return boolean 
     */
    public function query_result($query)
    {
        // Execute query
        $result = mysqli_query($this->_db,$query);
        if(!$result)
        {
            $this->error_query_execute = mysqli_error();
            return FALSE;
        }
        return TRUE;
    }
    
}
