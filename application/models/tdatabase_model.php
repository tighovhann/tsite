<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tdatabase_model extends CI_Model {

	var $CI;

	function __constructor()
	{
		parent::__constructor();
	}

	function insert_entry($data, $table="", $column="")
	{
		$this->CI =& get_instance();
		if (empty($table)) {
			$table = $this->CI->table;
		}
		if(! empty($column)) {
			$this->CI->db->where($column, $data[$column]); 
			$query = $this->CI->db->get_where($table);
			if ($query->num_rows() > 0) {
				return false;
			}
		}
		
		$this->CI->db->set($data); 

		if(!$this->CI->db->insert($table)) {
			return false;						
		}
	} 

	function update_entry($data, $table="", $column="id")
	{
		$this->CI =& get_instance();
		if (empty($table)) {
			$table = $this->CI->table;
		}
		$this->CI->db->where($column, $data[$column]);
		$this->CI->db->update($table, $data); 
	}

	function remove_entry($column, $value, $table='')
	{
		$this->CI =& get_instance();
		if (empty($table)) {
			$table = $this->CI->table;
		}
		if(empty($column)) {
			return false;
		}
		$this->db->delete($table, array($column => $value)); 
	}

	function get_entry_where($column="", $value="", $table="")
	{
		$this->CI =& get_instance();

		if (empty($table)) {
			$table = $this->CI->table;
		}
		if (! empty($column)) {
			$this->CI->db->where($column, $value); 
			$query = $this->CI->db->get_where($table);
			
			if ($query->num_rows() == 0) {
				return false;
			}
		} else {
			$query = $this->CI->db->get($table);
		}
		$result_array[0] = $query->first_row('array');
		for($i = 1; $i < $query->num_rows(); $i++) {
			$result_array[$i] = $query->next_row('array');
		}
		$query->free_result();
		return $result_array;
	}

	function get_entry($table="")
	{
		$this->CI =& get_instance();

		if (empty($table)) {
			$table = $this->CI->table;
		}
		$query = $this->CI->db->get($table);
		$result_array[0] = $query->first_row('array');
		for($i = 1; $i < $query->num_rows(); $i++) {
			$result_array[$i] = $query->next_row('array');
		}
		$query->free_result();
		return $result_array;
	}

}

?>
