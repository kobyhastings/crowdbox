<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends MY_Controller {

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
	public function index()
	{
		$this->load->model('event_tracks_model');
		if($_POST) {
			//store posted event code
			$eventcode = $_POST['eventcode'];
			//check db if event exists
			$this->load->model('events_model');
			$this->data['event'] = $this->events_model->get_by(array('eventcode' => $eventcode), TRUE);
			if($this->data['event']) {
				//event exists so load the event view
				$this->data['main_content'] = 'event/eventView';
				$this->load->model('current_tracks_model');
				$tracks = $this->current_tracks_model->get_by(array('eventid'=>$this->data['event']->id, 'live'=>1), TRUE);
				if($tracks)
					$this->data['tracks'] = $tracks;
				else
					$this->data['tracks'] = NULL;
				$this->load->view('event/_layout_main', $this->data);
			} else {
				$this->data['main_content'] = 'public/index';
				$this->load->view('public/_layout_main', $this->data);
			}
		} else {
			redirect('home');
		}
	}

	public function beginEvent($eventid) {
		//set event as began
		$this->load->model('events_model');
		$updateArr = array('begin'=>date('Y-m-d H:i:s'));
		$this->events_model->save($updateArr, $eventid);
		$this->load->model('events_model');
		$this->data['event'] = $this->events_model->get($eventid);
		//get first 4 songs and start a random song
		$this->load->model('event_tracks_model');
		$tracks = $this->event_tracks_model->get_by(array('eventid' => $eventid));
		$randTracks = array_rand($tracks, 5);
		$selectedTracks = array();
		foreach ($randTracks as $randTrack) {
			$selectedTracks[] = $this->event_tracks_model->get($randTrack);
		}

		shuffle($selectedTracks);
		$trackToPlay = array_pop($selectedTracks);

		//store tracks in current tracks table
		$array = array('nowplaying' => $trackToPlay->id, 'live' => 1, 'eventid' => $eventid);
		$i=1;

		foreach ($selectedTracks as $track) {
			switch ($i) {
				case 1:
					$array['upcomingone'] = $track->id;
					break;

				case 2:
					$array['upcomingtwo'] = $track->id;
					break;

				case 3:
					$array['upcomingthree'] = $track->id;
					break;
				
				default:
					$array['upcomingfour'] = $track->id;
					break;
			}
			$i++;
		}
		$this->load->model('current_tracks_model');
		$this->current_tracks_model->save($array);

		$this->data['trackToPlay'] = $trackToPlay;
		$this->data['nextTracks'] = $selectedTracks;
		$this->data['main_content'] = 'admin/eventView';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function getNextTrack() {
		$this->load->model('current_tracks_model');
		$this->load->model('event_tracks_model');
		//get currenttracks for the event
		$this->db->order_by('id', 'desc');
		$this->db->select('votesone, votestwo, votesthree, votesfour');
		$currenttracks = $this->current_tracks_model->get_by(array('eventid'=>1, 'live'=>1), TRUE);
		$currenttracks = (array)$currenttracks;
		asort($currenttracks);

		// $updateArr = array('live' => 0);
		// $this->db->where('eventid', 1)->where('live' => 1);
		// $this->db->update('Table', $object);

		foreach ($currenttracks as $key => $winner) {
			switch ($key) {
				case 'votesone':
					$this->db->order_by('id', 'desc');
					$this->db->select('upcomingone');
					$this->db->where('live', 1);
					$winner = $this->db->get('currenttracks', 1)->row();
					$winnerID = $winner->upcomingone;
					echo $this->event_tracks_model->get($winnerID)->key; die();
					break;

				case 'votestwo':
					$this->db->order_by('id', 'desc');
					$this->db->select('upcomingtwo');
					$this->db->where('live', 1);
					$winner = $this->db->get('currenttracks', 1)->row();
					$winnerID = $winner->upcomingtwo;
					echo $this->event_tracks_model->get($winnerID)->key; die();
					break;

				case 'votesthree':
					$this->db->order_by('id', 'desc');
					$this->db->select('upcomingthree');
					$this->db->where('live', 1);
					$winner = $this->db->get('currenttracks', 1)->row();
					$winnerID = $winner->upcomingthree;
					echo $this->event_tracks_model->get($winnerID)->key; die();
					break;
				
				default:
					$this->db->order_by('id', 'desc');
					$this->db->select('upcomingfour');
					$this->db->where('live', 1);
					$winner = $this->db->get('currenttracks', 1)->row();
					$winnerID = $winner->upcomingfour;
					echo $this->event_tracks_model->get($winnerID)->key; die();
					break;
			}
		}
	}


	public function voteone() {
		$this->load->model('current_tracks_model');
		$this->db->order_by('id', 'desc');
		$entry = $this->current_tracks_model->get_by(array('eventid'=>1, 'live'=>1), TRUE);
		$updateArr = array('votesone'=>$entry->votesone++);
		$this->current_tracks_model->save($updateArr, $entry->id);
	}

	public function votetwo() {
		
	}

	public function votethree() {
		
	}

	public function votefour() {
		
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */