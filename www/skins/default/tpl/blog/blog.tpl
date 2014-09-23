
<form action=""  name="post" method="post">  
    <div id="content_wrap" >  
        <div id="sidebar">
            <div class="sidebar_item shadow"> 
                <h1>Облако тегов</h1>
                <div id="tags"> 
                <?php echo $html_list; ?>
                </div>  
            </div> 
 
            <div class="sidebar_item shadow"> 
                <h1>Реклама</h1>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>                
 
        <div id="content">  
<!--// rows -->
            <div class="blog_row">
                <div class="blog_info shadow_light">
                    <div class="blog_info_item">
                        <span class="icon icon_calendar"></span>
                        <span class="blog_date"><?php echo $date; ?></span>
                    </div>
                    <div class="blog_info_item">
                        <span class="icon icon_comments"></span>
                        <span class="blog_comments"><?php echo $cnt_comment; ?></span>
                    </div>
                    <div class="blog_info_item">
                <?php echo $indicator; ?>
                    </div>   
                </div>
                <h2 class="blog_title">
                    <?php echo $title; ?>
                    <a class="icon icon_go_right" href="<?php echo $url; ?>"></a>
                </h2>
                <div class="blog_text">
                <?php echo $text; ?> ...
                    <a class="icon icon_go_right" href="<?php echo $url; ?>"></a> 
                </div> 
                <div class="blog_tags shadow_light">
                <span>Теги:</span>
                <?php echo $tags; ?>
                </div>
             </div> 
<!--// rows end -->  
<!--// full -->
            <div class="blog_row">
                <div class="blog_info shadow_light">
                    <div class="blog_info_item">
                        <span class="icon icon_calendar"></span>
                        <span class="blog_date"><?php echo $date; ?></span>
                    </div>
                    <div class="blog_info_item">
                        <span class="icon icon_comments"></span>
                        <span class="blog_comments"><?php echo $cnt_comment; ?></span>
                    </div>
                    <div class="blog_info_item">
                        <?php echo $indicator; ?>
                    </div> 
                </div>
                <h2 class="blog_title">
                    <?php echo $title; ?>
                    <a class="icon icon_go_left" href="<?php echo $url; ?>"></a> 
                </h2>
                <div class="blog_text">
                    <?php echo $text; ?> 
                    <a class="icon icon_go_left" href="<?php echo $url; ?>"></a> 
                </div> 
                <div class="blog_tags shadow_light">
                <span>Теги:</span>
                    <?php echo $tags; ?>
                </div> 
            </div>
            <div id="comment_blog">
            <!-- Сюда будем выводить комментарии -->
            <?php echo $comments; ?>
    <!--// form -->  
            <br />
            <?php echo $bbcode; ?>            
                <textarea id="text" name="form[value1]" cols="80" rows="8"></textarea>
            <br /><br />
                <input class="but" name="add" type="submit" value="Отправить" />
    <!--// form end -->
    <!--// no_access -->
            <h3>Комментарии могут оставлять только зарегистрированные пользователи.</h3>
    <!--// no_access end -->
            </div> 
<!--// full end -->
            <div class="IRB_paginator_wrap">
            <?php echo $menu;  ?>
            </div> 
        </div>
    <div class="clear"></div>
    </div>    
</form>