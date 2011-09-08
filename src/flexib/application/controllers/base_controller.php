<?php
class Base_Controller extends CI_Controller {
	protected $VIEWS = array();
	
	private $_viewData;
	
	protected function initializeForLib() {
		$this->form_validation->set_error_delimiters('<div>', '</div>');
	}
	
	protected function getAdminTab() {
		return 0;
	}
	
	public function __construct() {
		parent::__construct();
		
		$this->initializeForLib();
		
		$this->addAdditionalAreaView();
	}
	
	protected function addAdditionalAreaView() {
		// add tab index
		$this->addDataForView('tab', $this->getAdminTab());
		foreach ($this->VIEWS as $view => $value) {
			$funcNameForRenderView = $this->__getFuncNameForRenderView($value);
			$data = NULL;
			if (method_exists($this, $funcNameForRenderView)) {
				$data = $this->$funcNameForRenderView();
			}
			$this->template->addAdditionalAreaView($view, $value, $data);
		}
	}
	
	protected function addDataForView($name, $data) {
		$this->_viewData[$name] = $data;	
	}
	
	protected function getDataForView() {
		return $this->_viewData;	
	}
	
	public function refresh($viewName, $params) {
		foreach ($this->VIEWS as $side => $view) {
			if ($view == $viewName) {
				$funcNameForRenderView = $this->__getFuncNameForRenderView($view);		
				$data = $this->$funcNameForRenderView($params);
				$this->load->view($viewName, $data);
				
				return;
			}
		}
	}
	
	private function __getFuncNameForRenderView($view) {
		$arrStr = explode("_", $view);
		$str = "";
		foreach ($arrStr as $st) {
			$str .= ucfirst($st);
		}
		return  "__getDataFor" . $str;
	}
}