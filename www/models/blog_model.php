<?php

/**
* Генерация страницы ошибки при доступе вне системы
*/
    if(!defined('DK_KEY'))
    {
       header("HTTP/1.1 404 Not Found");     
       exit(file_get_contents('../404.html'));
    }
/////////////////////////////////////////////////////////
/**
* Модель
* @author IT studio IRBIS-team
* @copyright © 2014 IRBIS-team
*/
/////////////////////////////////////////////////////////

class Blog_Model
{

    public $table, $menu, $title, $keywords, $description;
    public $clear  = false;      
    protected $res, $num, $cond;

/**
* Конструктор
* @param string $table
* @param int $num
*/
    public function __construct($table, $num = 1)
    {
        $this->table = $table;
        $this->num   = $num;
    }    
    
/**
* Метод генерации ленты анонсов
* @param int $num_rows
* @param int $num_words
* @param bolean $list
* @return void
*/
    public function createPreview($num_rows, $num_words, $list = true)
    {
        $pag   = new IRB_Paginator($this->num, $num_rows);
        $where = !defined('DK_ADMIN') ? "WHERE `public` = 1 " : '';    
     
        $this->res = $pag -> countQuery("SELECT `id`, `title`, `public`, 
                                            DATE_FORMAT(`date`,'%d-%m-%Y') AS `date`,
                                            SUBSTRING_INDEX(`text`,' ', ". $num_words .") AS `text`
                                              FROM `". DK_DBPREFIX . $this->table ."`
                                              ". $where ."
                                              ORDER BY `id` DESC "
                                        );
        if($list)
            $this->menu = $pag -> createMenu();
    }  
    
/**
* Метод генерации полного текста по идентификатору.
* @param int $id
* @param bool $public
* @return void
*/  
    public function createFull($id)
    {  
        $and = !defined('DK_ADMIN')  ? " AND   `public` = 1 " : '';
        
        $this->res = mysqlQuery("SELECT `id`, `public`,  
                                 DATE_FORMAT(`date`,'%d-%m-%Y') AS `date`, 
                                `m_title`, `m_keywords`, `m_description`, `title`, `text`
                                    FROM `". DK_DBPREFIX . $this->table ."`
                                      WHERE `id` = ". (int)$id ."
                                      ". $and ."
                                    ORDER BY `id` DESC "
                                );      
    }
}