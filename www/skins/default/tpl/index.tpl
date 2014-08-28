<!Doctype html>
<!--[if IE 7 ]><html class="ie7"> <![endif]-->
<!--[if IE 8 ]><html class="ie8"> <![endif]-->
<!--[if IE 9 ]><html class="ie9"> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html lang="ru
"> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

    <link type="text/css" rel="stylesheet" href="<?php echo TEMPLATE; ?>css/style.css" media="all" />
    <link type="text/css" rel="stylesheet" href="<?php echo TEMPLATE; ?>css/menu.css" media="all" />
     <link type="text/css" rel="stylesheet" href="<?php echo TEMPLATE; ?>css/mediaqueries.css" media="all" />
    <link rel="stylesheet" href="<?php echo TEMPLATE; ?>css/font-awesome/css/font-awesome.css" >

     <script type="text/javascript" src="<?php echo TEMPLATE; ?>js/jquery-1.11.0.min.js"></script>
     <script type="text/javascript" src="<?php echo TEMPLATE; ?>js/jquery.cookie.min.js"></script>
 
 <script type="text/javascript" src="<?php echo TEMPLATE; ?>js/ajaxupload.min.js"></script>
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <!-- Load WysiBB JS and Theme -->
    <!-- <script src="http://cdn.wysibb.com/js/jquery.wysibb.min.js"></script>
    <link rel="stylesheet" href="http://cdn.wysibb.com/css/default/wbbtheme.css" /> -->
    <script src="<?php echo TEMPLATE; ?>wysibb/jquery.wysibb.min.js"></script>
    <link rel="stylesheet" href="<?php echo TEMPLATE; ?>wysibb/theme/default/wbbtheme.css" />
  <script src="<?php echo TEMPLATE; ?>wysibb/lang/ru.js"></script>

<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/tooltip.js"></script>

  <script type="text/javascript" src="<?php echo TEMPLATE; ?>mess/main/javascript/jquery.toastmessage.js"></script>
  <link rel="stylesheet" href="<?php echo TEMPLATE; ?>mess/main/resources/css/jquery.toastmessage.css">


    <script type="text/javascript" src="<?php echo TEMPLATE; ?>js/script.js"></script>

    <title>Шаблон доски</title>

</head>
<body>
    <div id="wrapper">
        <header id="header"> <!-- HEADER -->
        <div id="banner_1">BANNER
  <?php if(!isset($_SESSION['userdata']) && isset($_SESSION['guest_id'])): ?>
        На сайт зашел гость № <?php echo $_SESSION['guest_id']; ?>
  <?php endif; ?>
        </div>
        <a id="logo" href="<?php echo href('host'); ?>"></a>
            <p class="mobile-menu">
                <a id="touch-menu" href=""><i class="icon-reorder"></i>Menu</a>
                <a class="mobile-add" href="add" ><i class="icon-plus"></i>ADD</a>
            </p>

            <nav>
                <ul class="menu">
               <li><a name="modal" href="#block_city" id="click-city"><i class="fa fa-home"></i>  <?php echo translateWord($logo_city, TRUE); ?></a>

               </li>
               <li id="add_menu"><a href="<?php echo href('page=board', 'mod=add_advert'); ?>"><i class="fa fa-plus"></i> ADD</a>
                   <ul class="sub-menu">
                       <li><a href="#">Sub-Menu 1</a></li>
                       <li><a href="#">Sub-Menu 2</a></li>
                       <li><a href="#">Sub-Menu 3</a></li>
                   </ul>
               </li>
               <li><a  href="<?php echo href('page=board', 'mod=test'); ?>"><i class="icon-user"></i>ABOUT</a></li>
               <li><a  href="#"><i class="icon-camera"></i>PORTFOLIO</a>
                   <ul class="sub-menu">
                       <li><a href="#">Sub-Menu 1</a></li>
                       <li><a href="#">Level 3 Menu</a></li>
                   </ul>
              </li>
              <li><a  href="#"><i class="icon-bullhorn"></i>BLOG</a></li>
              <li><a  href="#"><i class="icon-envelope-alt"></i>&#9776 CONTACT</a></li>
              </ul>

              </nav>
              <!-- Модельное окно -->
               <div id="block_city">
                   <span class="close"><i class="fa fa-times-circle"></i> OK</span>
                   <center><h3>Томская область</h3></center>
                <ul class="city-menu">
                  <?php foreach ($citys_arr as $key => $value):?>
                     <li><a href="<?php echo href('city='.$value['city_name_en'].'') ?>"><?php echo $value['city_name_ru']; ?></a></li>
                  <?php endforeach; ?>
               </ul>

               </div>
               <!-- Модельное окно end -->

        </header><!-- HEADER END -->
<div class="clear"></div>
       <!-- LEFT BLOK -->

 <?php if(isset($_SESSION['msg'])): ?>
               <script type="text/javascript">
       $().toastmessage('showWarningToast', "<?php echo $_SESSION['msg'];?>");
               </script>
 <div class="error"><strong style="color:red"><?php echo $_SESSION['msg'];?></strong></div>
       <?php endif; ?>


       <!-- CONTENT -->
       <?php echo $content; ?>
       <?php // echo var_dump($GLOBALS); ?>
        <!-- CONTENT END -->

        <aside id="right_block">
            <div id="news-modul">
                <div id="news-modul_header"><h3><i class="icon-microphone"></i> Новости</h3></div>
            </div>
        </aside>
<?php unset($_SESSION['msg']); ?>
        <div class="clear"></div>

        <footer id="footer">copyright@-2014</footer>
    </div>
<script type="text/javascript">
setTimeout(function(){$('.error').fadeOut('fast')},4000); //10000 = 10 секунд
</script>

</body>
</html>
