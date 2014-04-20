<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends MY_Controller {

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
		$this->data['main_content'] = 'signup/index';
		$this->load->view('public/_layout_main', $this->data);
	}

	public function createUser() {
		if($_POST) {
			$this->load->model('users_model');
			$newUser = $this->users_model->array_from_post(array('email', 'username'));
			$newUser['password'] = md5($this->input->post('password'));
			$userid = $this->users_model->save($newUser);
			$this->session->sess_destroy();
			$array = array(
				'is_logged_in' => TRUE,
				'username' => $_POST['username'],
				'email' => $_POST['email'],
				'userid' => $userid
			);
			$this->session->set_userdata($array);
		}
		
		$this->load->view('admin/index');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */