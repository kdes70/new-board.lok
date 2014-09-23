 
<section id="container">
            <div id="vip_block">
            <strong style="color:red"><?php echo getInfo($info); ?></strong>
            
                
                <div>
 
         <!-- full post -->
    

         
                       <div id="vip_header">
                           <h3><i class="icon-thumbs-up"></i> Премиум объявления</h3>
                       </div>
                           <div id="author_block">

                               <?php echo $author_block; ?>
         <!--                       author block
                                -->                      
                                <div id="post_info">
                               <p>№-[<?php echo $id_adv; ?>]</p>
                                   <p class="smoll_font"><i class="fa fa-clock-o"></i> Добавлено: 
									<time class="timeago" title="<?php echo $add_time; ?>"><?php echo showDate(strtotime($add_time)); ?></time>
                                   </p>
                                   <p class="smoll_font"><i class="fa fa-eye"></i> Просмотров: 34</p>
                                   <p class="smoll_font"><i class="fa fa-comment-o"></i> Коментариев: 20</p>

         <?php if((isset($_SESSION['userdata']['id_user']) && (int)$_SESSION['userdata']['id_user'] === (int)$author) ||
         isset($_SESSION['guest']) && $_SESSION['guest'] === (int)$author): ?>
                                    <p id="submit_ls"><a href=""><i class="fa fa-envelope-o"></i> Редактировать</a></p>
                                  <?php endif; ?>
                                 
                               </div>


                           </div>
            
         <!-- Полное объявление -->
       
        
       <?php echo $rows; ?>
         <!-- full post -->


                    <div class="clear"></div>
                </div>

            </div>
            <div class="clear"></div>

        </section>
<script type="text/javascript">
        var bbdata = <?php echo $tpl_text; ?>
          $("#editor").bbcode(); //get BBcode editor content
$("#editor").bbcode(bbdata); //set BBcode editor content

$("#editor").htmlcode(); //get HTML editor content
$("#editor").htmlcode(htmlcode); //set HTML editor content
        </script>
