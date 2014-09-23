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
    //look::check();
	
	$users = new Users_Model($GET['parent']);
	
    // класс личных сообщений
	//$message = new Messages_Model('users_messages', 'users_dialog', $_SESSION['userdata']['id'], $GET['parent'], $GET['num']);
//Список пользователей	 


switch ($GET['mod']) {
	case 'office':
		 
	//	$users->createFull((int)$GET['parent']);
		//$rows = $users->createUsersRows('profile/row', 'wwww');
		$edit = $users->createEdit((int)$GET['parent']);
		extract($edit);// $login, $phone...
	//	$login = $edit['login'];
		print_r($edit);
		include DK_ROOT . TEMPLATE .'tpl/profile/office.tpl';

		break;
	case 'my_adv':
			
			if(isset($_SESSION['userdata']['id_user']))
			{	

				$users->getMyBoard($_SESSION['userdata']['id_user']);
				$rows = $users->createUsersRows('profile/rows', 'edit');
				
				include TEMPLATE .'profile/show.tpl';
			}
			else reDirect('page=board');
			

		break;
			
	default:
		# code...
		break;
}




























	
	
	
	
	
	