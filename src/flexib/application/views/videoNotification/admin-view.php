<div id="videoNotification">
	<h3>QUẢN LÝ THÔNG BÁO VIDEO</h3>
	<a href="<?=site_url(sprintf('videoNotification/edit?%s=%s', SITE, ADMIN))?>", SITE, ADMIN> Tạo Thông báo mới</a>
	<div class="message">
		<?php
			if (isset($notifyMessage)) {
		?>
			    <div class="ui-state-highlight"><?=$notifyMessage?></div>
		<?php 			
			} else if (isset($errorMessage)) {
		?>
				<div class="ui-state-error"><?=$errorMessage?></div>
		<?php 		
			} 
		?>
	</div>
	<?php
		if ($this->pagination->cur_page > 0) {
			$from = ($this->pagination->cur_page - 1) * $this->pagination->per_page;
		} 
		if (!isset($from) || $from == '') {
			$from = 0;
		}
	?>
	<div>Tổng số thông báo : <?=$this->pagination->total_rows?></div>
	
	<table id="tblVideoNotification">
		<thead>
			<th></th>
			<th>Tiêu Đề Thông Báo </th>
			<th>Nội Dung</th>
			<th>Người Post</th>
			<th>Thuộc Video</th>
			<th>Thời gian post thông báo</th>
			<th></th>
		</thead>
		<tbody>
		<?php
		if (isset($videoNotifications)) {
			$i = $from;
			foreach ($videoNotifications as $videoNotification) {
				$i++;
				
				?>
			<tr>
				<td><?=$i?></td>
				<td><?=$videoNotification->Title?></td>
				
				<td><?=$videoNotification->Content?></td>
				
				<td><?=$videoNotification->OwnerUserName ?></td>
				<td><?=$videoNotification->VideoName ?></td>
				<td><?=date($this->config->item('date_hour_format'),$videoNotification->CreatedDate)?></td>
				
				
				<td class="action_col">
					<form class="videoNotification" action="<?=site_url(sprintf('videoNotification/delete/%d?%s=%s', $from, SITE, ADMIN))?>" method="post">
						<input type="hidden" name="Id" value="<?=$videoNotification->Id?>" />
						<input type="hidden" name="Name" value="<?=$videoNotification->Title?>" />
						<input type="submit" value="Xóa" style="width: 90px" />
					</form>
					
					<form action="<?=site_url(sprintf('videoNotification/edit/%d?%s=%s', $videoNotification->Id, SITE, ADMIN))?>" method="post">
						<input type="submit" value="Sửa" style="width: 90px"/>
					</form>
				
					
					
					
					
				</td>
			</tr>
			<?php
			}
		}
		?>
		</tbody>
	</table>
	<div>
		<?=$page_links?>
	</div>
	<script type="text/javascript">
	$('form.videoNotification').submit(function(event) {
		
			return confirm('Bạn có chắc chắn muốn xóa thông báo "' + $(this).find('input[name=Name]').val() + '" không ?');

	});
	
	</script>

</div>