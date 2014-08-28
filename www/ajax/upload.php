<?php 

/** 
* Устанавливаем ключ-константу 
*/    
    define('DK_KEY', true);

	include '../config.php';

    include DK_ROOT .'/libs/mysql.php';    
    include DK_ROOT .'/libs/default.php';



//print('$_POST:' . print_r($_POST, 1) . ' $_FILES:' . print_r($_FILES, 1));



$uploaddir = DK_ROOT.'/photo/advert/';
if(!is_dir($uploaddir)) mkdir($uploaddir) ; 
$file = $uploaddir . basename($_FILES['upload']['name']); 
if (move_uploaded_file($_FILES['upload']['tmp_name'], $file)) {echo 'yas__'.$_FILES['upload']['name'].'__'.$_POST['date'].'__'.$_POST['photo_1'];}
 else {echo 0;}
	

	/*$file = $_FILES['userfile']['name'];
	$path = DK_CONFIG_UPLOAD_PATH;
	$max_size = DK_CONFIG_MAX_SIZE_IMG;
	$ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $file)); // расширение картинки
    $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"); // массив допустимых расширений
    
    	if($_FILES['userfile']['size'] > $max_size)
        {
        	$res = array("answer" => "Максимальный размер файла ".$max_size." Мб!");
        	exit(json_encode($res));
        }
        if($_FILES['userfile']['error'])
        {
        	$res = array("answer" => "Ошибка загруски, возможно фаил слишком большой ".$max_size);
        	exit(json_encode($res));
        }
         else
         {
         	$res = array("answer" => "OK");
        	exit(json_encode($res));
         }
        	

*/












 ?>