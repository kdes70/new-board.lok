<?php

/**
* @author B)DIMON
* @copyright 2013
*
* Модель
* @author IT studio IRBIS-team
* @copyright © 2011 IRBIS-team
*/
/////////////////////////////////////////////////////////

/**
* Генерация страницы ошибки при доступе вне системы
*/
    if(!defined('DK_KEY'))
    {
       header("HTTP/1.1 404 Not Found");     
       exit(file_get_contents('../404.html'));
    }
/////////////////////////////////////////////////////////
class Admin_Board_model extends Board_Model
{
    
    
/**
* Метод виборки всех объявлений
* 
*/   
    
    public function getAllBoard()
    {
        $this->res = mysqlQuery("SELECT * FROM `".DK_DBPREFIX.$this->table."`
                                ORDER BY `id` DESC");
    }
    
    
    
    
    
    
    
    
    
    
    
    
}

?>