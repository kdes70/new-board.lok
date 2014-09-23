<?php

/** 
* Контроллер
* @author IT studio IRBIS-team
* @copyright © 2012 IRBIS-team
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
//////////////////////////////////////////////////////// 
   

$view = new Blog_View('blog', 'blog/blog', $GET['num']);


    if($GET['mod'] === 'full')
        $view->actionFull($GET['parent']);
    else
        $view->actionАll();

    $view->run();





























/*    $blog = new Blog_Model('blog', $GET['num']);

    if($GET['mod'] === 'full')
    {    
         $comm = new Comment_Model('blog_comments', $GET['parent']);       
        // Добавлять комментарии могут только зарегистрированные пользователи
        if(look::check(false))
        { 
            // Если нажата какая-нибудь из кнопок "Ответить"
            if(!empty($POST['array1']))
            {  // Получаем ключи принятого массива
                $keys = array_keys($POST['array1']);
               // И передаем значение первого ключа в модель блога
                $blog->id_parent = $keys[0];
            }
            else // Если не нажата - нет родителя. Передаем 0.
                $blog->id_parent = 0;
             // Если нажата кнопка и комментарий успешно добавлен в базу
            if($ok && $comm -> addComment($POST['value1'],
                                          $POST['value2'],                                        
                                          $_SESSION['userdata']['id'],
                                          $_SESSION['userdata']['login']
                                          ))
            { // Сбрасываем POST параметры
                reDirect();
            }
            elseif($ok)// Иначе выводим оповещение об ошибке
                $info[] = DK_LANG_ERROR_USERDATA .'<br>'; 
         
        }
         // Получаем комментарии в переменную
        $comments = $comm -> createComment('blog/comment');
        // Добавляем новое свойство в объект класса Blog_Model
        $blog->comments = $comments;
        $blog->id_parent = '';
        $blog -> createFull($GET['parent']);
        $rows = $blog -> createRows('blog/full', 'all', DK_LANG_BACK);                 
      //  createDinamicMeta($blog->title, $blog->keywords, $blog->description);        
        $page_menu = '';
         
        
    }
    else
    {
        // И здесь инициализируем свойство. Что бы избежать нотисов.
		$blog->id_parent = 0;
        $blog->comments = '';
        $blog->clear = true;
        $blog -> createPreview(DK_CONFIG_NUM_ROWS, DK_CONFIG_NUM_WORDS);       
        $rows  = $blog -> createRows('blog/rows', 'full', DK_LANG_FULL);
        $page_menu = $blog->menu;
    }
    
    
    include DK_ROOT .'/skins/tpl/blog/show.tpl';
    */

    