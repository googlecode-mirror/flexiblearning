<?php
require_once 'base_controller.php';

abstract class Abstract_Controller extends Base_Controller {
	protected $template_view = 'template';
	protected $template_admin = 'template_admin';
	
	// declare object's name or view name for the common controller
	protected function getListName() {
		return lcfirst(get_class($this)) . 's';
	}
	
	protected function getModelName() {
		return get_class($this) . '_model';
	}
	
	protected function getEditViewName() {
		return lcfirst(get_class($this)) . '/edit-view';
	}
	
	protected function getViewListName() {
		return lcfirst(get_class($this)) . '/list-view';
	}
	
	protected function getViewAdminName() {
		return lcfirst(get_class($this)) . '/admin-view';
	}
	
	protected function getViewName() {
		return lcfirst(get_class($this));
	}
	
	protected function getModelVariableName() {
		return lcfirst(get_class($this)) . '_model';
	}

	protected function prepareDataForListView($page = '') {
		$className = $this->getModelName();
		
		$nTotalObject = $this->countObjectsForList();
		$nObjectPerPage = $this->config->item('number_of_object_list_page');
		$nTotalPage = (int)(($nTotalObject - 1)/$nObjectPerPage) + 1;
		
		if ($page == '') {
			$page = 1;
		}
		
		$objects = $this->getObjectsForList($page, $nObjectPerPage);
		
		$this->addDataForView($this->getListName(), $objects);
		$this->addDataForView('page', $page);
		$this->addDataForView('nTotalObject', $nTotalObject);
		$this->addDataForView('nObjectPerPage', $nObjectPerPage);
		$this->addDataForView('nTotalPage', $nTotalPage);	
			
		$this->addReferenceDataForListView();
	}
	
	protected function getObjectsForList($page = '', $nObjPerPage = '') {
		$className = $this->getModelName();
		if ($page == '') {
			if (!property_exists($className, $this->getStateKey())) {
				$objects = $this->$className->getAll();
			} else {
				
			}
		} else {
			$from = ($page - 1) * $nObjPerPage;
			$objects = $this->$className->getAll($from, $nObjPerPage, NULL, NULL);
		}
		return $objects;
	}
	
	public function index($page = '') {
		$this->prepareDataForListView($page);
		$this->load->view($this->getViewListName(), $this->getDataForView());
	}
	
	protected function addMoreDataForObjectInViewView($object, $page) {
		return $object;
	}
	
	public function view($Id, $page = '') {
		$className = $this->getModelName();
		$object = $this->$className->getById($Id);
		if ($object) {
			$object = $this->addMoreDataForObjectInViewView($object, $page);
			$this->addDataForView($this->getModelVariableName(), $object);
			if ($page == '') {
				$page = 1;	
			}
			$this->addDataForView('page', $page);
			
			$this->template->load($this->template_view, $this->getViewName(), $this->getDataForView());
		}
	}
	
	public function delete($page = '') {
		$Id = $this->input->post('Id');
		if (isset($Id)) {
			$className = $this->getModelName();
			$object = $this->$className->getById($Id);
			if ($object) {
				if ($this->$className->delete($Id)) {
					$notifyMessage = ucfirst(sprintf($this->config->item('delete_successfully'), 
						$this->$className->getText(), 
						$object->getDisplayName()));
					$this->addDataForView('notifyMessage', $notifyMessage);	 
					$this->prepareDataForListView($page);
				} else {
					$errorMessage = ucfirst(sprintf($this->config->item('delete_fail'), $this->$className->getText(), 
						$this->$className->getDisplayName()));
					$this->prepareDataForListView($page);
					$this->addDataForView('errorMessage', $errorMessage);
				}
			} else {
				$errorMessage = ucfirst(sprintf($this->config->item('item_not_exist')));
				$this->addDataForView('errorMessage', $errorMessage);	 
			}
			$site = $this->input->get(SITE);
			if ($site == ADMIN) {
				$this->template->load($this->template_admin, $this->getViewAdminName(), $this->getDataForView());
			} else {
				$this->template->load($this->template_view, $this->getViewListName(), $this->getDataForView());	
			}
		}
	}
	
	public function admin($page = '') {
		$this->addDataForView('page_links', $this->pagination->create_links());
		
		$this->prepareDataForAdminListView($page);
		$this->template->load($this->template_admin, $this->getViewAdminName(), $this->getDataForView());
	}
	
	protected function prepareDataForAdminListView($page = '') {
		$this->prepareDataForListView($page);
	}
	
	protected function countObjectsForList() {
		$className = $this->getModelName();
		return $this->$className->getCount();
	}
	
	protected function addReferenceDataForListView() {
	}
	
	protected function addMoreDataForEditView() {
	}
	
	protected function setFormValidationForEditView() {
	}
	
	protected function handleEditValidationSuccess($object, $site = '') {
		$objectId = $object->save();
		if ($objectId != -1) {
			if ($site != ADMIN) {
				redirect('/' . lcfirst(get_class($this)) . '/view/' . $objectId);
			} else {
				$this->prepareDataForAdminListView();
				$notifyMessage = ucfirst(sprintf($this->config->item('save_successfully'), 
					$object->getText(),	$object->getDisplayName()));
				$this->addDataForView('notifyMessage', $notifyMessage);
				$this->template->load($this->template_admin, $this->getViewAdminName(), $this->getDataForView());
			}
		}
	}
	
	public function edit($Id = '') {
		$className = $this->getModelName();
		if ($Id != '') {
			$object = $this->$className->getById($Id);	
		} else {
			$object = new $className();
		}
		$object->setDataFromInput($this->input->post());
		$this->addDataForView($this->getModelVariableName(), $object);
		
		$this->addMoreDataForEditView();
		
		$this->setFormValidationForEditView();
		
		$site = $this->input->get(SITE);
		if ($this->form_validation->run() == FALSE) {
			if ($site == ADMIN) {
				$this->template->load($this->template_admin, $this->getEditViewName(), $this->getDataForView());
			} else {
				$this->template->load($this->template_view, $this->getEditViewName(), $this->getDataForView());
			}
			
		} else {
			$this->handleEditValidationSuccess($object, $site);
		}
	}
}