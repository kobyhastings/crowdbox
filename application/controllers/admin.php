<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

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

	public function __construct()
	{
		 parent::__construct();
		// $this->is_logged_in();
	}

	public function index()
	{
		$this->data['main_content'] = 'admin/index';
	}

	public function create_event()
	{
		$this->load->view('admin/create_event');
	}

	public function save_event()
	{
		$this->load->view('admin/save_event');
	}

	public function dashboard() {
		$this->data['main_content'] = 'admin/dashboard';
		$this->load->model('events_model');
		$this->data['events'] = $this->events_model->get_by(array('eventcode'=>'LAHACKS'));
		$this->load->view('public/_layout_main', $this->data);
	}

	public function eventView($eventid) {
		$this->load->model('events_model');
		$this->data['event'] = $this->events_model->get($eventid);
		$this->data['main_content'] = 'admin/eventView';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function storeSongs() {
		$jsonStr = $_POST['tracks'];
		$tracks = json_decode($jsonStr, true);
		$this->load->model('event_tracks_model');
		foreach ($tracks as $track) {
			$array = array(
					'name' => $track['name'],
					'artist' => $track['artist'],
					'album' => $track['album'],
					'duration' => $track['duration'],
					'key' => $track['key'],
					'icon400' => $track['icon400'],
					'eventid' => 1
				);
			$this->event_tracks_model->save($array);
		}
		echo "done";
		die();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */