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



    
class Admin_Production_Model extends Production_Model
{

    public $img;
/**
* Метод загрузки изображения
* @param string $img
* @return mixed
*/
    public function addProductImg($lang_file_error)
    {
        if($_FILES['file']['error'] === 0)
        {
            $upload = new IRB_Upload_Img($lang_file_error);
            $upload->width  = 1200;
            $upload->height = 1200;
            
            if($error = $upload -> uploadFile('file'))
               return $error;
         
            $this->img = $upload -> new_name;        
        }
        else
            return NULL;
    }


/**
* Метод представления для редактирования продуктов.
* @param int $id
* @param boolean $edit
* @return string 
*/      
    public function createEditProduction($id, $edit = true)
    {
        $this->res = mysqlQuery("SELECT *
                                FROM `". DK_DBPREFIX . $this->table ."` 
                                WHERE `id` = ".(int)$id
                                );
        if($edit)
        {
             $row = mysqli_fetch_assoc($this->res);                    
             return htmlChars($row); 
        }
    }     
    
/**
* Метод записи новой продукции.
* @param int $parent
* @param string $name
* @param string $subscription
* @param string $price
* @param string $photo
* @return mixed 
*/      
    public function addProduction($parent, $name, $description, $price, $photo = '')
    {
        if(empty($name))
            return DK_LANG_NO_HEADER;
        
        if(empty($description))
            return DK_LANG_NO_TEXT;
            
        if(empty($price))
            return DK_LANG_NO_PRICE;            
     
        if(!empty($photo))
            $photo = ", `photo` = '". escapeString($photo) ."'";
        
        mysqlQuery("INSERT INTO `". DK_DBPREFIX . $this->table ."`
                     SET `id_parent`   = ".(int)$parent .",
                         `name`        = '". escapeString($name) ."',
                         `description` = '". escapeString($description) ."',
                         `price`       = '". escapeString($price) ."',
                         `sort`        = 0
                         ". $photo
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
* Метод редактирования продукции.
* @param int $id
* @param string $name
* @param string $subscription
* @param string $price
* @param string $photo
* @return mixed 
*/      
    public function editProduction($id, $name, $description, $price, $photo = '')
    {
        if(empty($name))
            return DK_LANG_NO_HEADER;
        
        if(empty($description))
            return DK_LANG_NO_TEXT;
     
        if(empty($price))
            return DK_LANG_NO_PRICE;
         
        if(!empty($photo))
            $photo = ", `photo` = '". escapeString($photo) ."'";
     
        mysqlQuery("UPDATE `". DK_DBPREFIX . $this->table ."`
                     SET `name`        = '". escapeString($name) ."',
                         `description` = '". escapeString($description) ."',
                         `price`       = '". escapeString($price) ."'
                         ". $photo ." 
                    WHERE `id` = ".(int)$id
                     ); 
     
         if(mysqli_affected_rows(DB::$link) > 0)
             return NULL;
        else
            return DK_LANG_FATAL_ERROR;   
     
    } 
    
/**
* Метод удаления продукта.
* @param int $id
* @return mixed 
*/      
    public function deleteProduction($id)
    {
     
        mysqlQuery("DELETE FROM `". DK_DBPREFIX . $this->table ."`
                    WHERE `id` = ".(int)$id
                     ); 
     
         if(mysqli_affected_rows(DB::$link) > 0)
             return NULL;
        else
            return DK_LANG_FATAL_ERROR;   
     
    }  
    
/**
* Метод представления для редактирования категорий.
* @param int $id
* @param boolean $edit
* @return string 
*/      
    public function createEditCat($id, $edit = true)
    {
        $this->res = mysqlQuery("SELECT *
                                FROM `". DK_DBPREFIX . $this->table ."_cat` 
                                WHERE `id` = ".(int)$id
                                );
        if($edit)
        {
             $row = mysqli_fetch_assoc($this->res);                    
             return htmlChars($row); 
        }
    } 
    
/**
* Метод записи новой категории.
* @param string $name
* @param string $subscription
* @param string $photo
* @return mixed 
*/      
    public function addCategories($name, $description, $photo = '')
    {
        if(empty($name))
            return DK_LANG_NO_HEADER;
        
        if(empty($description))
            return DK_LANG_NO_TEXT;
     
        if(!empty($photo))
            $photo = ", `photo` = '". escapeString($photo) ."'";
        
        mysqlQuery("INSERT INTO `". DK_DBPREFIX . $this->table ."_cat`
                     SET `name`        = '". escapeString($name) ."',
                         `description` = '". escapeString($description) ."'
                         ". $photo
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
* Метод редактирования категорий.
* @param int $id
* @param string $name
* @param string $subscription
* @param string $photo
* @return mixed 
*/      
    public function editCategories($id, $name, $description, $photo = '')
    {
        if(empty($name))
            return DK_LANG_NO_HEADER;
        
        if(empty($description))
            return DK_LANG_NO_TEXT;
     
        if(!empty($photo))
            $photo = ", `photo` = '". escapeString($photo) ."'";
    
        mysqlQuery("UPDATE `". DK_DBPREFIX . $this->table ."_cat`
                     SET `name`        = '". escapeString($name) ."',
                         `description` = '". escapeString($description) ."'
                         ". $photo ." 
                    WHERE `id` = ".(int)$id
                     ); 
     
         if(mysqli_affected_rows(DB::$link) > 0)
             return NULL;
        else
            return DK_LANG_FATAL_ERROR;   
     
    }      

/**
* Метод удаления категории.
* @param int $id
* @return mixed 
*/      
    public function deleteCategories($id)
    {
     
        mysqlQuery("DELETE FROM `". DK_DBPREFIX . $this->table ."_cat`
                    WHERE `id` = ".(int)$id
                     ); 
     
         if(mysqli_affected_rows(DB::$link) > 0)
             return NULL;
        else
            return DK_LANG_FATAL_ERROR;   
     
    }     
    
}  
?>