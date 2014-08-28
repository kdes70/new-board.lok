<?php

/**
* Кнтроллер
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
       exit(file_get_contents('../../404.html'));
    }
//////////////////////////////


    if($_SERVER['REQUEST_METHOD'] == "POST")

        {
            if(empty($POST['value1'])  OR empty($POST['value2']))
            {
                // если пусты поля логин/пароль
            //  echo IRB_LANG_ERROR_LOGIN_PASS;
                echo 'Поля логин/пароль должны быть заполнены!';
                    exit();
            }else{

                $res = mysqlQuery("SELECT `id_user`,  `id_role`, `login`, `email`, `phone`,
                                             `ban`
                                 FROM `". DK_DBPREFIX ."users`
                                 WHERE (login = '".escapeString($POST['value1'])."' OR email = '".escapeString($POST['value1'])."')
                                 AND   `password` = '". criptPass($POST['value2']) ."'
                                ");

                if(mysqli_num_rows($res) > 0)
                {
                    $_SESSION['userdata'] = htmlChars(mysqli_fetch_assoc($res));
                //    $_SESSION['userdata']['role'] = look::check_Role( $_SESSION['userdata']['id_role']);
                //    $_SESSION['userdata']['priv'] = look::check_Priv($_SESSION['userdata']['id_role']);
                  //  $_SESSION['userdata']['password'] = criptPass($POST['value2']) ;
                    //$_SESSION['userdata']['error'] = "yes_auth";

                    // Если стоит галочка, значит элемент value3 не пустой.
                    // Вторым аргументом передаем true - устанавливаем куку.
                    $auto = !empty($POST['value3']);
                //!empty($_POST['rememberme']) == 'yes' ? $auto = 'yes': "";

                     setcookie('guest', $hash, time() - 2592000, '/');
                     unset($_SESSION['guest']);


                    look::setlogin($_SESSION['userdata']['id_user'], $auto);
                     echo "Добро пожаловать!";
                    exit();

                }
                else {echo  DK_LANG_ERROR_USERDATA;
                    exit();
                }

            }
        }
        else{
            reDirect('page=board');
        }
