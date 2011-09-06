<div id="videoSurvey">
	<h3>QUẢN LÝ BẢNG ĐIỀU TRA CÂU HỎI</h3>
	<a href="<?=site_url(sprintf('videoSurvey/edit?%s=%s', SITE, ADMIN))?>", SITE, ADMIN> Tạo Bảng Khảo sát mới</a>
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
	<div>Tổng số bảng điều tra : <?=$this->pagination->total_rows?></div>
	
	<table id="tblVideoSurvey">
		<thead>
			<th></th>
			<th>Tên Khảo Sát </th>
			<th>Tên Video</th>
			<th>Ngày tạo</th>
			<th>Ngày Chỉnh sửa</th>
			<th></th>
		</thead>
		<tbody>
		<?php
		if (isset($videoSurveys)) {
			$i = $from;
			foreach ($videoSurveys as $videoSurvey) {
				$i++;
				?>
			<tr>
				<td><?=$i?></td>
				<td><?=$videoSurvey->Name?></td>
				
				<td><?=$videoSurvey->VideoName?></td>
				<td><?=date($this->config->item('date_format'),$videoSurvey->CreatedDate)?></td>
				
				
				<td><?=date($this->config->item('date_format'), $videoSurvey->UpdatedDate)?></td>
				<td class="action_col">
					<form class="videoSurvey" action="<?=site_url(sprintf('videoSurvey/delete/%d?%s=%s', $from, SITE, ADMIN))?>" method="post">
						<input type="hidden" name="Id" value="<?=$videoSurvey->Id?>" />
						<input type="hidden" name="Name" value="<?=$videoSurvey->Name?>" />
						<input type="submit" value="Xóa" />
					</form>
					<form action="<?=site_url(sprintf('videoSurvey/edit/%d?%s=%s', $videoSurvey->Id, SITE, ADMIN))?>" method="post">
						<input type="submit" value="Sửa" />
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
	$('form.videoSurvey').submit(function(event) {
		
			return confirm('Bạn có chắc chắn muốn xóa tài liệu khảo sát "' + $(this).find('input[name=Name]').val() + '" không ?');

	});
	</script>
</div>