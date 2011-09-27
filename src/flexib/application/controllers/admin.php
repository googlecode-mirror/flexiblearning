<?php 
require_once 'base_controller.php';

class Admin extends Base_Controller {
	public function index() {
		if ($this->Account_model->authorize() == USER_AUTHENTIC_SUCCESS_FLAG) {
			
			$nTotalAccount = $this->Account_model->getCount();
			$nCreatedTodayAccount = $this->Account_model->getCountByToday();
			$this->addDataForView('nTotalAccount', $nTotalAccount);
			$this->addDataForView('nCreatedTodayAccount', $nCreatedTodayAccount);
			
			$nTotalBanner = $this->Banner_model->getCount();
			$nCreatedTodayBanner = $this->Banner_model->getCountByToday();
			$this->addDataForView('nTotalBanner', $nTotalBanner);
			$this->addDataForView('nCreatedTodayBanner', $nCreatedTodayBanner);
			
			$nTotalPartner = $this->Partner_model->getCount();
			$nCreatedTodayPartner = $this->Partner_model->getCountByToday();
			$this->addDataForView('nTotalPartner', $nTotalPartner);
			$this->addDataForView('nCreatedTodayPartner', $nCreatedTodayPartner);
			
			$nTotalVideoCategory = $this->VideoCategory_model->getCount();
			$nCreatedTodayVideoCategory = $this->VideoCategory_model->getCountByToday();
			$this->addDataForView('nTotalVideoCategory', $nTotalVideoCategory);
			$this->addDataForView('nCreatedTodayVideoCategory', $nCreatedTodayVideoCategory);
			
			$nTotalVideo = $this->Video_model->getCount();
			$nCreatedTodayVideo = $this->Video_model->getCountByToday();
			$this->addDataForView('nTotalVideo', $nTotalVideo);
			$this->addDataForView('nCreatedTodayVideo', $nCreatedTodayVideo);

			$nTotalNotification = $this->VideoNotification_model->getCount();
			$nCreatedTodayNotification = $this->VideoNotification_model->getCountByToday();
			$this->addDataForView('nTotalNotification', $nTotalNotification);
			$this->addDataForView('nCreatedTodayNotification', $nCreatedTodayNotification);
			
			$nTotalDocument = $this->VideoDocument_model->getCount();
			$nCreatedTodayDocument = $this->VideoDocument_model->getCountByToday();
			$this->addDataForView('nTotalDocument', $nTotalDocument);
			$this->addDataForView('nCreatedTodayDocument', $nCreatedTodayDocument);
			
			$nTotalSurvey = $this->VideoSurvey_model->getCount();
			$nCreatedTodaySurvey = $this->VideoSurvey_model->getCountByToday();
			$this->addDataForView('nTotalSurvey', $nTotalSurvey);
			$this->addDataForView('nCreatedTodaySurvey', $nCreatedTodaySurvey);
			
			$nTotalMessage = $this->Message_model->getCount();
			$nCreatedTodayMessage = $this->Message_model->getCountByToday();
			$this->addDataForView('nTotalMessage', $nTotalMessage);
			$this->addDataForView('nCreatedTodayMessage', $nCreatedTodayMessage);
			
			
			
			$nOnline = $this->Account_model->getNumberOfOnline();
			$nAccountAccessToday = $this->Account_model->getNumberOfAccessToday();
			$nAccountOnline = $this->Account_model->getNumberOfAccountOnline();
			$nGuestOnline = $nOnline - $nAccountOnline;
			$this->addDataForView('nOnline', $nOnline);
			$this->addDataForView('nAccountAccessToday', $nAccountAccessToday);
			$this->addDataForView('nAccountOnline', $nAccountOnline);
			$this->addDataForView('nGuestOnline', $nGuestOnline);
			
			$this->template->load('template_admin', 'dashboard', $this->getDataForView());
		} else {
			$UserName = $this->input->cookie($this->config->item('username_cookie'));
			$Password = $this->input->cookie($this->config->item('password_cookie'));
			$this->load->view('login', array(
										'current_url' => current_url(),
										'UserName' => $UserName,
										'Password' => $Password
			));
		}
	}	

	protected function getAdminTab() {
		return 0;
	}
}