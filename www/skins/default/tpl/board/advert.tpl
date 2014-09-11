 
<section id="container">
            <div id="vip_block">
            <strong style="color:red"><?php echo getInfo($info); ?></strong>
            
                
                <div>
 <?php if(!empty($rows)): ?>
         <!-- full post -->
         <!-- Полное объявление -->
         <?php echo $rows; ?>
     <?php else: ?>
     	<center><strong style="color:red">Нет такого</strong></center>
     	
        
       
         <!-- full post -->

  <?php endif; ?>
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
