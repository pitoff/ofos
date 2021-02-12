<?php
	class Users extends Controller{
		public function __construct(){
			$this->userModel = $this->model('User');
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
						;
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
					'rest_lm' => trim($_POST['rest_lm']),
					'rest_addr' => trim($_POST['rest_addr']),
					'password' => trim($_POST['password']),
					'confirm_password' => trim($_POST['confirm_password']),
					'phonenumber' => trim($_POST['phonenumber']),
					'sn_err' => '',
					'fn_err' => '',
					'email_err' => '',
					'rest_name_err' => '',
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

				if (empty($data['sn_err']) && empty($data['fn_err']) && empty($data['email_err']) && empty($data['rest_name_err']) && empty($data['rest_lm_err']) && empty($data['rest_addr_err']) && empty($data['phonenumber_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
					$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
					if ($this->userModel->restaurantsignup($data)) {
						;
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
					'rest_lm' => '',
					'rest_addr' => '',
					'password' => '',
					'confirm_password' => '',
					'phonenumber' => '',
					'sn_err' => '',
					'fn_err' => '',
					'email_err' => '',
					'rest_name_err' => '',
					'rest_lm_err' => '',
					'rest_addr_err' => '',
					'password_err' => '',
					'confirm_password_err' => '',
					'phonenumber_err' => ''
				];
				$this->view('users/restaurantsignup', $data);
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
			$_SESSION['name'] = $user->name;
			redirect('posts/index');
		}

		public function logout(){
			unset($_SESSION['user_id']);
			unset($_SESSION['email']);
			unset($_SESSION['name']);
			session_destroy();
			redirect('users/login');
		}
	}