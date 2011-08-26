<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();
		
		private $arrAdditionalAreaName = array();
		private $arrAdditionalViewData = array();
		
		public function set($name, $value) {
			$this->template_data[$name] = $value;
		}
	
		public function load($template = '', $view = '' , $view_data = array(), $return = FALSE) {               
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));	
			if (count($this->arrAdditionalAreaName) > 0) {
				foreach ($this->arrAdditionalAreaName as $additionalAreaName => $value) {
					$this->set($additionalAreaName, $this->CI->load->view($value, $this->arrAdditionalViewData[$additionalAreaName], TRUE));
				}
			}		
			return $this->CI->load->view($template, $this->template_data, $return);
		}
		
		public function addAdditionalAreaView($areaName, $view, $view_data) {
			$this->arrAdditionalAreaName[$areaName] = $view;
			$this->arrAdditionalViewData[$areaName] = $view_data;
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */