<?php
require_once 'abstract_Controller.php';
require_once 'lib/PHPMailer_v5.1/class.phpmailer.php';

class VideoNotification extends Abstract_Controller {
    protected function getAdminTab() {
		return 7;
	}
	
	protected function getListName() {
		return 'videoNotifications';
	}
	
	
	protected function setFormValidationForEditView() {
		$this->form_validation->set_rules('Title', 'lang:notification title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('Content', 'lang:notification content', 'trim|xss_clean');
		
	}
    protected function hasAdminPermission() {
		return TRUE;
	}
	protected function addMoreDataForEditView() {
		$videos = $this->Video_model->getAll(0,0, array('Name' => 'asc'),NULL,'', TRUE );
		
		$this->addDataForView('videos',$videos);
		
	}
	protected function handleEditValidationSuccess($videoNotification, $site = '') {
			if($videoNotification->Id == NULL){
				$sendMail = true;
			}else{
				$sendMail = false;
			}
			$data = $this->input->post();
			if (isset($data) && is_array($data)) {
				foreach ($data as $key => $value) {
						
					$videoNotification->IdVideo = $value;
						
				}
			}
			$userData = $this->session->userdata(USER_AUTHENTIC_COOKIE);
			$videoNotification->IdAccount = $this->session->userdata(USERID_LOGIN);	
			$videoNotification->Id = $videoNotification->save();
			if ($videoNotification->Id != -1) {
	    		if ($site != ADMIN) {
	    			redirect('/' . lcfirst(get_class($this)) . '/view/' . $videoNotification->Id);
	    		} else {
	    		
	    			
	    			//$this->prepareDataForAdminListView();
	    			//$this->loadViewForAdminEditSuccessfully($videoNotification);
	    			if($sendMail){
	    				$this->SendMail($videoNotification->IdVideo, $videoNotification->IdAccount);
	    			}
	    		}
	    	}
	    	
		//}
		parent::handleEditValidationSuccess($videoNotification, $site);
	    
	}
	protected  function SendMail($IdVideo, $userID){
		
		$userdata = $this->Account_model->getById($userID);
		/*
		$this->email->from($userdata->Email, $userdata->UserName);
		$query = "Select * from account_video where IdVideo =?";
		$listIdUsers = $this->db->query($query,$IdVideo);
		//foreach ($listIdUsers as $IdUser){
			//if(isset($IdUser)){
				//$user = $this->Account_model->getById($IdUser);
				//$this->email->from($user->Email);
				//$this->email->subject('Thông báo mới từ video');
				//$this->email->message('testing the email class');
				//$this->email->send();
			//}
		//} 
		$this->email->to("totran0@gmail.com");
		$this->email->subject('Thông báo mới từ video');
		$this->email->message('testing the email class');
		$this->email->send();*/
//		$mail = new PHPMailer();
//		$mail->IsSMTP();
//		$mail->Host = "smtp.gmail.com";
//		$mail->Port = 456;  // set the pot to use
//		$mail->SMTPAuth = true; // turn on SMTP
//		$mail->SMTPSecure = 'ssl';
//		$mail->Username ="totran0@gmail.com" ;//$userdata->Email;
//		$mail->Password = "tendethuong";
//		$from = "totran0@gmail.com";
//		$to = "totran0@gmail.com";
//		$name = "TO tran";
////		$mail->From = $from;
//		$mail->SetFrom($from, $name);
//		$mail->FromName = $userdata->UserName;
//		$mail->AddAddress('hdang.sea@gmail.com','abc');
//		$mail->WordWrap = 50;
//		$mail->IsHTML(true);
//		$mail->Subject = "Thoong bao moi";
//		$mail->Body ="<bCo thong bao moi tren khoa hoc cua ban</b>";
////		$mail->AltBody = "djfhjsdhf";
//		if(!$mail->Send()){
//			echo("<h1>Loi khi goi mail".$mail->ErrorInfo."</h1>");
//		}
//		else{
//			echo("<h1>send mail thanh cong</h1>");
//		}
	
		
		$mail             = new PHPMailer();

		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
		// 1 = errors and messages
		// 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
		$mail->Username   = "hdang.sea@gmail.com";  // GMAIL username
		$mail->Password   = "lighthouse2709";            // GMAIL password

		$mail->SetFrom('hdang.sea@gmail.com', 'Hai Dang Tran');

		$mail->Subject    = "PHPMailer to you";

		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

		$mail->MsgHTML('This is a test email from hdang.sea@gmail.com. Hope it done :D');

		$address = "sea2709@yahoo.com";
		$mail->AddAddress($address, "John Doe");

		if(!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
		}
		
	}
	protected function getObjectsForList($from = 0, $nObjPerPage = '') {
		$className = $this->getModelName();
		
		$joinAccount = array('table'=> 'account', 'criteria'=> 'account.Id = videoNotification.IdAccount', 'type' => 'join');
		$joinVideo = array('table' =>'video', 'criteria' => 'video.Id = videoNotification.IdVideo' ,'type' => 'join');
		$moreProperties = array(
			'account.UserName as OwnerUserName',
			'video.Name as VideoName');
		
		$objects = $this->$className->getAll(
			$from, $nObjPerPage, array('CreatedDate' => 'asc'), 
			array($joinAccount, $joinVideo) , $moreProperties, TRUE);
	
		return $objects;
	}
	
}