<!-- ./skins/tpl/registration/form_activate.tpl begin -->   
 <div id="autorize" style="text-align:center;" >
<strong style="color:red"><?php echo getInfo($info); ?></strong>
<form action="" method="post">  
<?php echo $label; ?><br />
  <input name="form[value1]" type="text" size="40" value="<?php echo $value1; ?>"><br> 
<?php if(!empty($loginfield)){ ?>
<br />На данный E-mail зарегистрировано несколько аккаунтов. Уточните логин<br />
<input name="form[value2]" size="40" type="text" value="<?php echo  htmlChars($POST['value2']) ?>" /><br>
<?php } ?>
<input name="ok" type="submit" value="Отправить"><br /> 
 <br />   
</form>  
</div>  
 <!-- ./skins/tpl/registration/form_activate.tpl end -->