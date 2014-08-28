<?php


    $meta = array(
      
       'main'       => array('title'       => 'Главная',
                             'keywords'    => 'столяр, плотник',
                             'description' => 'Самая крутая столярная фирма'
                            ),
       'news'       => array('title'       => 'Новости',
                             'keywords'    => 'новость, известия',
                             'description' => 'Самые свежие новости в мире деревяшек'
                            ),
       'board'    => array('title'       => 'Объявления',
                             'keywords'    => 'статьи, полезные советы',
                             'description' => 'Лучшие специалисты делятся секретами'
                            ),
       'production' => array('title'       => 'Продукция',
                             'keywords'    => 'столы, стулья',
                             'description' => 'Отличнейшие столярные изделия почти даром'
                            ),
       'guest'      => array('title'       => 'Отзывы',
                             'keywords'    => 'гостевая книга, отзывы',
                             'description' => 'Про нас пишут только хорошее'
                             ), 
        'contacts'   => array('title'       => 'Контакты',
                             'keywords'    => 'адрес, карта',
                             'description' => 'Чтоб не заплутать'
                        ),                                        
           ); 
               
    if(file_put_contents('./setup/meta.txt', serialize($meta)))
        echo 'Ищем файл в папке setup';