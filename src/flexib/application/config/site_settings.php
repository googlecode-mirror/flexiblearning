<?php
$config['date_format'] = 'd/m/Y';
$config['date_hour_format']= 'd-m-y h:m:s';
$config['date_format_client'] = 'dd/mm/yy';
$config['number_of_object_list_page'] = 30;
$config['resource_folder'] = 'resources';
$config['site_name'] = 'FLEXIB_LEARNING';
$config['banner_position'] = array(1 => 'pos1', 2 => 'pos2', 3 => 'pos3', 4 => 'pos4', 5 => 'pos5');
$config['default_banner'] = 'resources/banner/default_banner.jpg';
$config['video_width'] = 600;
$config['video_height'] = 400;
$config['thumbnail_video_width'] = 300;
$config['thumbnail_video_height'] = 200;
$config['video_auto_start'] = "false";
$config['video_thumbnail'] = "resources/video/video_thumbnail.jpg";
$config['n_object_for_quick_view_list_video'] = 3;
$config['template_banner'] = 'images/template_banner.png';
$config['flash_object_folder'] = 'flash_object';
$config['convert_command'] = 'ffmpeg\\ffmpeg.exe -i %s %s';
$config['create_thumbnail_command'] = 
	'ffmpeg\\ffmpeg.exe  -itsoffset -4  -i %s -vcodec mjpeg -vframes 1 -an -f rawvideo -s %dx%d %s';
$config['generate_password_length'] = 10;

// ADMIN_EMAIL_SETTING
$config['host_email_server'] = 'smtp.gmail.com';
$config['host_smtp_secure'] = 'ssl'; 
$config['host_smtp_port'] = 465;
$config['host_username_email'] = 'hdang.sea@gmail.com';
$config['host_password_email'] = 'lighthouse2709';
$config['host_email_fullname'] = 'FLEXIB-LEARNING ADMIN';

$config['config_admin_ck_editor'] = array('uiColor' => '#89b7da');

$config['video_allowed_type'] = 'avi|flv|wmv|swf|mpeg|mpeg4';
$config['video_allowed_type_text'] = "AVI, FLV, WMV, SWF, MPEG và MPEG4";

$config['lang_en'] = array('en' => 'English', 'vi' => 'Tiếng Việt');
$config['lang_vi'] = array('vi' => 'English', 'vi' => 'Tiếng Việt');
$config['lang'] = array('vi' => 'Tiếng Việt', 'en' => 'Tiếng Anh');

$config['username_cookie'] = 'username_cookie';
$config['password_cookie'] = 'password_cookie';

$config['img_allowed_type'] = 'gif|jpg|png|jpeg';
$config['img_max_size'] = 1024;
$config['img_max_width'] = 1280;
$config['img_max_height'] = 960;

$config['survey_allowed_type']='doc|docx|pdf';
$config['survey_allowed_type_text'] = ".doc | .docx | .pdf";

$config['add_successfully'] = '%s %s được tạo thành công';
$config['add_fail'] = '%s %s được tạo không thành công';
$config['approved_successfully'] = '%s %s đã được duyệt';
$config['approved_fail']= "%s %s chưa được duyệt";
$config['delete_successfully'] = '%s %s được xóa thành công';
$config['delete_fail'] = '%s %s xóa không thành công';
$config['item_not_exist'] = 'Đồi tượng không tồn tại';
$config['reset_password_fail'] = 'Mật khẩu của thành viên %s không được cập nhật thành công';
$config['reset_password_successfully'] = 'Mật khẩu của thành viên %s được cập nhật thành công';
$config['save_fail'] = '%s %s được lưu không thành công';
$config['save_successfully'] = '%s %s được lưu thành công';
$config['save_fail'] = '%s %s được lưu không thành công';

$config['text_accountPermission'] = 'Permission';
$config['text_account'] = 'Người dùng';
$config['text_answer'] = 'Câu trả lời';
$config['text_banner'] = 'Banner';
$config['text_nationality'] = 'Quốc tịch';
$config['text_partner'] = 'Đối tác';
$config['text_profession'] = 'Nghề nghiệp';
$config['text_resource'] = 'Resource';
$config['text_role'] = 'Vai trò';
$config['text_video'] = 'Video';
$config['text_videoCategory'] = 'Phân loại video';