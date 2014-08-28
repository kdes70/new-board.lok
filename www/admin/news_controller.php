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


  

    $news = new Admin_Line_Model('news', $GET['num'], false);

if($GET['mod'] === 'add')
    {
// Блок добавления
        if($ok)
        {
            $img = '';
 // Если есть файл, пытемся загрузить картинку        
            if($_FILES['file']['error'] === 0)
            {
                $upload = new IRB_Upload_Img($lang_file_error);
                
                if($error = $upload -> uploadFile('file'))
                   $info[] = $error;
             
                $img = '[img]'. $upload -> new_name .'[/img]';        
            }        
         
            if(empty($info))
                $info[] = $news -> addLine($POST['value1'], $POST['value2'] . $img);
            
            if(empty($info[0]))
                reDirect('mod=edit', 'parent='. $news->id);
        }    
     
        $rows = $text = $title = '';
        include DK_ROOT .'/skins/tpl/admin/news/form.tpl';
    }    
    elseif($GET['mod'] === 'edit')
    {
// Блок редактирования
        if($edit)
        {
            $img = '';
// Если есть файл, пытемся загрузить картинку         
            if($_FILES['file']['error'] === 0)
            {
                $upload = new IRB_Upload_Img($lang_file_error);
                
                if($error = $upload -> uploadFile('file'))
                   $info[] = $error;
             
                $img = '[img]'. $upload -> new_name .'[/img]';        
            }
            // Если все прошло гладко, изменяем новость
            if(empty($info))
            {        
                $news->id = $GET['parent'];
                $info[] = $news -> editLine($POST['value1'], $POST['value2'] . $img);
            }
            // Опять гладко - сбрасываем POST параметры
            if(empty($info[0]))
                reDirect();
        }
        // Блок публикации
        if($ok)
        { 
            $news->id = $GET['parent'];
            $info[] = $news -> publicLine();
            
            if(empty($info[0]))
                reDirect('mod=all');
        }
        // Блок удаления     
        if($delete)
        { 
            $news->id = $GET['parent'];
            $info[] = $news -> deleteLine();
            
            if(empty($info[0]))
                reDirect('mod=all');
        } 

        // Блок отображения
        $news -> createFull($GET['parent']);
        $rows  = $news -> createRows('news/rows', 'all', DK_LANG_BACK);
        $edit  = $news -> createEdit($GET['parent']);
        $text  = $edit['text'];
        $title = $edit['title'];
        include DK_ROOT .'/skins/tpl/admin/news/form.tpl';    
    }
    else
    {  
// Блок отображения ленты новостей
		$board_cat_view = '';//довести до ума!!
        $news->clear = true;
        $news -> createPreview(DK_CONFIG_NUM_ROWS, DK_CONFIG_NUM_WORDS);       
        $rows_news = $news -> createRows('news/rows', 'edit', DK_LANG_EDIT); 
        $page_menu = $news->menu; 
        include DK_ROOT .'/skins/tpl/news/show.tpl';        
    }
    
  