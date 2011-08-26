<?php
require_once 'abstract_Controller.php';

class Account extends Abstract_Controller {
	protected function getAdminTab() {
		return 0;
	}
}