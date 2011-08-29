<div id="account">
	<h3>QUẢN LÝ ACCOUNT</h3>
	<a href="<?=site_url(sprintf('account/edit?%s=%s', SITE, ADMIN))?>">Tạo tài khoản người dùng mới</a>
	
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
	<div>Tổng số tài khoản : <?=$this->pagination->total_rows?></div>
	
	<table id="tblAccount">
		<thead>
			<th>STT</th>
			<th>Tên đăng nhập</th>
			<th>Họ tên</th>
			<th>Vai trò</th>
			<th>Ngày tạo</th>
			<th>Ngày cập nhật</th>
			<th></th>
		</thead>
		<tbody>
		<?php
		if (isset($accounts)) {
			$i = $from;
			foreach($accounts as $account) {
				$i++;
		?>
			<tr>
				<td><?=$i?></td>
				<td><?=$account->UserName?></td>
				<td><?=$account->FullName?></td>
				<td><?=$account->RoleName?></td>
				<td><?=date($this->config->item('date_format'), $account->CreatedDate)?></td>
				<td><?=date($this->config->item('date_format'), $account->UpdatedDate)?></td>
				<td class="action_col">
					<form class="category" action="<?=site_url(sprintf('account/delete/%d?%s=%s', $from, SITE, ADMIN))?>" method="post">
						<input type="hidden" name="Id" value="<?=$account->Id?>" />
						<input type="hidden" name="Name" value="<?=$account->UserName?>" />
						<input type="submit" value="Xóa" />
					</form>
					<form action="<?=site_url(sprintf('account/edit/%d?%s=%s', $account->Id, SITE, ADMIN))?>" method="post">
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
</div>
