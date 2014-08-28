<?php

/**
* Класс проверки аутентификации
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
///////////////////////////////////////////////////////

class look
{


    public static function check_Priv($id)
    {
        $res = mysqlQuery("SELECT `". DK_DBPREFIX ."priv`.`name` AS `priv`
                            FROM `". DK_DBPREFIX ."priv`
                            LEFT JOIN `". DK_DBPREFIX ."role_priv`
                                ON `".DK_DBPREFIX."role_priv`.`id_priv` = `".DK_DBPREFIX."priv`.`id_priv`
                            WHERE `".DK_DBPREFIX."role_priv`.`id_role` =".$id);
        if(!$res)
        {
            return FALSE;
       }
       $arr = array();
       while ($row = mysqli_fetch_assoc($res)) {

           $arr[] = $row;
       }
       return $arr;
    }

    public static function check_Role($id_role)
    {
        $res = mysqlQuery("SELECT `name` FROM `". DK_DBPREFIX ."role`
                            WHERE `id_role` = ".$id_role);
        if(mysqli_num_rows($res) > 0)
        {
            $row = mysqli_affected_rows($res);
        }

        return $row['name'];

    }




/**
* метод проверки аутентификации
* @param bool $redirect
* @return mixed
*/
    public static function check($redirect = true)
    {
        if(!isset($_SESSION['userdata']) && $redirect)
            reDirect('page=registration', 'mod=registration');
    // Проверка на бан
        elseif($redirect && isset($_SESSION['userdata']) && self::checkban($_SESSION['userdata']['id']))
            reDirect('page=ban');
        else{
                  //  $_SESSION['userdata']['priv'] = check_Role($_SESSION['userdata']['id_role']);
            return isset($_SESSION['userdata']);
        }

    }

/**
* Метод установки данных пользователя
* @param $id integr
* @param $auto bool
* return string
*/
    public static function setlogin($id, $auto = true)
    {
        $hash = md5(randStr() . $id);

        if($auto)
            setcookie('hash', $hash, time() + 2592000, '/');

        if(($ip = @$_SERVER['REMOTE_ADDR']) === null)
            $ip = @$_SERVER['HTTP_X_FORWARDED_FOR'];

        mysqlQuery("UPDATE `". DK_DBPREFIX ."users`
                    SET  `hash`      = '". $hash ."',
                         `last_ip`   = `ip`,
                         `ip`        = '". sprintf("%u", ip2long($ip)) ."',
                         `last_time` = `reg_time`,
                         `reg_time`      = NOW()
                    WHERE `id_user`  = ". (int)$id
                 );

        return $hash;
    }

/**
* Поиск учетной записи по контрольному хэшу
* @param $hash string
* @param $check bool
* return mixed
*/
    public static function autologin($hash, $check = false)
    {
        if(DK_REGISTRATION_ACTIVATE === 'on' && !$check)
            $activate = "\n AND `confirm` = 1 ";
        else
            $activate = '';

        $res = mysqlQuery("SELECT `id_user`, `id_role`, `login`, `email`, `ban`
                            FROM `". DK_DBPREFIX ."users`
                            WHERE `hash` = '". escapeString($hash) ."'"
                            );

        if(mysqli_num_rows($res) > 0)
        {
            $userdata = mysqli_fetch_assoc($res);
            self::setlogin($userdata['id_user']);

            return $userdata;
        }
        else
            return false;
    }


/**
* Метод проверки блокировки аккаунта
* @param $id int
* return bool
*/
     public static function checkban($id)
     {
        $res = mysqlQuery("SELECT  `id_role`, `ban`
                            FROM `". DK_DBPREFIX ."users`
                            WHERE `id_user` = ".(int)$id
                            );

        $row = mysqli_fetch_assoc($res);
        return ($row['ban'] > date('Y-m-d'));

    }

    /****************************************************************
     *                                                              *
     *                    БЛОК РАБОТЫ С ГОСТЯМИ                     *
     *                    (Теневая регистрация)                     *
     ***************************************************************/

    /**
     *  Получаем ID гостя по хешу куки
     *
     */
        public static function getGuestHash($hash)
        {
          $id = mysqlQuery("SELECT `id_user`
                            FROM `". DK_DBPREFIX ."users`
                            WHERE `hash` = '". escapeString($hash) ."'  AND `id_role` = '4'
                            LIMIT 1");
         if(mysqli_num_rows($id) > 0)
        {
            $row = mysqli_fetch_assoc($id);
            $_SESSION['guest'] = $row['id_user'];
            // Если есть у гостя в базе hash записываем его IP и меняем hash
            Look::updataGuestHash($row['id_user']);

            return $row['id_user'];
        }
        return FALSE;
        }

/**
 * Метод обновления hash гостя и его IP
 *
 **/

        private static function updataGuestHash($id_user)
        {
            if($id_user)
            {
               $hash = md5(randStr() . $id_user);
               // Создаем куку Гостя
               setcookie('guest', $hash, time() + 2592000, '/');

              if(($ip = @$_SERVER['REMOTE_ADDR']) === null)
              $ip = @$_SERVER['HTTP_X_FORWARDED_FOR'];

               mysqlQuery("UPDATE `". DK_DBPREFIX ."users`
                           SET  `hash`      = '".$hash."',
                                `last_ip`   = `ip`,
                                `ip`        = '". sprintf("%u", ip2long($ip)) ."',
                                `last_time` = `reg_time`,
                                `reg_time`      = NOW()
                           WHERE `id_user`  = ". $id_user
                        );
            }
          //  return FALSE;
        }

/**
 *  Метод добавления нового гостя
 *
 **/

    public static function insertNewGuest($email)
    {
      mysqlQuery("INSERT IGNORE INTO `". DK_DBPREFIX ."users`
                  SET
                  `reg_time` = NOW(),
                  `login`             = 'Гость',
                  `password`          = '". md5(md5($email) . DK_CONFIG_SALT)."',
                  `email`             = '". $email ."'"
                  );
       if(($id_user = mysqli_insert_id(DB::$link)) > 0)
       {
            $_SESSION['guest'] = $id_user;
            Look::updataGuestHash($id_user);
            return $id_user;
       }
       return FALSE;
    }









}





























