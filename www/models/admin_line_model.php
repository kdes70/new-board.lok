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


      
class Admin_Line_Model extends Line_Model
{

/**
* Метод записи.
* @param string $title
* @param string $text
* @return mixed 
*/      
    public function addLine($title, $text)
    {
        if(empty($title))
            return DK_LANG_NO_HEADER;
        
        if(empty($text))
            return DK_LANG_NO_TEXT;
        
        mysqlQuery("INSERT INTO `". DK_DBPREFIX . $this->table ."`
                     SET `date`   = NOW(),
                         `title`  = '". escapeString($title) ."',
                         `text`   = '". escapeString($text) ."',
                         `public` = 0 "
                     ); 
     
        if(mysqli_affected_rows(DB::$link) > 0)
        {
            $this->id = mysqli_insert_id(DB::$link);
            return NULL;    
        }
        else
            return DK_LANG_FATAL_ERROR;   
     
    }    
    
/**
* Метод представления для редактирования.
* @return array 
*/      
    public function createEdit($id)
    {
        $this->createFull($id);
        $row = mysqli_fetch_assoc($this->res);
        return htmlChars($row);   
    }
 
/**
* Метод редактирования.
* @param string $title
* @param string $text
* @return mixed 
*/      
    public function editLine($title, $text)
    {
        if(empty($title))
            return DK_LANG_NO_HEADER;
        
        if(empty($text))
            return DK_LANG_NO_TEXT;
     
        mysqlQuery("UPDATE `". DK_DBPREFIX . $this->table ."`
                     SET `date`   = NOW(),
                         `title`  = '". escapeString($title) ."',
                         `text`   = '". escapeString($text) ."' 
                    WHERE `id` = ". (int)$this->id
                     ); 
     
        if(mysqli_affected_rows(DB::$link) > 0)
            return NULL;
        else
            return DK_LANG_FATAL_ERROR;   
     
    } 
    
/**
* Метод публикации.
* @return mixed 
*/      
    public function publicLine()
    {
     
        mysqlQuery("UPDATE `". DK_DBPREFIX . $this->table ."`
                     SET  `public` = 1 
                    WHERE `id` = ". (int)$this->id
                     ); 
     
        if(mysqli_affected_rows(DB::$link) > 0)
            return NULL;
        else
            return DK_LANG_FATAL_ERROR;   
     
    }     

/**
* Метод удаления.
* @return mixed 
*/      
    public function deleteLine()
    {
     
        mysqlQuery("DELETE FROM `". DK_DBPREFIX . $this->table ."`
                    WHERE `id` = ". (int)$this->id
                     ); 
     
        if(mysqli_affected_rows(DB::$link) > 0)
            return NULL;
        else
            return DK_LANG_FATAL_ERROR;   
     
    }       
}
?>