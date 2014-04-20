<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->data['main_content'] = 'signin/index';
		$this->load->view('public/_layout_main', $this->data);
	}

	public function verify() {
		$this->load->model('users_model');
		$valid = $this->users_model->get_by(array('username' => $_POST['username'], 'password' => md5($_POST['password'])), TRUE);
		if ($valid) {
			$array = array(
				'username' => $valid->username,
				'email' => $valid->email,
				'userid' => $valid->id
			);
			$this->session->set_userdata($array);
			redirect('admin/dashboard');
		} else {
			$this->session->sess_destroy();
			return FALSE;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */