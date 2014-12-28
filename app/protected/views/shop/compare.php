<table class="table" style="pading:10px; background-color: white;">
	<thead>
		<th></th>
		<?php foreach($results as $rs): ?>
			<th style="text-align: center; background-color: white;">
				<img width="150" height="150" src="files/images/<?php echo $rs['pic']; ?>">
			</th>
		<?php endforeach; ?>
	</thead>
	<tbody>
		<tr>
			<th style="text-align: center; background-color: white;">ชื่อร้าน</th>
			<?php foreach($results as $rs): ?>
			<?php 
			    if($color == '#F0F0F0'){
			      $color = 'white';
			    }else{
			      $color = '#F0F0F0';
			    }
			?>
				<th style="text-align: center; background-color: <?php echo $color; ?>;">
					<a href="<?php echo Yii::app()->createAbsoluteUrl("Shop/ShowList&id=".$rs['id']); ?>">
						<?php echo Yii::app()->Wordwrap->utf8_wordwrap($rs['shopname'], 20, "<br />", true); ?>
					</a>
				</th>
			<?php endforeach; ?>
		</tr>
		<?php foreach($services as $service): ?>
		<tr style="background-color: white;">
			<th><?php echo $service->list; ?></th>
			<?php foreach($results as $rs): ?>
				<td>
					<?php 
						if(!empty($rs['services'][$service->id])) {
							echo $rs['services'][$service->id]['price_max'];
						} else {
							echo "-";
						}
					?>
				</td>
			<?php endforeach; ?>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
