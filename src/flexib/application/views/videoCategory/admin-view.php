<div id="videoCategory">
	<h3>QUẢN LÝ DANH MỤC VIDEO</h3>
	<a href="#videoCategory" id="lnkNew">Tạo mới danh mục</a>
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
			$i = 0;
			foreach ($videoCategories as $videoCategory) {
				$i++;
				?>
			<tr id="cat-<?=$videoCategory->Id?>">
				<td><?=$i?></td>
				<td><?=$videoCategory->Name?></td>
				<td><?=date($this->config->item('date_format'), $videoCategory->CreatedDate)?></td>
				<td><?=date($this->config->item('date_format'), $videoCategory->UpdatedDate)?></td>
				<td><input type="button" class="btnDelete" value="Xóa" id="delCat-<?=$videoCategory->Id?>" /></td>
			</tr>
			<?php
			}
		}
		?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$('.btnDelete').click(function() {
		var node = $(this).parent().parent();
		var name = $(node).find('td:nth-child(2)').text();
		if(confirm('Bạn có chắc chắn muốn xóa phân loại video "' + name + '" không ?')) {
			var id = $(this).attr('id').substring(7);
			$('#videoCategory').load("<?=site_url('videoCategory/delete_admin')?>/" + id + "/" + <?=$page?>);
		}
	});

	$('#lnkNew').click(function() {
		$('#videoCategory').load("<?=site_url('videoCategory/edit')?>");
	});
</script>