<div id="videoDocument">
	<a href="<?=site_url(sprintf('videoDocument/edit?%s=%s', SITE, ADMIN))?>", SITE, ADMIN> Thêm tài liệu cho video</a>
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
	<div>Tổng số tài liệu : <?=$this->pagination->total_rows?></div>
	
	<table id="tblVideoDocument">
		<thead>
			<th></th>
			<th>Tên Tài Liệu </th>
			<th>Mô Tả</th>
			<th>Thuộc Video</th>
			<th>Ngày tạo</th>
			<th>Ngày Chỉnh sửa</th>
			<th>Duyệt</th>
			<th></th>
		</thead>
		<tbody>
		<?php
		if (isset($videoDocuments)) {
			$i = $from;
			foreach ($videoDocuments as $videoDocument) {
				$i++;
				
				?>
			<tr>
				<td><?=$i?></td>
				<td><?=$videoDocument->Subject?></td>
				
				<td><?=$videoDocument->Description?></td>
				
				<td><?=$videoDocument->VideoName?></td>
				<td><?=date($this->config->item('date_format'),$videoDocument->CreatedDate)?></td>
				
				
				<td><?=date($this->config->item('date_format'), $videoDocument->UpdatedDate)?></td>
				<td>
				<?php 
				 	if($videoDocument->Approved){
				?> 
				<div class="ui-icon ui-icon-check" style="margin:auto"></div>
				<?php
						
				 	} 
				?>
				</td>
				<td class="action_col">
					<?=form_open(sprintf('videoDocument/delete/%d?%s=%s', $from, SITE, ADMIN), array('class' => 'videoDocument'))?>
						<input type="hidden" name="Id" value="<?=$videoDocument->Id?>" />
						<input type="hidden" name="Name" value="<?=$videoDocument->Subject?>" />
						<input type="submit" value="Xóa" style="width: 90px" />
					<?=form_close()?>
					
					<?=form_open(sprintf('videoDocument/edit/%d?%s=%s', $videoDocument->Id, SITE, ADMIN))?>
						<input type="submit" value="Sửa" style="width: 90px"/>
						
					<?=form_close()?>
					
					<?=form_open(sprintf('videoDocument/Download/%s?%s=%s', $videoDocument->FileName, SITE, ADMIN), array('class' => 'videoDocumentDownload'))?>
						<input type="submit" value="Download" style="width: 100px" />
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
	<script type="text/javascript">
	$('form.videoDocument').submit(function(event) {
		
			return confirm('Bạn có chắc chắn muốn xóa tài liệu "' + $(this).find('input[name=Name]').val() + $(this).find('input[name=IdVideo]').val() + '" không ?');

	});
	
	</script>
</div>