<div id="dashboard">
	<h3>DASHBOARD</h3>
	<div class="dashboard_box">

	<table>
	<div class="column">

		<div class="portlet">
			<div class="portlet-header">Account</div>
			<div class="portlet-content">
			<div>Tổng số account : <span class="bold_text"><?=$nTotalAccount?></span></div>
			<div>Tổng số account được tạo hôm nay : <span class="bold_text"><?=$nCreatedTodayAccount?></span></div>
			
			</div>
		</div>
	
		<div class="portlet">
			<div class="portlet-header">Banner</div>
			<div class="portlet-content">
			<div>Tổng số banner : <span class="bold_text"><?=$nTotalBanner?></span></div>
			<div>Tổng số banner được tạo hôm nay : <span class="bold_text"><?=$nCreatedTodayBanner?></span></div>
			</div>
		</div>
		
		<div class="portlet">
			<div class="portlet-header">Đối tác</div>
			<div class="portlet-content">
			<div>Tổng số đối tác : <span class="bold_text"><?=$nTotalPartner?></span></div>
			<div>Tổng số đối tác được tạo hôm nay : <span class="bold_text"><?=$nCreatedTodayPartner?></span></div>
			</div>
		</div>

		
	</div>
	<div class="column">
		<div class="portlet">
			<div class="portlet-header">Danh mục video</div>
				<div class="portlet-content">
					<div>Tổng số danh mục video : <span class="bold_text"><?=$nTotalVideoCategory?></span></div>
					<div>Tổng số danh mục video được tạo hôm nay : <span class="bold_text"><?=$nCreatedTodayVideoCategory?></span></div>
				</div>
		</div>
		<div class="portlet">
			<div class="portlet-header">Video</div>
				<div class="portlet-content">
					<div>Tổng số video : <span class="bold_text"><?=$nTotalVideo?></span></div>
					<div>Tổng số video được tạo hôm nay : <span class="bold_text"><?=$nCreatedTodayVideo?></span></div>
				</div>
		</div>
		<div class="portlet">
			<div class="portlet-header">Thông báo video</div>
				<div class="portlet-content">
					<div>Tổng số thông báo video : <span class="bold_text"></span></div>
					<div>Tổng số video được tạo hôm nay : <span class="bold_text"></span></div>
				</div>
		</div>
	</div>
	<div class="column">
		<div class="portlet">
			<div class="portlet-header">Tài liệu video</div>
				<div class="portlet-content">
					<div>Tổng số tài liệu video : <span class="bold_text"></span></div>
					<div>Tổng số tài liệu video được tạo hôm nay : <span class="bold_text"></span></div>
				</div>
		</div>
		<div class="portlet">
			<div class="portlet-header">Thông báo bảng điều tra</div>
				<div class="portlet-content">
					<div>Tổng số bảng điều tra : <span class="bold_text"></span></div>
					<div>Tổng số bảng điều tra được tạo hôm nay : <span class="bold_text"></span></div>			</div>
		</div>
		<div class="portlet">
			<div class="portlet-header">Hộp Tin Nhắn</div>
				<div class="portlet-content">
					<div>Tổng số tin nhắn : <span class="bold_text"></span></div>
					<div>Tổng số tin nhắn nhận được hôm nay : <span class="bold_text"></span></div>
				</div>
		</div>
	</div>
	</table>
</div>
<script type="text/javascript">
	$("#tabs").tabs();
	$(function() {
		$( ".column" ).sortable({
			connectWith: ".column"
		});

		$( ".portlet" ).addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
			.find( ".portlet-header" )
				.addClass( "ui-widget-header ui-corner-all" )
				.prepend( "<span class='ui-icon ui-icon-minusthick'></span>")
				.end()
			.find( ".portlet-content" );

		/*$( ".portlet-header .ui-icon" ).click(function() {
			$( this ).toggleClass( "ui-icon-minusthick" ).toggleClass( "ui-icon-plusthick" );
			$( this ).parents( ".portlet:first" ).find( ".portlet-content" ).toggle();
		});*/

		$( ".column" ).disableSelection();
	});
	
</script>