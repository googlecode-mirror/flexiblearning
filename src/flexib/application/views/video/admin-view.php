<div id="video">
	<h3>QUẢN LÝ VIDEO</h3>
	<a href="<?=site_url(sprintf('video/edit?%s=%s', SITE, ADMIN))?>">Tạo video mới</a>
	
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
	<div class="left" style="width:50%">
		<div class="box_notify">
			<div>Tổng số video : <span class="bold_text"><?=$this->pagination->total_rows?></span></div>
			<div>Số video đã duyệt : <span class="bold_text"><?=$nApprovedVideos?></span></div>
		</div>
	</div>
	
	<div class="left" style="width:50%">
		<div class="box_notify">
			<div>Số video được tạo hôm nay : <span class="bold_text"><?=$nCreatedTodayVideos?></span></div>
			<div>Số video đã duyệt hôm nay : <span class="bold_text"><?=$nApprovedTodayVideos?></span></div>
		</div>
	</div>
	
	<div class="clear"></div>
		
	<div id="not-approved-video"></div>
	
	<h3>DANH SÁCH VIDEO</h3>
	<table id="tblVideo">
		<thead>
			<th>STT</th>
			<th>Tên</th>
			<th>Số lượt truy cập</th>
			<th>Số lượt đánh giá</th>
			<th>Số điểm</th>
			<th>Giá</th>
			<th class="box_center">Video của</th>
			<th class="box_center">Phân loại video</th>
			<th class="box_center">Duyệt</th>
			<th class="box_center">Ngày cập nhật</th>
			<th></th>
		</thead>
		<tbody>
		<?php
		if (isset($videos)) {
			$i = $from;
			foreach ($videos as $video) {
				$i++;
				?>
			<tr>
				<td><?=$i?></td>
				<td><?=$video->Name?></td>
				<td class="box_right"><?=$video->NumView?></td>
				<td class="box_right"><?=$video->NumRanking?></td>
				<td class="box_right">
					<?php 
					 	$score = 0;
					 	if ($video->NumRanking != 0) {
							$score = $video->Ranking/$video->NumRanking;
					 	}
					 	echo $score;
					?>
				</td>
				<td class="box_right"><?=$video->Price?></td>
				<td class="box_center"><?=$video->OwnerUserName?></td>
				<td class="box_center"><?=$video->VideoCategoryName?></td>
				<td>
				<?php
					if ($video->Approved) {
				?>
						<div class="ui-icon ui-icon-check" style="margin:auto"></div>
				<?php 
					} 
				?>
				</td>
				<td class="box_center"><?=date($this->config->item('date_format'), $video->UpdatedDate)?></td>
				<td class="action_col">
					<?=form_open(sprintf('video/delete/%d?%s=%s', $from, SITE, ADMIN), array('class' => 'video'))?>
						<input type="hidden" name="Id" value="<?=$video->Id?>" />
						<input type="hidden" name="Name" value="<?=$video->Name?>" />
						<input type="submit" value="Xóa" />
					<?=form_close()?>
					<?=form_open(sprintf('video/edit/%d?%s=%s', $video->Id, SITE, ADMIN))?>
						<input type="submit" value="Sửa" />
					<?=form_close()?>
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
</div>

<script type="text/javascript">
	$('form.video').submit(function(event) {
		return confirm('Bạn có chắc chắn muốn xóa video "' + $(this).find('input[name=Name]').val() + '" không ?');
	});

	$('#not-approved-video').load('<?=site_url('video/listNotApprovedVideo')?>');
</script>