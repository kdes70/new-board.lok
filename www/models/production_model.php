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


    
class Production_Model
{
    
    public $table, $cat_name, $id;    
    protected $res;

/**
* Конструктор
* @param string $table
*/
    public function __construct($table)
    {
        $this->table = $table;
    }
    
/**
* Метод генерации списка категорий
* @param int $id
* @return void
*/
    public function createCategory($id = '')
    {
        $sql = empty($id) ? ' ORDER BY `sort` ASC ' : ' WHERE `id` = '.(int)$id ;
        
        $res = mysqlQuery("SELECT *
                            FROM `". DK_DBPREFIX . $this->table ."_cat` 
                            ". $sql
                            );
         
        if(empty($id))
            $this->res = $res;
        else
   {
       $row = mysqli_fetch_assoc($res);
       $this->cat_name = $row['name'];
   }
       
    }  
    
/**
* Метод генерации списка товаров выбранной категории
* @param int $id
* @param int $num_words
* @return void
*/
    public function createListProduct($id, $num_words)
    {     
        $this->res = mysqlQuery("SELECT  `id`, `name`, `photo`, `price`,
                                  SUBSTRING_INDEX(`description`,' ', ". $num_words .") AS `description`
                                  FROM `". DK_DBPREFIX . $this->table ."` 
                                  WHERE `id_parent` = ".(int)$id ."
                                  ORDER BY `sort` ASC "
                                );       
    }  
    
/**
* Метод генерации товара
* @param int $id
* @return void
*/
    public function createProduct($id)
    {    
        $this->res = mysqlQuery("SELECT *
                                  FROM `". DK_DBPREFIX . $this->table ."` 
                                  WHERE `id` = ".(int)$id 
                                );
        
    }      
   
/**
* Метод представления.
* @param string $template
* @param string $mod
* @param string $flag
* @return string 
*/      
    public function createRows($template, $mod, $flag = false)
    {
        $rows = '';    
        $tpl  = getTpl($template);  
        $bb = new IRB_BBdecoder();
        
        while($row = mysqli_fetch_assoc($this->res))
        {
            $row['src']  = !empty($row['photo']) ? $row['photo'] : '';
            $row['name'] = htmlspecialchars($row['name']);           
            $row['description'] = $bb -> createBBtags($row['description']); 
          
            if(!$flag)
                $row['url'] = href('mod='. $mod, 'parent='. $row['id']);                
            else
                $row['url'] = href('mod='. $mod, 'id='. $row['id']);
                
         
            $rows .= parseTpl($tpl, $row);   
        }
        return $rows;    
    }

}