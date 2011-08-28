<div id="partner">
	<h3>Quản Lý Đối Tác</h3>
	<a href="<?=site_url(sprintf('partner/edit?%s=%s', SITE, ADMIN))?>">Thêm Đối Tác</a>
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
		$from = $this->uri->segment(3); 
		if (!isset($from) || $from == '') {
			$from = 0;
		}
	?>
	<div>Tổng số danh mục : <?=$this->pagination->total_rows?></div>
	
	<table id="tblpartner">
		<tbody>
		<thead>
			<th>STT</th>
			<th>Tên</th>
			<th>Email</th>
			<th>Tel</th>
			<th>Link Liên Kết</th>
			<th>Ngày tạo</th>
			<th>Ngày cập nhật</th>
			<th></th>
		</thead>
		<?php
		if (isset($partners)) {
			$i = 0;
			
			foreach ($partners as $partner) {
				$i++;
				
		?>
			<tr id="cat-<?=$partner->Id?>">
				<td><?=$i ?></td>
				
				<td><?=$partner->Name?></td>
			    <td><?=$partner->Email?></td>
			    <td><?=$partner->Tel?></td>
			    <td><?=$partner->Link?></td>
			    <td><img src=<?=base_url() . $partner->Path?>></td>
			    <td><?=date($this->config->item('date_format'), $partner->CreatedDate)?></td>
			    <td><?=date($this->config->item('date_format'), $partner->UpdatedDate)?></td>
				
				<td><input type="button" class="btnDelete" value="xóa" /></td>
			</tr>
			
			<?php
			}
		}
		?>
		</tbody>
	</table>
</div>
