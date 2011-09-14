<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller {

	var $table = 'comments';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('tdatabase_model', 'tdatabase');
		$this->load->helper(array('form', 'url'));
	}

	private function get_uloaded_form()
	{
		$data = array(
				'content' => $this->input->post('comment_content'),
				'text_id' => $this->input->post('text_id'),
				);
		return $data;
	}

	public function add() 
	{
		$form_data = $this->get_uloaded_form();
		$data['errors'] = '';
		if (empty($form_data['errors'])) {
			$this->tdatabase->insert_entry($form_data);
		}
		redirect('pages');
	}

	public function index()
	{
	}
}

/* End of file Comments.php */
/* Location: ./application/controllers/comments.php */
