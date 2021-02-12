<?php
	class Pages extends Controller{
		public function __construct(){
			
		}

		public function index(){
			if (isLoggedIn()) {
				redirect('posts');
			}
			$data = [
				'title' => 'Welcome to homepage',
				'description' => 'this is our sharepost practice homepage'
			];


			
			$this->view('pages/index', $data);
		}

		public function about(){
			$data = [
				'title' => 'Welcome to about page'
			];

			$this->view('pages/about', $data);
		}
	}