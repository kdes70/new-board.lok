<!-- ./skins/tpl/registration/form_registration.tpl begin -->
<section id="container">
 <div id="autorize" style="text-align:center;" >
<strong style="color:red"><?php echo getInfo($info); ?></strong>
<form action="" method="post">
Логин<br />
 <input name="form[value1]" type="text" value="<?php echo $POST['value1']; ?>"><br>
Пароль<br />
 <input name="form[value2]" type="password"><br />
Повторите пароль<br />
 <input name="form[value3]" type="password"><br />
E-mail (для восстановленя пароля)<br />
 <input name="form[value4]" type="text" value="<?php echo $POST['value4']; ?>"><br />
 <br />
<input name="ok" type="submit" value="Зарегистрироваться"><br />
<br />
</form>
</div>
</section>
<!-- ./skins/tpl/registration/form_registration.tpl end -->
