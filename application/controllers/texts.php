<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Texts extends CI_Controller {

	var $table = 'texts';

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

	private function texts($id)
	{
		$texts = $this->tdatabase->get_entry_where('id', $id, 'texts');
		return $texts;
	}

	private function comments($id)
	{
		$comments = 
			$this->tdatabase->get_entry_where('text_id', $id, 'comments');
		return $comments;
	}

	public function id($id=-1)
	{
		$data['errors'] = '';
		$data['pages'] = $this->pages();
		$data['comments'] = $this->comments($id);
		$data['text_id'] = $id;
		$this->load->view('pages.php', $data);
	}

	private function get_uloaded_form()
	{
		$data = array(
				'name' => $this->input->post('text_name'),
				'content' => $this->input->post('text_content'),
				'type' => $this->input->post('text_type'),
				'page_id' => $this->input->post('page_id'),
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

	public function remove($id) 
	{
		$this->tdatabase->remove_entry('id', $id); 
		redirect('pages');
	}

	public function index()
	{
	}
}

/* End of file Texts.php */
/* Location: ./application/controllers/texts.php */
