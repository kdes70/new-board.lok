<?php


/**
* Language file (Russian)
* Языковой файл (русский)
* @author IT studio IRBIS-team
* @copyright © 2009 IRBIS-team
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

    define('DK_LANG_FATAL_ERROR',   'Сбой системы');

    define('DK_LANG_FULL',   'Читать дальше');
    define('DK_LANG_BACK',   '<br><br>Вернуться');
    define('DK_LANG_EDIT',   '<br><br>Редактировать');

    define('DK_LANG_NO_NAME',          'Нет имени');
    define('DK_LANG_NO_HEADER',        'Нет заголовка');
    define('DK_LANG_TITLE_MORE',       'Заголовок длиннее 50 знаков');
    define('DK_LANG_NO_TEXT',          'Нет текста');
    define('DK_LANG_NO_TYPE',          'Выбирите тип');
    define('DK_LANG_NO_CITY',          'Город не выбран');
    define('DK_LANG_NO_CAT',           'Категория не выброна');
    define('DK_LANG_NO_PRICE',         'Нет цены');
    define('DK_LANG_INVALID_LINK',     'Только кириллица');
    define('DK_LANG_NO_TITLE',         'Новый модуль');
    define('DK_LANG_NO_KEYWORDS',      'Ключевые слова не прописаны');
    define('DK_LANG_NO_DESCRIPTION',   'Описания страницы нет');
    define('DK_LANG_META_ADMIN',       'Панель администрирования');
    define('DK_LANG_NO_SELECT',        'Не выбрано');


    $lang_file_error = array(
                            UPLOAD_ERR_INI_SIZE   => 'Размер файла больше разрешенного',
                            UPLOAD_ERR_FORM_SIZE  => 'Размер файла превышает указанное значение в MAX_FILE_SIZE',
                            UPLOAD_ERR_PARTIAL    => 'Файл был загружен только частично',
                            UPLOAD_ERR_NO_FILE    => 'Не был выбран файл для загрузки',
                            UPLOAD_ERR_NO_TMP_DIR => 'Не найдена папка для временных файлов',
                            UPLOAD_ERR_CANT_WRITE => 'Ошибка записи файла на диск',
                           'UPLOAD_ERR_EXTENTION' => 'Файл имеет недопустимое расширение',
                           'UPLOAD_ERR_WIDTH'     => 'Ширина изображения имеет недопустимый размер',
                           'UPLOAD_ERR_HEIGHT'    => 'Высота изображения имеет недопустимый размер',
                           'UPLOAD_ERR_UPLOAD'    => 'Не удалось загрузить файл'
                        );

    define('DK_LANG_ERROR_USERDATA',     'Ошибка ввода данных');
    define('DK_LANG_EMPTY_LOGIN',        'Введите логин');
    define('DK_LANG_INVALID_LOGIN',      'Длина логина не должна быть меньше 3 или больше 15 символов');
    define('DK_LANG_NO_UNIQUE_LOGIN',    'Такой логин зарегистрирован в системе');
    define('DK_LANG_EMPTY_PASSWORD',     'Введите пароль');
    define('DK_LANG_SHORT_PASSWORD',     'Пароль ненадежен. Минимум 6 символов' );
    define('DK_LANG_INVALID_PASSWORD',   'Проли не совпадают' );
    define('DK_LANG_EMPTY_CODE',         'Введите код активации' );
    define('DK_LANG_INVALID_CODE',       'Код активации введен неверно' );
    define('DK_LANG_EMPTY_EMAIL',        'Введите E-mail' );
    define('DK_LANG_INVALID_EMAIL',      'E-mail некорректен' );
    define('DK_LANG_REST_RESTORATION',   'Восстановление пароля');
    define('DK_LANG_REST_RESTORAT_FOR',  'С Вашего электронного почтового адреса поступила заявка на '.
                                          'восстановление доступа на сайт <b>www.'
                                          . str_replace('www.', '', $_SERVER['HTTP_HOST']) ."</b><br>\n".
                                          'Для доступа в аккаунт пройдите по ');
    define('DK_LANG_REST_LINK',          'этой ссылке');
    define('DK_LANG_REST_ACTIVATE_END',  'или введите в поле активации этот код: <b>');
    define('DK_LANG_MAIL_INFO',          'На Ваш почтовый адрес отправлен код активации');
    define('DK_LANG_NO_EMAIL',           'Такой E-mail не числится в нашей базе данных');
    define('DK_LANG_CHANGE_ACCAUNT',     'Учетная запись успешно изменена.');
    define('DK_LANG_ACTIVATION',         'Активация аккаунта');
    define('DK_LANG_ACTIVATION_FOR',     'С Вашего электронного почтового адреса поступила заявка на '.
                                          'активацию аккаунта на сайте <b>www.'
                                          . str_replace('www.', '', $_SERVER['HTTP_HOST']) ."</b><br>\n".
                                          'Для активации пройдите по ');



    define('DK_LANG_NO_QUERY',         'Введите фразу для запроса');
    define('DK_LANG_SHORT_PHRASE',     'Вы ввели слишком короткую фразу');
    define('DK_LANG_NO_CHECK',         'Точных совпадений не найдено. Есть результаты, '
                                        . 'возможно подходящие под критерии поиска.');
    define('DK_LANG_NO_RESULT',        'Не найдено ни одного результата. '
                                        . 'Попробуйте переформулировать запрос, используя другие ключевые слова.');
    define('DK_LANG_BLURRED',          'Искомая фраза слишком "размыта". '
                                        . 'Переформулируйте запрос, используя другие ключевые слова.');

    define('DK_LANG_NO_SEARCH',        'Не найдено ни одного результата.');
    define('DK_LANG_NOT_BORD_CAT', 'В данной категории нет еще объявлений!');






