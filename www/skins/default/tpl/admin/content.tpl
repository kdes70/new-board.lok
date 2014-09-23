<!-- ТОП МЕНЮ -->
<div id="top_menu">
	<nav>
		<ul>
			<li>
				<a href=""> <i class="fa fa-bell"></i>
					menu 1
				</a>
			</li>
			<li>
				<a href="">menu 2</a>
			</li>
			<li>
				<a href="">menu 3</a>
			</li>
			<li>
				<a href="<?php echo href('host'); ?>"><i class="fa fa-home"></i>Сайт</a>
			</li>
		</ul>
	</nav>
	<ul id="autch_info">
		<li>
			<a href="">Привкт Админ</a>
		</li>
		<li id="exit" >
			<a  href="<?php echo href('page=exit'); ?>
				"> <i class="fa fa-power-off"></i>
			</a>
		</li>
	</ul>
</div>
<!-- ТОП МЕНЮ END -->

<!-- КАРКАС -->
<div id="wrepper">
	<div id="wrep_left"></div>
	<aside id="left_block">
		<nav>
			<ul>
				<li class="listnav"><a href="#"><i class="fa fa-anchor"></i>Объявления</a><span>100</span></li>
					<ul class="nav_sub">
						<li><a href="<?php echo href('page=board', 'mod=read'); ?>">Все объявления</a></li>
						<li><a href="">Под пункт2</a></li>
						<li><a href="">Под пункт3</a></li>
						<li><a href="">Под пункт4</a></li>
					</ul>
				<li><a href="<?php echo href('page=category', 'mod=read'); ?>">Категории</a><span>140</span></li>
				<li class="listnav"><a href=""><i class="fa fa-tags"></i>Пункт списка3</a></li>
					<ul class="nav_sub">
						<li><a href="">Под пункт1</a></li>
						<li><a href="">Под пункт2</a></li>
						<li><a href="">Под пункт3</a></li>
						<li><a href="">Под пункт4</a></li>
					</ul>
				<li><a href="">Пункт списка4</a><span>140</span></li>
				<li><a href="">Пункт списка5</a></li>
				<li><a href="">Пункт списка6</a></li>
			</ul>
		</nav>
	</aside>


	<section id="wrep_content">
		<div id="main_wrep">
		<?php echo $content; ?>
		</div>
	</section>
</div>

<!-- КАРКАС END -->