<?php
	class Users extends Controller{
		public function __construct(){
			$this->userModel = $this->model('User');
			$this->postModel = $this->model('Post');
			$this->mail = new Mail;
		}

		public function register(){
			$this->view('users/register');
		}

		public function regularsignup(){
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				#process form
				//sanitize post data
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$data = [
					'sn' => trim($_POST['sn']),
					'fn' => trim($_POST['fn']),
					'email' => trim($_POST['email']),
					'password' => trim($_POST['password']),
					'confirm_password' => trim($_POST['confirm_password']),
					'phonenumber' => trim($_POST['phonenumber']),
					'sn_err' => '',
					'fn_err' => '',
					'email_err' => '',
					'password_err' => '',
					'confirm_password_err' => '',
					'phonenumber_err' => ''
				];

				if (empty($data['sn'])) {
					$data['sn_err'] = 'Please enter sur name';
				}
				if (empty($data['fn'])) {
					$data['fn_err'] = 'Please enter first name';
				}
				if (empty($data['email'])) {
					$data['email_err'] = 'Enter email address';
				}else{
					if ($this->userModel->findUserByEmail($data['email'])) {
						$data['email_err'] = 'Email is already taken';
					}
				}
				if (empty($data['phonenumber'])) {
					$data['phonenumber_err'] = 'Please enter your phonenumber';
				}
				if (empty($data['password'])) {
					$data['password_err'] = 'Please enter password';
				}elseif (strlen($data['password']) < 3) {
					$data['password_err'] = 'password must be at least 3 xters';
				}
				if (empty($data['confirm_password'])) {
					$data['confirm_password_err'] = 'Please confirm password';
				}elseif (($data['password']) != ($data['confirm_password'])) {
					$data['confirm_password_err'] = 'Password does not match';
				}

				if (empty($data['sn_err']) && empty($data['fn_err']) && empty($data['email_err']) && empty($data['phonenumber_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
					$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
					if ($this->userModel->regularsignup($data)) {
						flash('register_ok', 'Sign up was successful, you can now login');
						redirect('users/login');
					}else{
						die('something went wrong');
					}
				}else{
					$this->view('users/regularsignup', $data);
				}
			}else{
				$data = [
					'sn' => '',
					'fn' => '',
					'email' => '',
					'password' => '',
					'confirm_password' => '',
					'phonenumber' => '',
					'sn_err' => '',
					'fn_err' => '',
					'email_err' => '',
					'password_err' => '',
					'confirm_password_err' => '',
					'phonenumber_err' => ''
				];
				$this->view('users/regularsignup', $data);
			}
		}

		public function restaurantsignup(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				#process form
				//sanitize post data
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$data = [
					'sn' => trim($_POST['sn']),
					'fn' => trim($_POST['fn']),
					'email' => trim($_POST['email']),
					'rest_name' => trim($_POST['rest_name']),
					'rest_img' => trim($_FILES['rest_img']['name']),
					'rest_desc' => trim($_POST['rest_desc']),
					'rest_lm' => trim($_POST['rest_lm']),
					'rest_addr' => trim($_POST['rest_addr']),
					'password' => trim($_POST['password']),
					'confirm_password' => trim($_POST['confirm_password']),
					'phonenumber' => trim($_POST['phonenumber']),
					'sn_err' => '',
					'fn_err' => '',
					'email_err' => '',
					'rest_name_err' => '',
					'rest_img_err' => '',
					'rest_lm_err' => '',
					'rest_addr_err' => '',
					'password_err' => '',
					'confirm_password_err' => '',
					'phonenumber_err' => ''
				];

				if (empty($data['sn'])) {
					$data['sn_err'] = 'Please enter sur name';
				}
				if (empty($data['fn'])) {
					$data['fn_err'] = 'Please enter first name';
				}
				if (empty($data['email'])) {
					$data['email_err'] = 'Enter email address';
				}else{
					if ($this->userModel->findUserByEmail($data['email'])) {
						$data['email_err'] = 'Email is already taken';
					}
				}
				if (empty($data['rest_name'])) {
					$data['rest_name_err'] = 'Please enter restaurant name';
				}
				if (empty($data['rest_lm'])) {
					$data['rest_lm_err'] = 'Please enter restaurant landmark';
				}
				if (empty($data['rest_addr'])) {
					$data['rest_addr_err'] = 'Please enter restaurant address';
				}
				if (empty($data['phonenumber'])) {
					$data['phonenumber_err'] = 'Please enter your phonenumber';
				}
				if (empty($data['rest_img'])) {
					$data['rest_img_err'] = 'Please upload restaurant photo';
				}
				if (empty($data['password'])) {
					$data['password_err'] = 'Please enter password';
				}elseif (strlen($data['password']) < 3) {
					$data['password_err'] = 'password must be at least 3 xters';
				}
				if (empty($data['confirm_password'])) {
					$data['confirm_password_err'] = 'Please confirm password';
				}elseif (($data['password']) != ($data['confirm_password'])) {
					$data['confirm_password_err'] = 'Password does not match';
				}

				if (empty($data['sn_err']) && empty($data['fn_err']) && empty($data['email_err']) && empty($data['rest_name_err']) && empty($data['rest_lm_err']) && empty($data['rest_addr_err']) && empty($data['phonenumber_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['rest_img_err'])) {
					$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
					if ($this->userModel->restaurantsignup($data) && $this->upload()) {
						flash('register_ok', 'Sign up was successful, you can now login');
						redirect('users/login');
					}else{
						die('something went wrong');
					}
				}else{
					$this->view('users/restaurantsignup', $data);
				}
			}else{
				$data = [
					'sn' => '',
					'fn' => '',
					'email' => '',
					'rest_name' => '',
					'rest_img' => '',
					'rest_desc' => '',
					'rest_lm' => '',
					'rest_addr' => '',
					'password' => '',
					'confirm_password' => '',
					'phonenumber' => '',
					'sn_err' => '',
					'fn_err' => '',
					'email_err' => '',
					'rest_name_err' => '',
					'rest_img_err' => '',
					'rest_lm_err' => '',
					'rest_addr_err' => '',
					'password_err' => '',
					'confirm_password_err' => '',
					'phonenumber_err' => ''
				];
				$this->view('users/restaurantsignup', $data);
			}
		}

		public 	function upload(){
		$name = $_FILES['rest_img']['name'];
		$tmp_name = $_FILES['rest_img']['tmp_name'];
		// $size = $_FILES['food_image']['size'];
		// $max_length = 5000000; 
		$extension = strtolower(substr($name, strpos($name, '.')+1));	
			$location = '../public/image/';
			if ($extension=='jpg' || $extension=='jpeg'){
				if (move_uploaded_file($tmp_name, $location.$name)) {
					return true;
				}else{
					return false;
				}
			}
		}

		public function login(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data = [
					'email' => trim($_POST['email']),
					'password' => trim($_POST['password']),
					'email_err' => '',
					'password_err' => ''
				];

				if (empty($data['email'])) {
					$data['email_err'] = 'please enter email address';
				}
				if (empty($data['password'])) {
					$data['password_err'] = 'please enter password';
				}

				if ($this->userModel->findUserByEmail($data['email'])) {
					//user found
				}else{
					$data['email_err'] = 'no user found';
				}

				if (empty($data['email_err']) && empty($data['password_err'])) {
					$loggedInUser = $this->userModel->login($data['email'], $data['password']); 
					if ($loggedInUser) {
						$this->mail->send('login', $data['surname']. 'login was successful', $data['email']);
						$this->createUserSession($loggedInUser);
					}else{
						$data['password_err'] = 'password is invalid';

						$this->view('users/login', $data);
					}
				}else{
					$this->view('users/login', $data);
				}
			}else{
				$data = [
					'email' => '',
					'password' => '',
					'email_err' => '',
					'password_err' => ''
				];
				$this->view('users/login', $data);
			}
		}

		public function createUserSession($user){
			$_SESSION['user_id'] = $user->id;
			$_SESSION['email'] = $user->email;
			$_SESSION['firstname'] = $user->firstname;
			$_SESSION['surname'] = $user->surname;
			$_SESSION['role'] = $user->role;
			$_SESSION['rest_name'] = $user->rest_name;
			$_SESSION['status'] = $user->status;

			if (($_SESSION['role'] == 2) && ($_SESSION['status'] == '')) {
				flash('inactive', 'your restaurant has not been activated');
				redirect('users/login');
			}else{
				redirect('users/dashboard');
			}
		}

		public function dashboard(){
			if (!isLoggedIn()) {
				redirect('users/login');
			}
			$id = $_SESSION['user_id'];
			$user = $this->userModel->getUserById($id);
			$getrestaurants = $this->postModel->getAllrestaurants();
			$getrestaurantcount = $this->userModel->getrestaurantcount();
			$getusercount = $this->userModel->getusercount();
			$menucount = $this->userModel->menucount();
			$getprocessedcount = $this->userModel->processedcount();
			$restmenucount = $this->userModel->restmenucount($id);
			$getrestprocessedcount = $this->userModel->restprocessedcount($id);
			$data = [
				'getuserbyid' => $user,
				'count' => $getrestaurantcount,
				'usercount' => $getusercount,
				'menucount' => $menucount,
				'processedcount' => $getprocessedcount,
				'allrestaurants' => $getrestaurants,
				'restmenucount' => $restmenucount,
				'restprocessedcount' => $getrestprocessedcount
			];
			$this->view('users/dashboard', $data);
		}

		

		public function updatereststatus($id){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$data = [
					'id' => $id,
					'status' => trim($_POST['status'])
				];
				if ($this->userModel->updatereststatus($data)) {
					redirect('posts/allrestaurants');
				}else{
					die('something might have gone wrong');
				}
			}else{
				$this->view('posts/allrestaurants');
			}
		}

		public function deactivaterest($id){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$data = [
					'id' => $id,
					'status' => trim($_POST['deactivate'])
				];
				if ($this->userModel->deactivaterest($data)) {
					redirect('posts/allrestaurants');
				}else{
					die('something might have gone wrong');
				}
			}else{
				$this->view('posts/allrestaurants');
			}
		}

		public function updaterest($id){
			if (!isLoggedIn()) {
				redirect('users/login');
			}
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$data = [
					'id' => $id,
					'surname' => trim($_POST['surname']),
					'firstname' => trim($_POST['firstname']),
					'email' => trim($_POST['email']),
					'phonenumber' => trim($_POST['phonenumber']),
					'landmark' => trim($_POST['landmark']),
					'addr' => trim($_POST['addr']),
					'desc' => trim($_POST['desc']),
					'rest_img' => trim($_FILES['rest_img']['name']),
				];
				$updaterest = $this->userModel->updaterest($data);
				if ($updaterest && $this->upload()) {
					flash('updated', 'restaurant info has been updated');
					redirect('posts/allrestaurants');
				}else{
					die('something went wrong');
				}
				$this->view('users/updaterest', $data);
			}else{
				$getrestinfo = $this->userModel->getUserById($id);
				$data = [
					'id' => $id,
					'surname' => $getrestinfo->surname,
					'firstname' => $getrestinfo->firstname,
					'email' =>  $getrestinfo->email,
					'phonenumber' =>  $getrestinfo->phonenumber,
					'landmark' =>  $getrestinfo->landmark,
					'addr' =>  $getrestinfo->addr,
					'desc' =>  $getrestinfo->rest_desc,
					'rest_img' =>  $getrestinfo->rest_image,
				];
				$this->view('users/updaterest', $data);
			}
		}
		
		public function deleterestaurant($id){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				if ($this->userModel->deleterestaurant($id)) {
					redirect('posts/allrestaurants');
				}else{
					die('something went wrong');
				}
			}else{
				$this->view('posts/allrestaurants');
			}
		}


		public function logout(){
			unset($_SESSION['user_id']);
			unset($_SESSION['email']);
			unset($_SESSION['firstname']);
			unset($_SESSION['surname']);
			unset($_SESSION['role']);
			unset($_SESSION['rest_name']);
			unset($_SESSION['status']);
			session_destroy();
			redirect('users/login');
		}

		public function profile($id){
			if (!isLoggedIn()) {
				redirect('users/login');
			}
			$restaurantprofile = $this->userModel->getUserById($id);
			$data = [
				'restprofile' => $restaurantprofile
			];
			$this->view('users/profile', $data);
		}

		public function allusers(){
			if (!isLoggedIn()) {
				redirect('users/login');
			}
			$alluser = $this->userModel->getAllUser();
			$data = [
				'allusers' => $alluser
			];
			$this->view('users/allusers', $data);
		}
	}