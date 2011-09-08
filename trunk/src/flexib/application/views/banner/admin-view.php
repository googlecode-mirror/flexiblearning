<div id="banner">
	<h3>QUẢN LÝ BANNER</h3>

	<a href="<?=site_url(sprintf('banner/edit?%s=%s', SITE, ADMIN))?>">Thêm	Banner</a>
	<div class="message">
	<?php
	if (isset($notifyMessage)) {
		?>
		<div class="ui-state-highlight">
		<?=$notifyMessage?>
		</div>
		<?php
	} else if (isset($errorMessage)) {
		?>
		<div class="ui-state-error">
		<?=$errorMessage?>
		</div>
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
	<div>
		Tổng số danh mục :
		<?=$this->pagination->total_rows?>
	</div>

	<div id="status"></div>
	<table id="tblpartner">
		<thead>
			<th>STT</th>
			<th>Tên</th>
			<th>Đối tác</th>
			<th>Vị trí</th>
			<th>Banner</th>
			<th>Ngày tạo</th>
			<th>Ngày cập nhật</th>
			<th></th>
		</thead>
		<tbody>
		<?php
		if (isset($banners)) {
			$i = 0;

			foreach ($banners as $banner) {
				$i++;

				?>
		<tr id="cat-<?=$banner->Id?>">
			<td><?=$i ?></td>
			<td><?=$banner->Name?></td>
			<td><?=$banner->PartnerName?></td>
			<td><?=$banner->PositionName?></td>
			<td class="image"><img src=<?=base_url() . $banner->Path?> /></td>
			<td><?=date($this->config->item('date_format'), $banner->CreatedDate)?></td>
			<td><?=date($this->config->item('date_format'), $banner->UpdatedDate)?></td>
			<td class="action_col">
				<form class="banner" method="post"
						action="<?=site_url(sprintf('banner/delete/%d?%s=%s', $from, SITE, ADMIN))?>">
					<input type="hidden" name="Id" value="<?=$banner->Id?>" /> 
					<input type="hidden" name="Name" value="<?=$banner->Name?>" /> 
					<input type="submit" value="Xóa" />
				</form>
				<form action="<?=site_url(sprintf('banner/edit/%d?%s=%s', $banner->Id, SITE, ADMIN))?>" method="post">
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

<script type="text/javascript">
	$('form.banner').submit(function(event) {
		return confirm('Bạn có chắc chắn muốn xóa banner "' + $(this).find('input[name=Name]').val() + '" không ?');
	});
</script>