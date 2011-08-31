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
	<div>Tổng số video : <?=$this->pagination->total_rows?></div>
	
	<table id="tblVideo">
		<thead>
			<th>STT</th>
			<th>Tên</th>
			<th>Số lượt truy cập</th>
			<th>Số lượt đánh giá</th>
			<th>Số điểm</th>
			<th>Giá</th>
			<th>Video của</th>
			<th>Ngày cập nhật</th>
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
				<td><?=$video->NumView?></td>
				<td><?=$video->NumRanking?></td>
				<td>
					<?php 
					 	$score = 0;
					 	if ($video->NumRanking != 0) {
							$score = $video->Ranking/$video->NumRanking;
					 	}
					 	echo $score;
					?>
				</td>
				<td><?=$video->Price?></td>
				<td><?=$video->OwnerUserName?></td>
				<td><?=date($this->config->item('date_format'), $video->UpdatedDate)?></td>
				<td class="action_col">
					<form class="video" action="<?=site_url(sprintf('video/delete/%d?%s=%s', $from, SITE, ADMIN))?>" method="post">
						<input type="hidden" name="Id" value="<?=$video->Id?>" />
						<input type="hidden" name="Name" value="<?=$video->Name?>" />
						<input type="submit" value="Xóa" />
					</form>
					<form action="<?=site_url(sprintf('video/edit/%d?%s=%s', $video->Id, SITE, ADMIN))?>" method="post">
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
</div>
