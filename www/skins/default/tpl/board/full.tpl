   <div id="full_post">

                            <h3><?php echo $tpl_title; ?></h3>

                            <p id="full_text"><?php echo $tpl_text; ?></p>

            <p></p>

             <p><i class="fa fa-phone"></i> Контакты:</p>


            <?php if($tpl_img): // если есть картинки галереи ?>
            <div class="item_gallery">
               <div class="item_img">
                   <img src="" />
               </div> <!-- .item_img -->
               <div class="item_thumbs">
               <?php foreach($tpl_img as $item): ?>
                   <a href="<?php echo DK_HOST ?>photo/advert/<?php echo $item; ?>"><img src="<?php echo DK_HOST ?>photo/advert/crop/<?php echo $item; ?>" /></a>
               <?php endforeach; ?>
               </div> <!-- .item_thumbs -->
            </div> <!-- .item_gallery -->
            <?php endif; ?>

            <div class="clear"></div>

                           
                        </div>