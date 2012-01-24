<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	var $table = 'news';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('tdatabase_model', 'tdatabase');
		$this->load->helper(array('form', 'url'));
	}

	private function news()
	{
		$news = $this->tdatabase->get_entry('news');
		return $news;
	}

	private function comments($id)
	{
		$comments = 
			$this->tdatabase->get_entry_where('text_id', $id, 'comments');
		return $comments;
	}

	private function pages()
	{
		$pages = $this->tdatabase->get_entry('pages');
		return $pages;
	}

	public function id($id)
	{
		$data['errors'] = '';
		$data['pages'] = $this->pages();
		$data['news'] = $this->news($id);
		$data['news_id'] = $id;
        $this->parser->parse("pages.tpl", $data);
	}

	private function get_uloaded_form()
	{
		$data = array(
			'name' => $this->input->post('news_name'),
			'content' => $this->input->post('news_content'),
			);
		return $data;
	}

	public function add() 
	{
		$form_data = $this->get_uloaded_form();
		$data['errors'] = '';
		print_r($form_data);
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

/* End of file News.php */
/* Location: ./application/controllers/news.php */
