<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('grocery_CRUD');
	}

	public function _content_output($output = null)
	{
		$this->load->view('edit_content.php',(array)$output);
	}

	public function add_article()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('news');
			$crud->columns('id','title','author','date','content','image','category');
			
			$crud->set_subject('article');
			$crud->field_type('category','multiselect',
            array('sports' => 'sports', 'art' => 'art','culture' => 'culture' , 'health' => 'health', 'f1' => 'f1', 'politics' => 'politics', 'wheather' => 'wheather', 'advice' => 'advice', 'economy' => 'economy', 'household' => 'household', 'travel' => 'travel'));
			$crud->set_field_upload('image','assets/uploads/images');

			$output = $crud->render();

			$this->_content_output($output);
	}



	
	

}
