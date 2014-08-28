 <script type="text/javascript">
        var bbdata = <?php echo $tpl_text; ?>
          $("#editor").bbcode(); //get BBcode editor content
$("#editor").bbcode(bbdata); //set BBcode editor content

$("#editor").htmlcode(); //get HTML editor content
$("#editor").htmlcode(htmlcode); //set HTML editor content
        </script>

<section id="container">
            <div id="vip_block">
                <div id="vip_header">
                    <h3><i class="icon-thumbs-up"></i> Премиум объявления</h3>
                </div>
                <div>
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
<?php // if($goods['img_slide']): // если есть картинки галереи ?>
<div class="item_gallery">
   <div class="item_img">
       <img src="" />
   </div> <!-- .item_img -->
   <div class="item_thumbs">
   <?php // foreach($goods['img_slide'] as $item): ?>
       <a href="images/no_avatar.jpg"><img src="images/no_avatar.jpg" /></a>
        <a href="images/no_avatar.jpg"><img src="images/no_avatar.jpg" /></a>
         <a href="images/no_avatar.jpg"><img src="images/no_avatar.jpg" /></a>
          <a href="images/no_avatar.jpg"><img src="images/no_avatar.jpg" /></a>
           <a href="images/no_avatar.jpg"><img src="images/no_avatar.jpg" /></a>
   <?php // endforeach; ?>
   </div> <!-- .item_thumbs -->
</div> <!-- .item_gallery -->
<?php // endif; ?>



                <p><i class="fa fa-phone"></i> Контакты:</p>
            </div>


                    <div class="clear"></div>
                </div>

            </div>
            <div class="clear"></div>

        </section>
