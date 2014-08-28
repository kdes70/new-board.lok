<?php

/**
* Библиотека функций для системы регистрации
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
       exit(file_get_contents('../../404.html'));
    }
//////////////////////////////

/**
* Функция хэширования пароля.
* @param $pass string
* @return string
*/

    function criptPass($pass)
    {
        return md5(md5($pass) . DK_CONFIG_SALT);
    }

/**
* Функция установки автологина
* @param integr
* return void
*/
    function setLogin($id, $auto = true)
    {
        $hash = md5(randStr() . $id);

        if(($ip = @$_SERVER['HTTP_X_FORWARDED_FOR']) === null)
            $ip =  $_SERVER['REMOTE_ADDR'];

        if($auto)
            setcookie('hash', $hash, time() + 2592000, '/');

        mysqlQuery("UPDATE `". DK_DBPREFIX ."users`
                    SET  `hash`      = '". $hash ."',
                     `last_ip`   = `ip`,
                     `ip`        = '". $ip ."',
                     `last_time` = `date`,
                     `reg_time`      = NOW(),
                    WHERE `id_user`  = ". (int)$id
                   );

    }

/**
* Проверка корректности электронного адреса
* @param string  $email
* @access private
* @return string or boolean
*/
   function checkEmail($email)
   {
       if (function_exists('filter_var'))
           return filter_var($email, FILTER_VALIDATE_EMAIL);
       else
           return preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+\.)+[a-z]{2,6}$/i", $email);
   }

















