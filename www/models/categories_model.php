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

class Categories_Model
{
    public $table;


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
* @return array
*/
public function getCategory()
{
    $this->res = mysqlQuery("SELECT *
                        FROM `". DK_DBPREFIX . $this->table ."`
                        ORDER BY `parent_id`, `name` "
                        );
    //Массив категорий
    $cat = array();
    while ($row = mysqli_fetch_assoc($this->res)) {
        if(!$row['parent_id'])
        {
            $cat[$row['id_cat']][] = $row['name'];
        }else{
            $cat[$row['parent_id']]['sub'][$row['id_cat']] = $row['name'];
        }
    }
    return $cat;
}

	private function _listCategory()
	{
		$this->res = mysqlQuery("SELECT *
		                    FROM `". DK_DBPREFIX . $this->table ."`
		                    ORDER BY `id_cat` "
		                    );
		$rows = '';
		if($this->res)
		{
			while ($row = mysqli_fetch_assoc($this->res)) {
			 	$rows[] = $row;
			 }
		}
		return $rows;
	}

	public function createCategory($tpl)
	{
		
	   $rows = $this->getCategory();        

	          
	       
	       $cont = getTpl($tpl);
	      
	       $view = parseTpl($cont, $rows);
	       
	            
	  // print_r($rows);
	   return $view;
	}


}
?>
