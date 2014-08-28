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



    $stc = new Static_Model('main');

    if($GET['mod'] === 'edit')
    {
        if($edit)
        {
            $img = '';
         
            if($_FILES['file']['error'] === 0)
            {
                $upload = new IRB_Upload_Img($lang_file_error);
                
                if($error = $upload -> uploadFile('file'))
                   $info[] = $error;
             
                $img = '[img=left]'. $upload -> new_name .'[/img]';        
            }
            
            if(empty($info))
            {
                $stc -> saveContent($POST['value1'] . $img);            
                reDirect('page=main');
            }
        }
     
        $main_content = $stc -> editContent();
        include DK_ROOT .'/skins/tpl/admin/main/form.tpl';    
    }
    else
    {
        $news = new Line_Model('news');
     
        $news -> createPreview(DK_CONFIG_MAIN_ROWS, DK_CONFIG_NUM_WORDS, false);       
        $news_rows = $news -> createRows('news/news_rows', 'full', DK_LANG_FULL); 
        
     
        $main_content = $stc -> createContent();
      
        include DK_ROOT .'/skins/tpl/main/show.tpl';    
    }    
   
