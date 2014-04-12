<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	function __construct() {
		parent::__construct();

		//Call the is_logged_in function which is located in MY_Controller
		$this->is_logged_in();

	}
}

/* End of file Admin_Controller.php */
/* Location: ./application/libraries/Admin_Controller.php */