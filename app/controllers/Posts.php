<?php
	class Posts extends Controller{
		public function __construct(){
			if (!isLoggedIn()) {
				redirect('users/login');
			}

			$this->postModel = $this->model('Post');
			$this->userModel = $this->model('User');
		}

		public function index(){
			$posts = $this->postModel->fetchPost();
			$data = [
				'posts' => $posts
			];

			$this->view('posts/index', $data);
		}

		public function create(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$data = [
					'title' => trim($_POST['title']),
					'user_id' => $_SESSION['user_id'],
					'body' => trim($_POST['body']),
					'title_err' => '',
					'body_err' => ''
				];

				if (empty($data['title'])) {
					$data['title_err'] = 'title must not be empty';
				}
				if (empty($data['body'])) {
					$data['body_err'] = 'cannot post empty content';
				}

				if (empty($data['title_err']) && empty($data['body_err'])) {
					if($this->postModel->createPost($data)){
						flash('return_message', 'post has been created');
						redirect('posts');
					}else{
						die('something must have gone wrong');
					}
				}else{
					$this->view('posts/create', $data);
				}
			}else{
				$data = [
					'title' => '',
					'body' => '',
					'title_err' => '',
					'body_err' => ''
				];

				$this->view('posts/create', $data);
			}
			
		}


		public function edit($id){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				
				$data = [
					'id' => $id,
					'title' => trim($_POST['title']),
					'body' => trim($_POST['body']),
					'user_id' => $_SESSION['user_id'],
					'title_err' => '',
					'body_err' => ''
				];

				if (empty($data['title'])) {
					$data['title_err'] = 'title is empty';
				}
				if (empty($data['body'])) {
					$data['body_err'] = 'body is empty';
				}

				if (empty($data['title_err']) && empty($data['body_err'])) {
					if ($this->postModel->editPost($data)) {
						flash('return_message', 'your post has been updated');
						redirect('posts');
					}else{
						die('something might have gone wrong');
					}
				}else{
					$this->view('posts/edit', $data);
				}
			}else{
				$post = $this->postModel->getPostById($id);
				if ($post->user_id != $_SESSION['user_id']) {
					redirect('posts');
				}
				$data = [
					'id' => $id,
					'title' => $post->title,
					'body' => $post->body,
					'title_err' => '',
					'body_err' => ''
				];

				$this->view('posts/edit', $data);
			}
		}

		public function show($id){
			$posts = $this->postModel->getPostById($id);
			$users = $this->userModel->getUserById($posts->user_id);

			$data = [
				'posts' => $posts,
				'users' => $users
			];
			$this->view('posts/show', $data);
		}

		public function delete($id){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$post = $this->postModel->getPostById($id);

				if ($post->user_id != $_SESSION['user_id']) {
					redirect('posts');
				}

				if ($this->postModel->deletePost($id)) {
					flash('return_message', 'post have been deleted successfully');
					redirect('posts');
				}else{
					die('something went wrong');
				}
			}else{
				redirect('posts');
			}
		}
	}

	
