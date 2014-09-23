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
    
   
  
     public function getAllAdvert($num_rows)
    {
       // $where = !defined('DK_ADMIN') ? "WHERE `public` = '1' AND `id_city`=".(int)$this->city."" : '';
      	//$where = !defined('DK_ADMIN') ? "WHERE `confirm` = '1' AND `is_vip` = '0' AND `id_city` = ".$this->city_id : '';
        $pag = new IRB_Paginator($this->num, $num_rows);

        $this->res = $pag -> countQuery("SELECT a. *, c.`name` as `cat_name`, s.`city_name_ru` as `city` 
    										FROM	".DK_DBPREFIX.$this->table." a,
        											".DK_DBPREFIX.$this->tb_cat." c,
        											".DK_DBPREFIX.$this->tb_city." s
											WHERE a.`id_cat` = c.`id_cat` and a.`id_city` = s.`id`
											ORDER BY a.`id_adv` DESC");

        $this->menu = $pag -> createMenu();
        $this->count = $pag->TableCount;
    }
    

    
    
    
    
    
    
    
    
    
    
}

?>