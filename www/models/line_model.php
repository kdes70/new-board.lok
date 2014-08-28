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


   
    
class Line_Model
{
    
    public $id, $table, $menu;
    public $clear = false;
    
   // private ;
    
    protected $num, $res, $where, $and; 

/**
* Конструктор
* @param string $table
* @param int $num
* @param boolean $public
*/
    public function __construct($table, $num = 1, $public = true)
    {
        $this->table = $table;
        $this->num   = $num;
        $this->where = $public ? ' WHERE `public` = 1 ' : '';
        $this->and   = $public ? ' AND   `public` = 1 ' : '';        
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
        $pag = new IRB_Paginator($this->num, $num_rows);
        
        $this->res = $pag -> countQuery("SELECT `id`,  `title`, `public`,
                                                DATE_FORMAT(`date`,'%d-%m-%Y') AS `date`,
                                            SUBSTRING_INDEX(`text`,' ', ". $num_words .") AS `text`
                                              FROM `". DK_DBPREFIX . $this->table ."`
                                              ". $this->where ." 
                                              ORDER BY `id` DESC "
                                        );
        
        if($list)
            $this->menu = $pag -> createMenu();
    }  
    
/**
* Метод генерации полного текста по идентификатору.
* @param int $id
* @return void
*/  
    public function createFull($id)
    {
        $this->res = mysqlQuery("SELECT `id`,  `title`, `public`, `text`,
                                        DATE_FORMAT(`date`,'%d-%m-%Y') AS `date`
                                    FROM `". DK_DBPREFIX . $this->table ."`
                                      WHERE `id`     = ". (int)$id ."
                                      ". $this->and ."  
                                    ORDER BY `id` DESC "
                                );
        
    }
    
/**
* Метод представления.
* @param string $template
* @param string $mod
* @param string $link
* @return string 
*/      
    public function createRows($template, $mod, $page, $link)
    {
        $rows  = '';    
        $tpl   = getTpl($template);    
        $bb = new IRB_BBdecoder();
       
        while($row = mysqli_fetch_assoc($this->res))
        {
            $row['title'] = htmlChars($row['title']);
            
            if($this->clear)
                $row['text'] = $bb -> stripBBtags($row['text']);
            else
                $row['text'] = $bb -> createBBtags($row['text']);
                
            $row['link']  = $link;
            $num          = ($this->num > 1) ? $this->num : 0;
            $row['url']   = href('page='.$page, 'mod='. $mod, 'parent='. $row['id'], 'num='. $num);           
            $rows .= parseTpl($tpl, $row);   
        }
        
        return $rows;    
    }

}