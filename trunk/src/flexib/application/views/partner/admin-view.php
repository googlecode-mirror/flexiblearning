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
	<div>Tổng số đối tác : <?=$this->pagination->total_rows?></div>
	
	<table id="tblpartner">
		<thead>
			<th></th>
			<th>Tên</th>
			<th>Email</th>
			<th>Tel</th>
			<th>Link Liên Kết</th>
			<th>Ngày tạo</th>
			<th>Ngày cập nhật</th>
			<th></th>
		</thead>
		<tbody>
		<?php
		if (isset($partners)) {
			$i = $from;
			
			foreach ($partners as $partner) {
				$i++;
				
		?>
			<tr id="cat-<?=$partner->Id?>">
				<td><input type="checkbox" name="checkbox1" value ="<?=$partner->Id ?>" /></td>
				
				<td><img src=<?=base_url() . $partner->Path?> width = '64' height = '64'><br><?=$partner->Name?></br></td>
				
			    <td><?=$partner->Email?></td>
			    <td><?=$partner->Tel?></td>
			    <td><?=$partner->Link?></td>
			    
			    <td><?=date($this->config->item('date_format'), $partner->CreatedDate)?></td>
			    <td><?=date($this->config->item('date_format'), $partner->UpdatedDate)?></td>
				<td class="action_col">
					<?=form_open(sprintf('partner/delete/%d?%s=%s', $from, SITE, ADMIN), array('class' => 'partner'))?>
						<input type="hidden" name="Id" value="<?=$partner->Id?>" />
						<input type="hidden" name="Name" value="<?=$partner->Name?>" />
						<input type="submit" value="Xóa" />
					<?=from_close()?>
					<?=form_open(sprintf('partner/edit/%d?%s=%s', $partner->Id, SITE, ADMIN))?>
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

<script type="text/javascript">
	$('form.partner').submit(function(event) {
		
			return confirm('Bạn có chắc chắn muốn xóa đối tác "' + $(this).find('input[name=Name]').val() + '" không ?');

	});
</script>
</div>
