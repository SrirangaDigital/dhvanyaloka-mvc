<?php

class listing extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

		$this->books();
	}

	public function books() {

		$data = $this->model->listBooks();
		($data) ? $this->view('listing/books', $data) : $this->view('error/index');
	}	

	public function toc($book_id=DEFAULT_BOOK_ID) {

		$data = $this->model->listToc($book_id);
		($data) ? $this->view('listing/toc', $data) : $this->view('error/index');
	}
}

?>