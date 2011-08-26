<div id="videoCategory">
	<h3>QUẢN LÝ DANH MỤC VIDEO</h3>
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
				<td><input type="button" class="btnDelete" value="Xóa" /></td>
			</tr>
			<?php
			}
		}
		?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$('#tblVideoCategory tr:odd').addClass('odd');
	$('.btnDelete').click(function() {
		var node = $(this).parent().parent();
		var name = $(node).find('td:nth-child(2)').text();
		if(confirm('Bạn có chắc chắn muốn phân loại "' + name + '" không ?')) {
			var id = $(this).attr('id').substring(5);
			$('#videoCategory').load('<?php echo site_url("videoCategory/delete_admin")?>/' + id + "/" + <?=$page?>);
		}
	});
</script>