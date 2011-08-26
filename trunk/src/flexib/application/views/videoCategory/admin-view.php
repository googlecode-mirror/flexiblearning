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
	$('table tr:odd').addClass('odd');
</script>