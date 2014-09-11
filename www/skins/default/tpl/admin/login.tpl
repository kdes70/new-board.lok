<div class="login_block">
	<p class="message">Авторезируйтесь!</p>
	<div>
		<form  action="" methot="post" >
			<p>
				<label for="login">Login <br>
				<input class="input" type="text" name="form[value1]" id="login" maxlength="30" >
				</label>
			</p>
			<p>
				<label for="pass">Password <br>
				<input class="input" type="password" name="form[value2]" id="pass" maxlength="30" >
				</label>
			</p>
			<p>
				 <input type="submit" value="log in" name="ok" id="button" />
			</p>
		</form>

	</div>
</div>

<div id="bottom" align="center">Все попытки несанкционированного доступа к панели управления логируются, для безопастности ваш IP будет записан.
<br>
<br>
<br>
<a href="<?php echo href('host'); ?>">На сайт</a>
</div>