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

// Блок подтверждения
    if($ok && !empty($POST['value1']))
    {
        if($userdata = look::autologin($POST['value1'], true))
        {
            $_SESSION['userdata'] = $userdata;

            mysqlQuery("UPDATE `". DK_DBPREFIX ."users`
                        SET  `confirm` = 1
                        WHERE `id_user` = '". $userdata['id'] ."'
                       ") ;
// Удаляем устаревшие записи
           $res = mysqlQuery("DELETE FROM `". DK_DBPREFIX ."users`
                               WHERE `confirm` != 1
                               AND `reg_time` < NOW() - INTERVAL 10 DAY
                              ");

            redirect('mod=office');
        }
        else
            $info[] = DK_LANG_INVALID_CODE;
    }
// Блок отправки письма
    if(isset($_SESSION['activate']))
    {
        unset($_SESSION['activate']);
        $res = mysqlQuery("SELECT `email`, `hash`
                           FROM `". DK_DBPREFIX ."users`
                           WHERE `id_user` = ".(int)$GET['id']
                         );

        if(mysqli_num_rows($res) > 0)
        {
            $row = mysqli_fetch_assoc($res);
            $subject = DK_LANG_ACTIVATION;
            $message = DK_LANG_ACTIVATION_FOR
                     . "<a href=\"". href('mod=restoration', 'parent=code', 'id='. $row['hash']) ."\" >"
                     . DK_LANG_REST_LINK ."</a><br />"
                     . DK_LANG_REST_ACTIVATE_END . $row['hash'] ."</b><br>\n";

            $mail = new IRB_Mailer($message);

            $mail -> createTo($row['email']);
            $mail -> createSubject($subject);
            $mail -> createFrom(DK_SUPPORT_EMAIL, DK_SUPPORT_EMAIL);
            $mail -> setHtml();
            $error = $mail -> sendMail();

            if(!empty($error))
                $info[] = DK_SISTEM_ERROR;
        }
    }

    $label = DK_LANG_MAIL_INFO;

    $value1 = htmlChars($POST['value1']);

  //  include DK_ROOT . TEMPLATE .'/skins/tpl/registration/form_activate.tpl';







