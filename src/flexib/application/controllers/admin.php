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