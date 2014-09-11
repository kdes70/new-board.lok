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

/////////////////////////////////////////////////////////
// Ставим на страничку кабинета замок
    look::check();
	
	$users = new Users_Model('users', $GET['num'], $GET['parent']);
	
    // класс личных сообщений
	$message = new Messages_Model('users_messages', 'users_dialog', $_SESSION['userdata']['id'], $GET['parent'], $GET['num']);
//Список пользователей	 
	if($GET['mod'] === 'all')
	{	
        $title = 'Все пользователи';
        
		$users->id_parent = 0;
        $users->comments = '';
		$users->usersAll(DK_CONFIG_NUM_ROWS);
      //  $count_user = $users->count_user; //$count = $users->count_user;
        $rows = $users->createUsersRows('users/table_rows', 'profile');
      //  $page_menu = $users->menu;
        include DK_ROOT . '/skins/tpl/users/table_show.tpl'; 
		
	}
// Страница пользователя
	elseif($GET['mod'] === 'profile')
	 { 	 
         $title = 'Моя страница';
			//Если пользователь залогинен разрешаем отправку ЛС
			 if(look::check(false))
			 {	 	  
	             // Если нажата кнопка и комментарий успешно добавлен в базу
	            if($ok && $message -> checkDialog($POST['value1']))	                                         
	            { // Сбрасываем POST параметры
	                reDirect();
	            }
				 elseif($ok)// Иначе выводим оповещение об ошибке
	                $info[] = DK_LANG_ERROR_USERDATA .'<br>'; 		
			 }
             
		$users->id_parent = 0;
		$users->comments = '';
		
		// Выбираем данные пользователя 	
        $users->userFull();
		$rows = $users->createUsersRows('users/profils', 'profile');
		// обший шаблон
		include DK_ROOT.'/skins/tpl/users/show.tpl';
		
	}
//мои сообщения(Входяшие)
	elseif($GET['mod'] === 'newmess')
	{	
    
        $title = 'Мой сообщения';    
    
	 	$message->myDialogs();		
		$rows = $message->createMessRows('users/dialog', 'messages');
		include DK_ROOT.'/skins/tpl/users/show.tpl';
	} 
//Исходящие сообщения
    elseif($GET['mod'] === 'sent_mess')
	{    
        $title = 'Входяшие';  
        
		$message->sentDialog();
		$rows = $message->createMessRows('users/dialog', 'messages');
	    include DK_ROOT.'/skins/tpl/users/show.tpl';	
	}	
//Диалог     
	elseif($GET['mod'] === 'messages')
	{
		//$message = new Messages_Model('users_messages', 'users_dialog', $_SESSION['userdata']['id'], $GET['parent'], $GET['num']);
			 if(look::check(false))
        { 
           $message->setMessages(DK_CONFIG_NUM_ROWS);
		   $rows = $message->createMessRows('users/dialog_rows', 'newmess');
		   
             // Если нажата кнопка и комментарий успешно добавлен в базу
            if($ok && $message -> checkDialog($_SESSION['userdata']['login'], $POST['value1']))
                                         
            { // Сбрасываем POST параметры
                reDirect();
            }
			 elseif($ok)// Иначе выводим оповещение об ошибке
                $info[] = DK_LANG_ERROR_USERDATA .'<br>'; 
        }
		$page_menu = $message->menu;
		$users->id_parent = 0;
		$to = $message->user_to;
		$to_login = $users->getUser($to);
        
		
	include DK_ROOT.'/skins/tpl/users/dialog_show.tpl';	
	}
//Мои объявления   
    elseif($GET['mod'] === 'my_adv')
    {
        $title = 'Мои объявления';
       
        
    //    $board =  new Board_Model('advert', $GET['num'], $GET['city'], $city_id);
      //  $board->myUserDesk($_SESSION['userdata']['id_user']);
     //   $rows = $board->createRows('profile/myboard_row', 'full'); 
         
      include DK_ROOT.'/skins/tpl/profile/myboard_show.tpl';  
    }
	
        
	
	
	
	
	
	