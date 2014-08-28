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

/*if($ok){

$board = new Board_Model('bord', $GET['num'], $GET['id_city']);


$info = $board-> UploadImgFiles('gallery_file', 3);


		// include DK_ROOT .'/skins/tpl/test/gall.tpl';
}
*/





