   
              <div id="vip_header">
                  <h3><i class="icon-thumbs-up"></i> Премиум объявления</h3>
              </div>
                  <div id="author_block">
                      <img src="images/no_avatar.jpg" width="150px" height="150px" alt="">
                      <div id="author_info">
                          <p><a href=""><?php echo $tpl_id_user; ?> / <?php echo $_SESSION['guest_id']; ?></a></p>
                          <p class="smoll_font"><i class="fa fa-meh-o"></i> Был в сети: сегодня <b>23:45</b></p>
                          <p class="smoll_font"><i class="fa fa-clipboard"></i> Объявлений: 5</p>
                          <p class="smoll_font"><i class="fa fa-comments-o"></i> Коментарий: 20</p>
                          <p id="submit_ls"><a href=""><i class="fa fa-envelope-o"></i> Отправить ЛС</a></p>

                      </div>
                      <div id="post_info">
                      <p>№-[<?php echo $tpl_id_adv; ?>]</p>
                          <p class="smoll_font"><i class="fa fa-clock-o"></i> Добавлено: <?php echo $tpl_add_time; ?></p>
                          <p class="smoll_font"><i class="fa fa-eye"></i> Просмотров: 34</p>
                          <p class="smoll_font"><i class="fa fa-comment-o"></i> Коментариев: 20</p>

<?php if((isset($_SESSION['userdata']) && $_SESSION['userdata']['id_user'] == $tpl_id_user) ||
isset($_SESSION['guest']) && $_SESSION['guest'] == $tpl_id_user): ?>
                           <p id="submit_ls"><a href=""><i class="fa fa-envelope-o"></i> Редактировать</a></p>
                         <?php endif; ?>
                      </div>


                  </div>
   <div id="full_post">

                <h3><?php echo $tpl_title; ?></h3>

                <p id="full_text"><?php echo $tpl_text; ?></p>

<p></p>

 <?php foreach ($tpl_img as $key => $value):?>
       <img src="<?php echo DK_HOST ?>photo/advert/crop/<?php echo $value; ?>" />
   <?php endforeach; ?>





                <p><i class="fa fa-phone"></i> Контакты:</p>
            </div>