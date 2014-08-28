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
// Ставим на страничку кабинета замок
    look::check();

    $email = htmlChars($_SESSION['userdata']['email']);
// Блок редактирования учетных данных
    if($edit)
    {
        if(empty($POST['value1']))
            $info[] = DK_LANG_EMPTY_PASSWORD;
        elseif(mb_strlen($POST['value1'], 'utf-8') < 6)
            $info[] = DK_LANG_SHORT_PASSWORD;
        elseif($POST['value1'] !== $POST['value2'])
            $info[] = DK_LANG_INVALID_PASSWORD;

        if(empty($POST['value3']))
            $info[] = DK_LANG_EMPTY_EMAIL;
        elseif(!checkEmail($POST['value3']))
            $info[] = DK_LANG_INVALID_EMAIL;

        if(empty($info))
        {
            mysqlQuery("UPDATE `". DK_DBPREFIX ."users`
                        SET
                          `password` ='". criptPass($POST['value1']) ."',
                          `email`    ='". escapeString($POST['value3']) ."'
                        WHERE   `id_user` = ". (int)$_SESSION['userdata']['id_user']
                        );

            if(mysqli_affected_rows(DB::$link) > 0)
            {
                $email  = htmlChars($POST['value3']);
                $info[] = DK_LANG_CHANGE_ACCAUNT;
            }
        }
    }
// Блок редактирования анкетных данных пользователя
    if($ok)
    {
    // Загрузка аватара
        if($_FILES['file']['error'] === 0)
        {
            $upload = new IRB_Upload_Img($lang_file_error);
            $upload->width  = 100;
            $upload->height = 100;

            if($error = $upload -> uploadFile('file', 'photo/avatars/'))
                $info[] = $error;
            else
                $avatar = "\n, `avatar` = '". $upload -> name ."'";
        }

        if(empty($info))
        {
        // День рождения
            $birthday = $POST['value7'] .'-'. $POST['value6'] .'-'. $POST['value5'];
        // Все остальное
            mysqlQuery("INSERT INTO `". DK_DBPREFIX ."users_setting`
                        SET
                           `id_parent` = ". (int)$_SESSION['userdata']['id'] .",
                           `name`      ='". escapeString($POST['value4']) ."',
                           `birthday`  ='". escapeString($birthday) ."',
                           `icq`       = ". (int)$POST['value8'] .",
                           `skype`     ='". escapeString($POST['value9']) ."',
                           `motto`     ='". escapeString($POST['value10']) ."'
                           ". $avatar ."
                        ON DUPLICATE KEY UPDATE
                           `name`      ='". escapeString($POST['value4']) ."',
                           `birthday`  ='". escapeString($birthday) ."',
                           `icq`       = ". (int)$POST['value8'] .",
                           `skype`     ='". escapeString($POST['value9']) ."',
                           `motto`     ='". escapeString($POST['value10']) ."'
                           ". $avatar
                        );

            reDirect();
        }
    }

// Блок чтения информации
    $res = mysqlQuery("SELECT  `avatar`, `name`,
                                DAY(`birthday`) AS `day`,
                                MONTH(`birthday`) AS `month`,
                                YEAR(`birthday`) AS `year`,
                               `icq`,`skype`,`motto`
                        FROM `". DK_DBPREFIX ."users_setting`
                        WHERE
                        `id_parent` = ". (int)$_SESSION['userdata']['id']
                        );

    if(mysqli_num_rows($res) > 0)
        $data = htmlChars(mysqli_fetch_assoc($res));
    else
        $data = array('name'  => '',
                      'day'   => '01',
                      'month' => '01',
                      'year'  => '1980',
                      'icq'   => '',
                      'skype' => '',
                      'motto' => ''
                      );

    $avatar = !empty($data['avatar']) ? '<img src="'. DK_HOST .'photo/avatars/'
                                      . $data['avatar'] .'" width="100" height="100" border="0" /><br />' : '';

    include DK_ROOT .'/skins/tpl/registration/form_office.tpl';



