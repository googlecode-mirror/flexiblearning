<?php
require_once 'abstract_Controller.php';

class Banner extends Abstract_Controller {
    protected function getAdminTab() {
		return 2;
	}

	protected function hasAdminPermission() {
		return TRUE;
	}
	
	protected function addMoreDataForEditView($object) {
		$partners = $this->Partner_model->getAll(0, 0, array('Name' => 'asc'), NULL, '', FALSE);
		$this->addDataForView('partners', $partners);
		
		$positions = $this->config->item('banner_position');
		$this->addDataForView('positions', $positions);
		
		if ($object->IdResource) {
			$resource = $this->Resource_model->getById($object->IdResource);
			$object->ResourcePath = $resource->Path;
		} else {
			$object->ResourcePath = $this->config->item('default_banner');
		}
	}
	
	protected function setFormValidationForEditView() {
		$this->form_validation->set_rules('Name', 'lang:banner name', 'required|xss_clean');
		$this->form_validation->set_rules('Position', 'lang:position', '');
		$this->form_validation->set_rules('IdPartner', 'lang:partner', '');
	}
	
	protected function handleEditValidationSuccess($banner, $site = '') {
		if ($banner->Id == NULL) {
			$uplPath = $this->config->item('resource_folder') . '/banner';
	
			$uplConfig['upload_path'] = $uplPath;
			$uplConfig['allowed_types'] = $this->config->item('img_allowed_type');
			$uplConfig['max_size'] = $this->config->item('img_max_size');
			$uplConfig['max_width'] = $this->config->item('img_max_width');
			$uplConfig['max_height'] = $this->config->item('img_max_height');
	
			$this->load->library('upload', $uplConfig);
	
			if ($this->upload->do_upload('imgBanner')) {
				$data = $this->upload->data();
	
				$resource = new Resource_model();
				$resource->Path = $uplPath . '/' . $data['file_name'];
				$resourceId = $resource->save();
			} else {
				$this->addDataForView('err', $this->upload->display_errors('<div>', '</div>'));
				$this->template->load($this->template_admin, $this->getEditViewName(), $this->getDataForView());
				return;
			}
		    if (isset($resourceId)) {
		    	$banner->IdResource = $resourceId;
		    }
		}
	    parent::handleEditValidationSuccess($banner, $site);
	}
	
	protected function getObjectsForList($from = 0, $nObjPerPage = '') {
		$joinResource = array('table'=> 'resource', 'criteria'=> 'resource.Id = banner.IdResource', 'type' => 'join');
		$joinPartner = array('table'=> 'partner', 'criteria'=> 'partner.Id = banner.IdPartner', 'type' => 'join');
		
		$objects = $this->Banner_model->getAll($from, $nObjPerPage, array('UpdatedDate' => 'desc'), 
			array($joinResource, $joinPartner), array('Path', 'partner.Name as PartnerName'));
			
		$arrPosition = $this->config->item('banner_position');	
		foreach ($objects as $object) {
			$object->PositionName = $arrPosition[$object->Position];
		}	
		
		return $objects;
	}
	
	public function uploadBanner($Id = NULL) {
		if ($Id != NULL) {
			$banner_model = $this->Banner_model->getById($Id);

			if ($banner_model != NULL) {
				$uplPath = $this->config->item('resource_folder') . '/banner';
				$uplConfig['upload_path'] = $uplPath;
				$uplConfig['allowed_types'] = $this->config->item('img_allowed_type');
				$uplConfig['max_size'] = $this->config->item('img_max_size');
				$uplConfig['max_width'] = $this->config->item('img_max_width');
				$uplConfig['max_height'] = $this->config->item('img_max_height');
		
				$this->load->library('upload', $uplConfig);
		
				if ($this->upload->do_upload('imgBanner')) {
					$data = $this->upload->data();
		
					$resource = new Resource_model();
					$resource->Path = $uplPath . '/' . $data['file_name'];
					$resourceId = $resource->save();
		
					$oldResource = $this->Resource_model->getById($banner_model->IdResource);
					$banner_model->IdResource = $resourceId;
					$tempId = $banner_model->save();
					
					$oldResource->delete();
					
					echo base_url() . $resource->Path; 
				}
			}
		}
	}
}