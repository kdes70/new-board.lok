 <aside id="left_block"><!-- LEFT_BLOCK -->
    <div id="autch_block"> <!-- AUTCH-BLOCK -->

    <?php if(isset($_SESSION['userdata']['id_user']) && isset($_SESSION['userdata']['login']) !=''): ?>
         <!-- Если пользователь авторизован -->
         <div id="autch_in" class="left_mod_header">
            <h3><i class="fa fa-sign-in"></i><?php echo $_SESSION['userdata']['login'];?>&nbsp;&nbsp;<i class="fa fa-sort-asc"></i></h3>
        </div>
        <div id="user_office">
            <ul>
                <li><a href="<?php echo href('page=profile', 'mod=my_adv'); ?>">Мои обьявления</a></li>
                <li><a href="">Витрина</a></li>
                <li><a href="">Мои сообщения <span>+10</span></a></li>
                <li><a href="<?php echo href('page=profile', 'mod=office', 'parent='.$_SESSION['userdata']['id_user']); ?>">Настройки</a></li>
                <li><a href="<?php echo href('page=registration', 'mod=exit'); ?>">Выход</a></li>
            </ul>
        </div>

    <?php else: ?>
        <!--  Если не авторизован -->
        <div id="autch_in" class="left_mod_header">
            <h3><i class="fa fa-sign-in"></i>
            Вход &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <i align="right" class="fa fa-sort-asc"></i>
            </h3>
        </div>
        <div id="autch_form">
        <p id="message-auth"></p>
      <form  method="POST" id="auth_form" action="">
        <p>
            <i class="fa fa-user"></i>
            <input type="text" name="form[value1]" id="login" maxlength="15" placeholder="Login" AUTOFOCUS="autofocus">
        </p>
        <p><i class="fa fa-unlock-alt"></i>
        <input type="password" name="form[value2]" id="pass" maxlength="15" placeholder="Password">
        </p>
        <p><input type="checkbox" name="form[value3]" id="rememberme" >
            <label for="rememberme">Запомнить меня</label>
        </p>
        <p><a href="">Забыли парол?</a></p>
        <p id="button-auth"><input id="autch" name="autch" type="submit" value="Войти"></p>
        <a href="<?php echo href('page=registration', 'mod=registration'); ?>">Регистрация</a>

        </form>
         <p align="right" class="auth-loading"><img src="<?=TEMPLATE;?>images/ajax-loader.gif" alt=""></p>
        <div class="clear"></div>
        </div>
    <?php endif; ?>
    </div><!-- AUTCH-BLOCK END-->

        <div id="block-category"> <!-- BLOCK CATEGORY -->

                <div class="left_mod_header">
                    <h3><i class="fa fa-list"></i> Категории</h3>
                </div>
                <ul>
              <?php foreach ($category as $key => $value) : ?>
                    <?php if(count($value) > 1) : //Если это радительская категория?>
                        <li>
                        <a id="<?php echo $key; ?>"><?php echo $value[0]; ?><img src="<?=TEMPLATE;?>images/img-next.png" class="cat-arr" alt=""></a>
                        <?php if(isset($value['sub'])) : ?>
                            <ul class="category-section">
                                <li><a href="<?php echo href('page=board','mod=category', 'parent='.$key); ?>"><strong>Все модели</strong></a></li>

                                <?php foreach ($value['sub'] as $key => $sub):?>
                                    <li><a href=" <?php echo href('page=board','mod=category', 'parent='.$key); ?>"><?php echo $sub; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        </li>
                    <?php elseif (isset($value[0])) :?>
                        <li><a href="<?php echo href('page=board','mod=category', 'parent='.$key); ?>">
                            <?php if(!empty($value['icon'])) :?>
                                <img src="<?=TEMPLATE;?>images/<?php echo $value['icon']; ?>" class="cat-img" alt="">
                            <?php endif; ?>
                            <?php echo $value[0]; ?>
                        </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
                </ul>
            </div><!-- blok category end -->





            <div class="left_moduls">
                <div class="left_mod_header">
                    <h3><i class="icon-list"></i> Категории</h3>
                </div>
            </div>

        </aside> <!-- LEFT_BLOCK END -->
