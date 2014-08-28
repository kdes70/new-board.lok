<?php


/**
* Кнтроллер
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
* Регистрация нового пользователя
*/

    if($ok)
    {
        if(empty($POST['value1']))
            $info[] = DK_LANG_EMPTY_LOGIN;
        elseif(mb_strlen($POST['value1'], 'utf-8') < 3 || mb_strlen($POST['value1'], 'utf-8') > 15)
            $info[] = DK_LANG_INVALID_LOGIN;

        if(empty($POST['value2']))
            $info[] = DK_LANG_EMPTY_PASSWORD;
         elseif(mb_strlen($POST['value2'], 'utf-8') < 6)
            $info[] = DK_LANG_SHORT_PASSWORD;
        elseif($POST['value2'] !== $POST['value3'])
            $info[] = DK_LANG_INVALID_PASSWORD;

        if(empty($POST['value4']))
            $info[] = DK_LANG_EMPTY_EMAIL;
        elseif(!checkEmail($POST['value4']))
            $info[] = DK_LANG_INVALID_EMAIL;

        if(empty($info))
        {
            // Если есть кука то вводим доп. параметр для точности определения
            isset($_COOKIE['guest']) ? $cookie = "  AND   `hash`  = '".$_COOKIE['guest']."'": " AND `email` = '". escapeString($POST['value4']) ."'";

            $res = mysqlQuery("SELECT `id_user` FROM `". DK_DBPREFIX ."users`
                               WHERE `id_role` = 4" . $cookie);

            if(mysqli_num_rows($res) > 0)
            {
                $user = mysqli_fetch_assoc($res);

                $res_id = $user['id_user'];

                mysqlQuery("UPDATE `". DK_DBPREFIX ."users`
                                SET
                                `reg_time` = NOW(),
                                `login`             = '". escapeString($POST['value1']) ."',
                                `password`          = '". criptPass($POST['value2']) ."',
                                `email`             = '". escapeString($POST['value4']) ."',
                                `id_role`           = 3

                                WHERE `id_user`  = ". $res_id
                             );
                 if(mysqli_affected_rows(DB::$link) > 0)
                 {
                     look::setlogin($res_id);
                     // Удоляем гостя
                     setcookie('guest', $hash, time() - 2592000, '/');
                     unset($_SESSION['guest']);


                    // Если активация включена - отпрвляем на подтверждение. Если нет - сразу в кабинет
                        if(DK_REGISTRATION_ACTIVATE === 'on')
                        {// В сессии определим флаг, дабы уберечься от F5
                            $_SESSION['activate'] = true;
                         // Поехали на страницу активации
                            reDirect('mod=activate', 'parent=id', 'id='. $res_id);
                        }
                        else
                            redirect('mod=office');
                 }


            }else{
                if(empty($info))
                {
                    mysqlQuery("INSERT IGNORE INTO `". DK_DBPREFIX ."users`
                                SET
                                `reg_time` = NOW(),
                                `login`             = '". escapeString($POST['value1']) ."',
                                `password`          = '". criptPass($POST['value2']) ."',
                                `email`             = '". escapeString($POST['value4']) ."',
                                `id_role`           = 3 "
                                );

                    if(($id = mysqli_insert_id(DB::$link)) > 0)
                    {
                        look::setlogin($id);
                    // Если активация включена - отпрвляем на подтверждение. Если нет - сразу в кабинет
                        if(DK_REGISTRATION_ACTIVATE === 'on')
                        {// В сессии определим флаг, дабы уберечься от F5
                            $_SESSION['activate'] = true;
                         // Поехали на страницу активации
                            reDirect('mod=activate', 'parent=id', 'id='. $id);
                        }
                        else
                            redirect('mod=office');
                    }
                    else
                        $info[] = DK_LANG_NO_UNIQUE_LOGIN;
                }
            }
        }


    }

    include DK_ROOT . TEMPLATE .'tpl/registration/form_registration.tpl';







