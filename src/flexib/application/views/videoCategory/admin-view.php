<div id="videoCategory">
	<h3>QUẢN LÝ DANH MỤC VIDEO</h3>
	<a href="<?=site_url(sprintf('videoCategory/edit?%s=%s', SITE, ADMIN))?>">Tạo danh mục video mới</a>
	
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
	<div>Tổng số danh mục : <?=$this->pagination->total_rows?></div>
	
	<table id="tblVideoCategory">
		<thead>
			<th>STT</th>
			<th>Tên</th>
			<th>Ngày tạo</th>
			<th>Ngày cập nhật</th>
			<th></th>
		</thead>
		<tbody>
		<?php
		if (isset($videoCategories)) {
			$i = $from;
			foreach ($videoCategories as $videoCategory) {
				$i++;
				?>
			<tr>
				<td><?=$i?></td>
				<td><?=$videoCategory->Name?></td>
				<td><?=date($this->config->item('date_format'), $videoCategory->CreatedDate)?></td>
				<td><?=date($this->config->item('date_format'), $videoCategory->UpdatedDate)?></td>
				<td class="action_col">
					<?=form_open(sprintf('videoCategory/delete/%d?%s=%s', $from, SITE, ADMIN), array('class' => 'category'))?>
						<input type="hidden" name="Id" value="<?=$videoCategory->Id?>" />
						<input type="hidden" name="Name" value="<?=$videoCategory->Name?>" />
						<input type="submit" value="Xóa" />
					<?=form_close()?>
					<?=form_open(sprintf('videoCategory/edit/%d?%s=%s', $videoCategory->Id, SITE, ADMIN))?>
						<button></button>
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
	$('form.category').submit(function(event) {
		return confirm('Bạn có chắc chắn muốn xóa phân loại video "' + $(this).find('input[name=Name]').val() + '" không ?');
	});
	$('button').button({
		icons : {
			primary : 'ui-icon-close'
		},
		text : false
	});
</script>