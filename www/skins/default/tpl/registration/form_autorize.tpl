<script type="text/javascript">
window.onload = function()
{
	document.getElementById('autorize').onsubmit = function()
	{
		if (document.getElementById('loginAut').value == '')
		{
			alert('Укажите Логин');
			document.getElementById('loginAut').focus();
			return false;
		}
		if (document.getElementById('passAut').value == '')
		{
			alert('Укажите Ваш пароль');
			document.getElementById('passAut').focus();
			return false;
		}	
		return true;
	}
	document.getElementById('loginAut').focus();
}
</script>




<!-- ./skins/tpl/registration/form_autorize.tpl begin -->   
<div  style="text-align:center;" > 
<strong style="color:red"><?php echo getInfo($info); ?></strong>
<form id="autorize" action="" method="post">   
 Логин<br /> 
  <input id="loginAut" name="form[value1]" type="text" value="<?php echo $POST['value1']; ?>"><br>   
 Пароль<br /> 
  <input id="passAut" name="form[value2]" type="password">  
<br /> 
 Запомнить Вас?
<input name="form[value3]" type="checkbox" 
 value="1" <?php echo returnCheck(1, $POST['value3']); ?>><br />
 <a href="<?php echo href('mod=registration')?>"> Регистрация</a><br /><br />
<input name="ok" type="submit" value="Войти"><br /> 
<a href="<?php echo href('mod=restoration')?>">Забыли пароль?</a>
 <br />   
</form>  
</div>  
 <!-- ./skins/tpl/registration/form_autorize.tpl end -->