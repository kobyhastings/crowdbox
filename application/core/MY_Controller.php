<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data = array();
	
	function __construct() {
		parent::__construct();
		$this->data['site_name'] = config_item('site_name');
		$this->data['errors'] = array();
		$this->uploadPath = realpath(APPPATH . "../uploads");
	}

	public function is_logged_in() {
		//if not logged in, redirect the user somewhere
		if($this->session->userdata('is_logged_in') == 0)
			redirect('home');
		else
			return TRUE;
	}

	/*--------------------------------------------------------------------------
		encode($id) used througout controllers to encrypt and double url  
		encode an ID to be passed through the url. We double url encode to 
		avoid additional '/' in the encrypted ID. This would break the uri 
		segments in codeigniter. 	
	--------------------------------------------------------------------------*/
	public function encode($id) {
		$id = $this->encrypt->encode($id);
		$id = urlencode($id);
		$id = urlencode($id);
		return $id;
	}

	/*--------------------------------------------------------------------------
		decode() rolls back the encryption used on a variable with the encode 
		function. Note we have to double url decode. 
	--------------------------------------------------------------------------*/
	public function decode($id) {
		$id = urldecode($id);
		$id = urldecode($id);
		$id = $this->encrypt->decode($id);
		return $id;
	}
}

require(APPPATH.'libraries/Admin_Controller.php');

/* End of file My_Controller.php */
/* Location: ./application/core/My_Controller.php */