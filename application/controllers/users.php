<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	var $table = 'users';

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
				'name' => $this->input->post('user_name'),
				'password' => $this->input->post('user_password'),
				'email' => $this->input->post('user_email'),
				);
		return $data;
	}

	private function pages()
	{
		$pages = $this->tdatabase->get_entry('pages');
		return $pages;
	}

	private function texts($pid)
	{
		$texts = $this->tdatabase->get_entry_where('page_id', $pid, 'texts');
		return $texts;
	}

	private function news()
	{
		$news = $this->tdatabase->get_entry('news');
		return $news;
	}

	public function add() 
	{
		$form_data = $this->get_uloaded_form();
		$data['errors'] = '';
		if (empty($form_data['errors'])) {
			$this->tdatabase->insert_entry($form_data);
			redirect('pages');
		} else {
			$data['errors'] = $form_data['errors'];
			$data['pages'] 	= $this->pages();
			$data['news'] 	= $this->news();
            $this->parser->parse("pages.tpl", $data);
		}
	}

	public function remove($id) 
	{
		$this->tdatabase->remove_entry('id', $id); 
		redirect('pages');
	}

	public function id($id=-1)
	{
		$data['errors'] = '';
		$data['pages'] = $this->pages();
		$data['texts'] = $this->texts($id);
		$data['page_id'] = $id;
		$data['news'] 	= $this->news();
        $this->parser->parse("pages.tpl", $data);
	}

	public function index()
	{
		$data['pages'] = $this->pages();
		$data['root_page'] = 'true';
		$data['news'] = $this->news();
        $this->parser->parse("pages.tpl", $data);
	}
}

/* End of file Users.php */
/* Location: ./application/controllers/users.php */
