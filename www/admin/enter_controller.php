<?php
/**
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
///////////////////////////////////////////////////////////////


    if($ok && isset($admins[$POST['value1']]) && $admins[$POST['value1']] === $POST['value2']) 
        $_SESSION['admin'] = true; 
  
    	//include DK_ROOT . TEMPLATE .'/tpl/admin/admin.tpl';  
    


     

  