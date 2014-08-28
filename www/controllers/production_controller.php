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

  
    $prod = new Production_Model('production');
 
    if($GET['mod'] === 'product')
    {
        $prod -> createCategory($GET['parent']);
        $prod -> createProduct($GET['id']);
        $back_link  = '<a href="'. href('mod=cat', 'parent='. $GET['parent']) .'">'. DK_LANG_BACK .'</a>';
        $cat_name   = $prod -> cat_name;        
        $production = $prod -> createRows('production/product', 'product');
    }
    elseif($GET['mod'] === 'cat')
    {
        $prod -> createCategory($GET['parent']);
        $prod -> createListProduct($GET['parent'], DK_CONFIG_NUM_WORDS);
        $back_link  = '<a href="'. href('mod=all') .'">'. DK_LANG_BACK .'</a>';
        $cat_name   = $prod -> cat_name;        
        $production = $prod -> createRows('production/rows', 'product', true);
    }
    else
    {
        $prod -> createCategory();
        $cat_name = $back_link = '';        
        $production = $prod -> createRows('production/rows', 'cat');    
    }
    
    include DK_ROOT .'/skins/tpl/production/show.tpl';

