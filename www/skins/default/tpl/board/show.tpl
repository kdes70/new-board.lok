   <?php if(isset($vip_rows)): ?>
 <section id="container">
            <div id="vip_block">
                <div id="vip_header">
                    <h3><i class="icon-thumbs-up"></i> Премиум объявления</h3>
                </div>
                <div class="vip-grid">
<strong style="color:red"><?php echo getInfo($info); ?></strong>
<p><?php echo $adv_count_vip; ?></p>
                    <?php echo $vip_rows; ?>





                    <div class="clear"></div>
                    <center class="paginator"> <?php // echo $page_menu_vip; ?></center>
                </div>
            </div>
            <div class="clear"></div>
            <div id="free_block">
                <div id="free_header">
                    <h3><i class="icon-bell"></i> Бесплатные объявления</h3>
                </div>
                <p><?php echo $adv_count_free; ?></p>
                <?php echo $free_rows; ?>
             <div class="clear"></div>
                    <center class="paginator"> <?php echo $page_menu_free; ?></center>
            </div>

        </section>
  <?php endif; ?>
<!-- Полное объявление -->
<?php if(isset($rows)): ?>
<?php echo $rows; ?>
<?php endif; ?>
