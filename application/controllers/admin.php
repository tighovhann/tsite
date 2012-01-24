<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	var $table = 'comments';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('tdatabase_model', 'tdatabase');
		$this->load->helper(array('form', 'url'));
	}

	private function pages()
	{
		$pages = $this->tdatabase->get_entry('pages');
		return $pages;
	}

	public function index()
	{
		$data['pages'] = $this->pages();
        $this->parser->parse("admin.tpl", $data);
	}
}

/* End of file Comments.php */
/* Location: ./application/controllers/comments.php */
