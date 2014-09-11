
 <section id="container">
    <?php if(isset($vip_rows)): ?>
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

 <?php endif; ?>

            <div class="clear"></div>
            
             <?php if(isset($free_rows)): ?>
            <div id="free_block">
                <div id="free_header">
                    <h3><i class="icon-bell"></i> Бесплатные объявления</h3>
                </div>
                <strong style="color:red"><?php echo getInfo($info1); ?></strong>
                <p><?php echo $adv_count_free; ?></p>
                <?php echo $free_rows; ?>
             <div class="clear"></div>
                    <center class="paginator"> <?php echo $page_menu_free; ?></center>
            </div>
        <?php endif; ?>



        </section>
 
