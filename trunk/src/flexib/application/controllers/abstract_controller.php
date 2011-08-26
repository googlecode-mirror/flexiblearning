<?php
require_once 'base_controller.php';

abstract class Abstract_Controller extends Base_Controller {
	protected $template_view = 'template';
	protected $template_admin = 'template_admin';
	
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

	protected function getObjectsForList($page = '', $nObjPerPage = '') {
		$className = $this->getModelName();
		if ($page == '') {
			$objects = $this->$className->getAll();
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
	
	public function admin($page = '') {
		$this->prepareDataForAdminListView($page);
		
		$this->template->load($this->template_admin, $this->getViewAdminName(), $this->getDataForView());
	}
	
	protected function addMoreDataForObjectInViewView($object, $page) {
		return $object;
	}
	
	public function view($id, $page = '') {
		$className = $this->getModelName();
		$object = $this->$className->getById($id);
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
	
	public function delete($id, $page = '') {
		$className = $this->getModelName();
		$object = $this->$className->getById($id);
		if ($object) {
			if ($this->$className->delete($id)) {
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
		$this->load->view($this->getViewListName(), $this->getDataForView());
	}
	
	public function delete_admin($id, $page = '') {
		$className = $this->getModelName();
		$object = $this->$className->getById($id);
		if ($object) {
			if ($this->$className->delete($id)) {
				$notifyMessage = ucfirst(sprintf($this->config->item('delete_successfully'), 
					$this->$className->getText(), 
					$object->getDisplayName()));
				$this->addDataForView('notifyMessage', $notifyMessage);	 
				$this->prepareDataForAdminListView($page);
			} else {
				$errorMessage = ucfirst(sprintf($this->config->item('delete_fail'), $this->$className->getText(), 
					$this->$className->getDisplayName()));
				$this->prepareDataForAdminListView($page);
				$this->addDataForView('errorMessage', $errorMessage);
			}
		} else {
			$errorMessage = ucfirst(sprintf($this->config->item('item_not_exist')));
			$this->addDataForView('errorMessage', $errorMessage);	 
		}
		$this->load->view($this->getViewAdminName(), $this->getDataForView());
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
	
	protected function handleEditValidationSuccess($object) {
		$objectId = $object->save();
		if ($objectId != -1) {
			redirect('/' . lcfirst(get_class($this)) . '/view/' . $objectId);
		}
	}
	
	public function edit($id = '') {
		$className = $this->getModelName();
		if ($id != '') {
			$object = $this->$className->getById($id);	
		} else {
			$object = new $className();
		}
		$object->setDataFromInput($this->input->post());
		$this->addDataForView($this->getModelVariableName(), $object);
		
		$this->addMoreDataForEditView();
		
		$this->setFormValidationForEditView();
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view($this->getEditViewName(), $this->getDataForView());
		} else {
			$this->handleEditValidationSuccess($object);
		}
	}
}