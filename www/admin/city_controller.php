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

    
    
    $res = mysqlQuery("SELECT * FROM ".DK_DBPREFIX."city");
    
   $menu  = "<ul  class=\"pages_menu\">\n"; 
     
   while($m = mysqli_fetch_assoc($res))
   {
    
    $menu .= '<li><input name="form[array1][]" type="checkbox" value="'. $m['url'] .'" />  
                <a href="'. href('mod='. $m['url']) .'" >'. $m['city'] ."</a>  
                </li>\n";          
    
    $menu .= "</ul>\n"; 
   } 
    
/*
* Блок чтения
*/     
    
    $modul = !empty($GET['mod']) ? $GET['mod'] : DK_LANG_NO_SELECT; 
    
    
    
    $POST['value2'] = !empty($GET['mod']) 
                    ? $GET['mod']['city'] : DK_LANG_NO_TITLE;
                    
    $POST['value3'] = !empty($GET['mod']) 
                    ?    $GET['mod']['url'] : DK_LANG_NO_KEYWORDS;
    
    
    
    
    
    if($ok)
    {
        if(empty($POST['value1']))
            $info[] = DK_LANG_NO_TEXT;
        elseif(!preg_match('~[А-я]+~', $POST['value1']))
            $info[] = DK_LANG_INVALID_LINK;
        else{
            
            //$POST['value1'] = ucfirst($POST['value1']);
          $res = mysqlQuery("INSERT INTO `". DK_DBPREFIX ."city`
                        SET 
                        `city` = '".mb_ucfirst($POST['value1'])."',
                        `url`  = '".ucfirst(translateWord($POST['value1']))."'");
         if($res)
         $info[] = 'Город добавлен!!';
         reDirect();               
        } 
        
        
    }

     include DK_ROOT .'/skins/tpl/admin/city_form.tpl'; 
?>