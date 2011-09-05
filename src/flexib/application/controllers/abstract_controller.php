<?php
require_once 'base_controller.php';

abstract class Abstract_Controller extends Base_Controller {
	protected $template_view = 'template';
	protected $template_admin = 'template_admin';
	protected $pagingConfig;

	protected function initializeForLib() {
		parent::initializeForLib();

		$this->pagingConfig['per_page'] = $this->config->item('number_of_object_list_page');
		$this->pagingConfig['page_query_string'] = FALSE;
	}

	protected function hasAdminPermission() {
		return FALSE;
	}
	
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

	protected function prepareDataForListView($from = 0) {
		$className = $this->getModelName();

		$this->pagingConfig['total_rows'] = $this->countObjectsForList();
		$objects = $this->getObjectsForList($from, $this->pagingConfig['per_page']);

		$this->addDataForView($this->getListName(), $objects);
		$this->addReferenceDataForListView();
	}

	protected function getObjectsForList($from = 0, $nObjPerPage = '') {
		$className = $this->getModelName();
		$objects = $this->$className->getAll($from, $nObjPerPage, array('UpdatedDate' => 'desc'), NULL);
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

	public function delete() {
		$Id = $this->input->post('Id');
		$from = $this->uri->segment(3);
		if (isset($Id)) {
			$className = $this->getModelName();
			$object = $this->$className->getById($Id);
			if ($object) {
				if ($this->$className->delete($Id)) {
					$notifyMessage = ucfirst(sprintf($this->config->item('delete_successfully'),
					$this->$className->getText(),
					$object->getDisplayName()));
					$this->addDataForView('notifyMessage', $notifyMessage);
					$this->prepareDataForListView($from);
				} else {
					$errorMessage = ucfirst(sprintf($this->config->item('delete_fail'), $this->$className->getText(),
					$this->$className->getDisplayName()));
					$this->prepareDataForListView($from);
					$this->addDataForView('errorMessage', $errorMessage);
				}
			} else {
				$errorMessage = ucfirst(sprintf($this->config->item('item_not_exist')));
				$this->addDataForView('errorMessage', $errorMessage);
			}
			$site = $this->input->get(SITE);
			if ($site == ADMIN) {
				$this->pagingConfig['base_url'] = site_url(lcfirst(get_class($this)). '/admin');
				$this->pagination->initialize($this->pagingConfig);
				$this->addDataForView('page_links', $this->pagination->create_links());
				$this->template->load($this->template_admin, $this->getViewAdminName(), $this->getDataForView());
			} else {
				$this->pagingConfig['base_url'] = site_url(lcfirst(get_class($this)));
				$this->pagination->initialize($this->pagingConfig);
				$this->addDataForView('page_links', $this->pagination->create_links());
				$this->template->load($this->template_view, $this->getViewListName(), $this->getDataForView());
			}
		}
	}

	
	public function admin() {
		if ($this->hasAdminPermission()) {
			$from = $this->uri->segment(3);
			$this->prepareDataForAdminListView($from);
			
			$this->pagingConfig['base_url'] = site_url(lcfirst(get_class($this)). '/admin');
			$this->pagination->initialize($this->pagingConfig);
			$this->addDataForView('page_links', $this->pagination->create_links());
			
			$this->template->load($this->template_admin, $this->getViewAdminName(), $this->getDataForView());
		} else {
			echo 'You are not allowed to access this page !!!';
		}
	}

	protected function prepareDataForAdminListView($from = '') {
		$this->prepareDataForListView($from);
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
		if ($object->save() != -1) {
			if ($site != ADMIN) {
				redirect('/' . lcfirst(get_class($this)) . '/view/' . $objectId);
			} else {
				$this->prepareDataForAdminListView();
				$this->loadViewForAdminEditSuccessfully($object);
			}
		}
	}
	
	protected function loadViewForAdminEditSuccessfully($object) {
		$notifyMessage = ucfirst(sprintf($this->config->item('save_successfully'),
		$object->getText(),	$object->getDisplayName()));
		$this->addDataForView('notifyMessage', $notifyMessage);

		$this->pagingConfig['uri_segment'] = 4;
		$this->pagingConfig['base_url'] = site_url(lcfirst(get_class($this)). '/admin');
		$this->pagination->initialize($this->pagingConfig);
		$this->addDataForView('page_links', $this->pagination->create_links());

		$this->template->load($this->template_admin, $this->getViewAdminName(), $this->getDataForView());
	}

	public function edit($Id = '') {
		$className = $this->getModelName();
		if ($Id != '') {
			$object = $this->$className->getById($Id);
		} else {
			$object = new $className();
		}
		$site = $this->input->get(SITE);
		if ($object != NULL) {
			$this->setFormValidationForEditView();
			$this->addMoreDataForEditView();
			
			if ($this->form_validation->run() == FALSE) {
				$this->addDataForView($this->getModelVariableName(), $object);
				if ($site == ADMIN) {
					$this->template->load($this->template_admin, $this->getEditViewName(), $this->getDataForView());
				} else {
					$this->template->load($this->template_view, $this->getEditViewName(), $this->getDataForView());
				}
			} else {
				$object->setDataFromInput($this->input->post());
				$this->addDataForView($this->getModelVariableName(), $object);
				$this->handleEditValidationSuccess($object, $site);
			}
		} 
	}
}