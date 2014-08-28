<?php

/**
* @author B)DIMON
* @copyright 2013
*
* Контроллер
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



/** 
* Блок записи информации 
*/ 
    if($ok && look::check()) 
    { 
        if(!$POST['value1'])    
            $info[] = DK_LANG_NO_NAME;  
        
        if(!$POST['value2'])    
            $info[] = DK_LANG_NO_TEXT;   
     
        if(empty($info)) 
        {      
            mysqlQuery("INSERT INTO `". DK_DBPREFIX ."guest`  
                        SET  
                        `name` = '". escapeString($POST['value1']) ."',  
                        `text` = '". escapeString($POST['value2']) ."'"  
                        );  
         
            reDirect();     
        }     
    } 
   
    
    
    $pgt = new IRB_Paginator($GET['num'], DK_CONFIG_NUM_ROWS);   

    $res = $pgt -> countQuery("SELECT DATE_FORMAT(`date`,'%d-%m-%Y') AS `date`,
                               `name`, `text`
                               FROM `". DK_DBPREFIX ."guest`  
                               ORDER BY `id` ASC"
                               ); 
    
    $page_menu = $pgt -> createMenu();     
    $rows = ''; 

    if(mysqli_num_rows($res) > 0)  
    {  
        $cont = getTpl('guest/rows');  
        $bb   = new IRB_BBdecoder();
     
        while($row = mysqli_fetch_assoc($res))  
        {  
            $row['name'] = htmlspecialchars($row['name']);
            $row['text'] = $bb -> createBBtags($row['text']);  
            $rows .= parseTpl($cont, $row);  
        }  
    } 

    $POST = htmlChars($POST);
    include DK_ROOT .'/skins/tpl/guest/show.tpl';


