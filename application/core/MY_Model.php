<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	public $rules = array();
	protected $_timestamps = FALSE;

	public function __construct() {
		parent::__construct();
	}
	
	/*--------------------------------------------------------------------------
		A generic get method to be used by all models. Pass an ID to search on
		a the primary key. Pass true in the second pararmeter to fetch a 
		single record. 	
	--------------------------------------------------------------------------*/
	public function get( $id = NULL, $single = FALSE, $limit = NULL, $offset = NULL, $num_rows = FALSE ) {
		if ($id != NULL) {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
		} elseif($single == TRUE ) {
			$method = 'row';
		} elseif($num_rows == TRUE) {
			$method = 'num_rows';
		} else {
			$method = 'result';
		}
		
		if (!count($this->db->ar_orderby)) {
			$this->db->order_by($this->_order_by);
		}

		return $this->db->get($this->_table_name, $limit, $offset)->$method();
	}

	/*--------------------------------------------------------------------------
		function()	
	--------------------------------------------------------------------------*/
	public function get_by($where, $single = FALSE, $limit = NULL, $offset = NULL, $num_rows = FALSE ){
		$this->db->where($where);
		return $this->get(NULL, $single, $limit, $offset, $num_rows);
	}

	/*--------------------------------------------------------------------------
		A generic save method to be used by all models. If no ID is provided
		then this will preform an insert else this will do an update. 
	--------------------------------------------------------------------------*/
	public function save($data, $id = NULL){
		//set timestamps
		// if ($this->_timestamps == TRUE) {
		// 	$now = date('Y-m-d H:i:s');
		// 	$id || $data['created'] = $now;
		// 	$data['modified'] = $now;
		// }

		//insert
		if ($id === NULL) {
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
		}

		//update 
		else {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->set($data);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
		}
		return $id;
	}

	/*--------------------------------------------------------------------------
		A generic delete method to be used in all model functions. 	
	--------------------------------------------------------------------------*/
	public function delete($id){
		$filter = $this->_primary_filter;
		$id = $filter($id);

		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}

	//This is function gets an array from post data
	public function array_from_post($fields, $xss = TRUE) {
		$data = array();
		foreach ($fields as $field) {
			$data[$field] = $this->input->post($field, $xss);
		}
		return $data;
	}
	/**
	 * Function: get_fields
	 * 
	 * This function will get the field names from the Table
	 * 
	 * Returns:
	 * 
	 *   return An array with the table names
	 */
	public function get_fields() {
		$fields = $this->db->query("DESCRIBE ".$this->_table_name)->result();
		$returnArr = array();
		
		foreach ($fields as $field)
			$returnArr[$field->Field] = $field->Field;

		return $returnArr;
	}
	/**
	 * Function: get_new
	 * 
	 * This function will get the array of fields the get_fields function and initialize them to NULL
	 * 
	 * Returns:
	 * 
	 *   return An array of newly minted fields
	 */
	public function get_new() {
		$fields = $this->get_fields();
		
		foreach ($fields as $field)
			$fields[$field] = NULL;

		$returnArr = (object) $fields;
		return $returnArr;
	}
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */