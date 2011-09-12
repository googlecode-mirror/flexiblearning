<?php 
require_once 'abstract_controller.php';

class Welcome extends Abstract_Controller {
	private $bannerPositions;
	 
	public function index()	{
		$banners = $this->Banner_model->getAll(0, 0, NULL, NULL, '', TRUE);
		$this->template->load($this->template_view, 'welcome_view', $this->getDataForView());
	}

	protected function initializeForLib() {
		$this->form_validation->set_error_delimiters('<div>', '</div>');
		$this->bannerPositions = $this->config->item('banner_position');
		foreach ($this->bannerPositions as $position => $value) {
			$this->VIEWS[$value] = $value . '_view';
		}	
		parent::initializeForLib();
	}
	
	protected function __getDataForPos1View() {
		foreach ($this->bannerPositions as $key => $value) {
			if ($value == 'pos1') {
				$pos = $key;
				break;
			}	
		}
		$joinResource = array('table'=> 'resource', 'criteria'=> 'resource.Id = banner.IdResource', 'type' => 'join');
		$banners = $this->Banner_model->getAllWhere(array('Position' => $pos), 0, 0, NULL, array($joinResource), 'Path', NULL, TRUE);
		return array(
			'banners' => $banners
		);
	}
	
	protected function __getDataForPos2View() {
		foreach ($this->bannerPositions as $key => $value) {
			if ($value == 'pos2') {
				$pos = $key;
				break;
			}	
		}
		$joinResource = array('table'=> 'resource', 'criteria'=> 'resource.Id = banner.IdResource', 'type' => 'join');
		$banners = $this->Banner_model->getAllWhere(array('Position' => $pos), 0, 0, NULL, array($joinResource), 'Path', NULL, TRUE);
		return array(
			'banners' => $banners
		);
	}
	
	protected function __getDataForPos3View() {
		foreach ($this->bannerPositions as $key => $value) {
			if ($value == 'pos3') {
				$pos = $key;
				break;
			}	
		}
		$joinResource = array('table'=> 'resource', 'criteria'=> 'resource.Id = banner.IdResource', 'type' => 'join');
		$banners = $this->Banner_model->getAllWhere(array('Position' => $pos), 0, 0, NULL, array($joinResource), 'Path', NULL, TRUE);
		return array(
			'banners' => $banners
		);
	}
	
	protected function __getDataForPos4View() {
		foreach ($this->bannerPositions as $key => $value) {
			if ($value == 'pos4') {
				$pos = $key;
				break;
			}	
		}
		$joinResource = array('table'=> 'resource', 'criteria'=> 'resource.Id = banner.IdResource', 'type' => 'join');
		$banners = $this->Banner_model->getAllWhere(array('Position' => $pos), 0, 0, NULL, array($joinResource), 'Path', NULL, TRUE);
		return array(
			'banners' => $banners
		);
	}
	
	protected function __getDataForPos5View() {
		foreach ($this->bannerPositions as $key => $value) {
			if ($value == 'pos5') {
				$pos = $key;
				break;
			}	
		}
		$joinResource = array('table'=> 'resource', 'criteria'=> 'resource.Id = banner.IdResource', 'type' => 'join');
		$banners = $this->Banner_model->getAllWhere(array('Position' => $pos), 0, 0, NULL, array($joinResource), 'Path', NULL, TRUE);
		return array(
			'banners' => $banners
		);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */