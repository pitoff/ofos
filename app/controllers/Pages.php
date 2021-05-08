<?php
// namespace app\controllers;

// use app\libraries\Controller;

	class Pages extends Controller{
		public function __construct(){
			$this->userModel = $this->model('User');
		}

		public function index(){
			if (isLoggedIn()) {
				redirect('users/dashboard');
			}
			$rest_img = $this->userModel->getrestimg();
			$data = [
				'title' => 'Welcome to homepage',
				'description' => 'this is our sharepost practice homepage',
				'restimg' => $rest_img
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