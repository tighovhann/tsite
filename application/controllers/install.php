<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include "./inc/install_def.php";

class Install extends CI_Controller {

	var $db_name = 'tsite';

	private function __install_a_table($table_name, $fields) 
	{
		$name = $this->db_name. ".". $table_name;
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_field($fields);
		$this->dbforge->create_table($name, TRUE);
	}

	private function install_tables()
	{
		GLOBAL $users_fields;
		$this->__install_a_table('users', $users_fields);
		GLOBAL $pages_fields;
		$this->__install_a_table('pages', $pages_fields);
		GLOBAL $texts_fields;
		$this->__install_a_table('texts', $texts_fields);
		GLOBAL $comments_fields;
		$this->__install_a_table('comments', $comments_fields);
		GLOBAL $news_fields;
		$this->__install_a_table('news', $news_fields);
	}

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->dbforge();
		$this->load->dbutil();
		$this->load->database();
		$this->install_tables();
	}
}

/* End of file install.php */
/* Location: ./application/controllers/install.php */
