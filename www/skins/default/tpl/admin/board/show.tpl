
		
		<center class="paginator"> <?php echo $page_menu; ?></center>
			<table id="adv_list">
				<thead>
					<tr>
						<th><span>#</span></th>
						<th><span><i class="fa fa-picture-o"></i></span></th>
						<th><span>Загаловок</span></th>
						<th><span>Категория</span></th>
						<th><span>Город</span></th>
						<th><span>Автор</span></th>
						<th><span>Дата</span></th>
						<th><span>Тип</span></th>
					</tr>
				</thead>
				<tbody>
					<?php echo $rows; ?>
					
				</tbody>
				<tfoot>
					<tr>
						<th><span>#</span></th>
						<th><span><i class="fa fa-picture-o"></i></span></th>
						<th><span>Загаловок</span></th>
						<th><span>Категория</span></th>
						<th><span>Город</span></th>
						<th><span>Автор</span></th>
						<th><span>Дата</span></th>
						<th><span>Тип</span></th>
					</tr>
				</tfoot>
			</table>
			<center class="paginator"> <?php echo $page_menu; ?></center>
		
	