<html>
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

	<link type="text/css" rel="stylesheet" href="<?php echo TEMPLATE; ?>css/admin/style_adm.css" media="all" />
<!-- 	<link type="text/css" rel="stylesheet" href="<?php echo TEMPLATE; ?>css/menu.css" media="all" /> -->
	<link type="text/css" rel="stylesheet" href="<?php echo TEMPLATE; ?>css/mediaqueries.css" media="all" />
	<link rel="stylesheet" href="<?php echo TEMPLATE; ?>css/font-awesome/css/font-awesome.css" >

	 <script type="text/javascript" src="<?php echo TEMPLATE; ?>js/jquery-1.11.0.min.js"></script>
	 <script type="text/javascript" src="<?php echo TEMPLATE; ?>js/jquery.cookie.min.js"></script>

	  <script type="text/javascript" src="<?php echo TEMPLATE; ?>js/admin/jquery.tablesorter.js"></script>
	<!-- адаптивное меню -->
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- Load WysiBB JS and Theme -->
	<!-- <script src="http://cdn.wysibb.com/js/jquery.wysibb.min.js"></script>
	<link rel="stylesheet" href="http://cdn.wysibb.com/css/default/wbbtheme.css" /> -->
	<!-- <script src="<?php echo TEMPLATE; ?>wysibb/jquery.wysibb.min.js"></script>
	<link rel="stylesheet" href="<?php echo TEMPLATE; ?>wysibb/theme/default/wbbtheme.css" />
	<script src="<?php echo TEMPLATE; ?>wysibb/lang/ru.js"></script>
	
	<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/tooltip.js"></script>
	
	  <script type="text/javascript" src="<?php echo TEMPLATE; ?>mess/main/javascript/jquery.toastmessage.js"></script>
	  <link rel="stylesheet" href="<?php echo TEMPLATE; ?>mess/main/resources/css/jquery.toastmessage.css">-->
	
	<script type="text/javascript" src="<?php echo TEMPLATE; ?>js/admin/script_adm.js"></script> 

	<title>Админ-панель</title>

</head>
<body class="login">
	



<?php if(isset($_SESSION['admin'])): ?>
	<!-- content start -->
	<?php  include DK_ROOT . TEMPLATE . '/tpl/admin/content.tpl'; ?>
	 
	  <!-- content end -->
<?php else: ?>

         
 <?php  include DK_ROOT . TEMPLATE . '/tpl/admin/login.tpl'; ?> 
	
  
    <?php endif; ?>
  
</body>
</html>