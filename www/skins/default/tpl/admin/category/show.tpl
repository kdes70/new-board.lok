<div id="left_wrep">
	
</div>
<div id="right_wrep">
	<div>
	<table>
		<thead>
			<tr>
				<th><span>#</span></th>
				<th><span>Название</span></th>
				<th><span>Родитель</span></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th><span>#</span></th>
				<th><span>Название</span></th>
				<th><span>Родитель</span></th>
			</tr>
		</tfoot>
		<tbody>
			<tr>
			<?php foreach ($cat_row as $key => $value):?>
				<?php if(count($value) > 1) : //Если это радительская категория?>
				<td><?php echo $key; ?></td>
				<td><?php echo $value[0]; ?></td>
				<td>-</td>
			</tr>
				<?php if(isset($value['sub'])) : ?>
					<tr>
			 		<?php foreach ($value['sub'] as $key => $sub):?>
				 		<td><?php echo $key; ?></td>
				 		<td>-</td>
				 		<td><?php echo $sub; ?></td>
					</tr>
					 <?php endforeach; ?>
					<?php endif; ?>
				 <?php elseif (isset($value[0])) :?>
				 	<tr>
					 	<td><?php echo $key; ?></td>
					 	<td><?php echo $value[0]; ?></td>
					 	<td>-</td>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
</div>
				