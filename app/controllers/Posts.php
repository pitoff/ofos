<?php
	class Posts extends Controller{
		public function __construct(){
			if (!isLoggedIn()) {
				redirect('users/login');
			}

			$this->postModel = $this->model('Post');
			$this->userModel = $this->model('User');
		}

		public function eachrestaurant($id){
			$eachrestaurant = $this->postModel->eachrestaurant($id);
			$getallrestaurantmenu = $this->postModel->getallrestaurantmenu($eachrestaurant->id);
			$getallcat = $this->postModel->getallcategory($eachrestaurant->id);

			$data = [
				'getallrestaurantmenu' => $getallrestaurantmenu,
				'eachrestaurant' => $eachrestaurant,
				'allcat' => $getallcat	
			];

			if($data['eachrestaurant']->status == 'active'){
				$this->view('posts/eachrestaurant', $data);
			}else{
				flash('inactive', 'restaurant you are trying to access is inactive');
				redirect('users/dashboard');
			}

		}

		// public function eachrestaurantCat($food_category){			
		// 	$singlecategory = $this->postModel->singlecat($food_category);
		// 	$getrestcategorymenu = $this->postModel->getRestCatMenu();

		// 	$data = [
		// 		'singlecat' => $singlecategory,
		// 		'restcatmenu' => $getrestcategorymenu
		// 	];

		// 	$this->view('posts/eachrestaurantCat', $data);
		// }

		public function allrestaurants(){
			$getrestaurants = $this->postModel->getAllrestaurants();

			$data = [
				'allrestaurants' => $getrestaurants
			];
			$this->view('posts/allrestaurants', $data);
		}

		public function category($id){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data = [
					'user_id' => $id,
					'rest_name' => trim($_POST['rest_name']),
					'food_category' => trim($_POST['food_category'])
				];

				if (!empty($data['food_category'])) {
					if($this->postModel->addcategory($data)){
						redirect('posts/addmenu');
					}else{
						die('something went wrong');
					}
				}else{
						$this->view('posts/category', $data);
					}
			}else{
				$getuser = $this->userModel->getUserById($id);
				$getcategory = $this->postModel->getallcategory();
				$data = [
					
					'rest_name' => '',
					'food_category' => '',
					'getuser' => $getuser,
					'getcategory' => $getcategory
				];

				$this->view('posts/category', $data);
			}
		}

		public function addmenu(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$data = [
					'user_id' => $_SESSION['user_id'],
					'rest_name' => trim($_POST['rest_name']),
					'food_category' => trim($_POST['category']),
					'food' => trim($_POST['food']),
					'price' => trim($_POST['price']),
					'food_image' => trim($_FILES['food_image']['name'])
				];

				if (!empty($data['food_category']) && !empty($data['food']) && !empty($data['price']) && !empty($data['food_image'])) {
					$menu = $this->postModel->addmenu($data);
					$move = $this->upload();
						if ($menu && $move) {
							flash('menu_added', 'menu was added successfully');
							// echo "<script> alert ('menu has been added to your restaurant')</script>";
							redirect('posts/addmenu');
						}else{
							die('something went wrong');
						}
				}else{
					$this->view('posts/addmenu', $data);
				}

			}else{
				$getcategory = $this->postModel->getallcategory();
				$data = [
					'user_id' => $_SESSION['user_id'],
					'rest_name' => '',
					'food_category' => '',
					'food' => '',
					'price' => '',
					'food_image' => '',
					'getcategory' => $getcategory
				];
				$this->view('posts/addmenu', $data);
			}
		}

		public 	function upload(){
		$name = $_FILES['food_image']['name'];
		$tmp_name = $_FILES['food_image']['tmp_name'];
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

		public function removefood($id){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// $user = $this->userModel->getfoodById($id);

				if ($this->postModel->removefood($id)) {
					flash('menu_removed', 'menu has been removed');
					redirect('posts/addmenu');
				}else{
					die('something went wrong');
				}
			}else{
				redirect('posts/viewmenu');
			}
		}

		public function updatemenu($id){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$data = [
					'id' => $id,
					'user_id' => $_SESSION['user_id'],
					'rest_name' => trim($_POST['rest_name']),
					'food_category' => trim($_POST['category']),
					'food' => trim($_POST['food']),
					'price' => trim($_POST['price']),
					'food_image' => trim($_FILES['food_image']['name'])
				];

				if (!empty($data['food_category']) && !empty($data['food']) && !empty($data['price']) && !empty($data['food_image'])) {
					$menu = $this->postModel->updatemenu($data);
					$move = $this->upload();
						if ($menu && $move) {
							flash('menu_update', 'menu has been updated');
							// echo "<script> alert ('menu has been added to your restaurant')</script>";
							redirect('posts/addmenu');
						}else{
							die('something went wrong');
						}
				}else{
					$this->view('posts/updatemenu', $data);
				}

			}else{
				$getcategory = $this->postModel->getallcategory();
				$getmenu = $this->postModel->getmenubyid($id);
				
				$data = [
					'id' => $id,
					'rest_name' => '',
					'food_category' => '',
					'food' => $getmenu->food,
					'price' => $getmenu->price,
					'food_image' => '',
					'getcategory' => $getcategory
				];
				$this->view('posts/updatemenu', $data);
			}
		}

		public function viewmenu($id){
			$getuser = $this->userModel->getUserById($id);
			$getallmenu = $this->postModel->viewallmenu($this->userModel->getUserById($id));
			$getrestmenu = $this->postModel->viewrestmenuwhereid($id);
			$data = [
				'user' => $getuser,
				'getallmenu' => $getallmenu,
				'restmenu' => $getrestmenu
			];
			$this->view('posts/viewmenu', $data);
		}

		public function add_cart($id){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			    if (isset($_SESSION['food_cart'])) {
			    $item_array_id = array_column($_SESSION['food_cart'], 'food_id');
			    if (!in_array($id, $item_array_id)) {
			    	$count = 0;
			        $count = count($_SESSION['food_cart']);
			        $data = [
				        'food_id' => $id,
				        'rest_id' => $_POST['hidden_rest_id'],
				        'rest_name' => $_POST['hidden_rest_name'],
				        'food_quantity' => $_POST['food_quantity'],
				        'food_name' => $_POST['hidden_food_name'],
				        'food_price' => $_POST['hidden_food_price']
			        ];
			        $_SESSION['food_cart'][$id] = $data;
			        redirect('posts/cart');
			    }else {
			    	flash('already_incart', 'food already added to cart');
			      // redirect('posts/eachrestaurant');
			    	redirect('posts/cart');
			    }
			  }else{
			    $data = [
			        'food_id' => $id,
			        'rest_id' => $_POST['hidden_rest_id'],
			        'rest_name' => $_POST['hidden_rest_name'],
			        'food_quantity' => $_POST['food_quantity'],
				    'food_name' => $_POST['hidden_food_name'],
				    'food_price' => $_POST['hidden_food_price']
			      ];
			    $_SESSION['food_cart'][0] = $data;
			   	redirect('posts/cart');
			  }
			}
		}

		public function cart(){
			if (isset($_SESSION['food_cart'])) {
				$this->view('posts/cart');

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				foreach ($_SESSION['food_cart'] as $keys => $values) {
					// $eachrestaurant = $this->postModel->eachrestaurant($id);
				 	$data = [
				 		// 'rest_id' => $eachrestaurant,
				 		'rest_id' => $values['rest_id'],
				 		'rest_name' => $values['rest_name'],
				 		'food_id' => $values['food_id'],
			      		'name' => $values['food_name'],
			      		'quantity' => $values['food_quantity'],
			      		'price' => $values['food_price'],
			      		'orderdate' =>date('d-m-Y')
				 	];

				 	$addorder = $this->postModel->cart($data);
						if ($addorder) {
							echo "<script>alert ('order has been sent please proceed to checkout') </script>";
							$this->view('posts/cart');
						}else{
							die('something is not right');
						}
				}
			}
			}else{
				redirect('users/dashboard');
			}
		}

		public function checkout(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data = [
					'lm' => trim($_POST['lm']),
					'addr' => trim($_POST['addr']),
					'time' => trim($_POST['time']),
					'phone_number' => trim($_POST['phone_number']),
					'payment_type' => trim($_POST['payment_type']),
					'date' => date('d-m-Y')
				];

				if (!empty($data['lm']) && !empty($data['addr']) && !empty($data['time']) && !empty($data['phone_number']) && !empty($data['payment_type'])) {
					// $new_time = $data['time'] + $ex
					$adddelivery = $this->postModel->adddelivery($data);
					if ($adddelivery && ($data['payment_type']) == 'credit_card') {
						redirect('posts/card_details');
					}elseif ($adddelivery && ($data['payment_type']) == 'cash on delivery') {
						redirect('posts/printorder');
					}else{
						die('something went wrong');
					}
				}else{
					$this->view('posts/checkout', $data);
				}
			}else{
				$id = $_SESSION['user_id'];
				$getuser = $this->userModel->getUserById($id);
				$getexistingdelivery = $this->postModel->existingdelivery($getuser->id);

				$data = [
					'user_id' => $id,
					'lm' => '',
					'addr' => '',
					'time' => '',
					'phone_number' => '',
					'payment_type' => ''
				];
				$this->view('posts/checkout', $data);
			}
		}

		public function checkout1(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data = [
					'user_id' => $_SESSION['user_id'],
					'lm' => trim($_POST['lm']),
					'addr' => trim($_POST['addr']),
					'time' => trim($_POST['time']),
					'phone_number' => trim($_POST['phone_number']),
					'payment_type' => trim($_POST['payment_type']),
					'date' => date('d-m-Y')
				];

				if (!empty($data['lm']) && !empty($data['addr']) && !empty($data['time']) && !empty($data['phone_number']) && !empty($data['payment_type'])) {
					$adddelivery = $this->postModel->updatedelivery($data);
					if ($adddelivery && ($data['payment_type']) == 'credit_card') {
						redirect('posts/card_details');
					}elseif ($adddelivery && ($data['payment_type']) == 'cash on delivery') {
						redirect('posts/printorder');
					}else{
						die('something went wrong');
					}
				}else{
					$this->view('posts/checkout1', $data);
				}
			}else{
				$id = $_SESSION['user_id'];
				$getuser = $this->userModel->getUserById($id);
				$getexistingdelivery = $this->postModel->existingdelivery($getuser->id);

				$data = [
					'user_id' => $id,
					'lm' => $getexistingdelivery->delivery_landmark,
					'addr' => $getexistingdelivery->delivery_addr,
					'time' => '',
					'phone_number' => $getexistingdelivery->phone_number,
					'payment_type' => ''
				];
				$this->view('posts/checkout1', $data);
			}
		}

		public function card_details(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data = [
					'name' => trim($_POST['name']),
					'cvv' => trim($_POST['cvv']),
					'card_number' => $_POST['card_number'],
					'card_expiry' => $_POST['card_expiry'],
					'pin' => $_POST['pin']
				];
				if ($this->postModel->cardDetails($data)) {
					redirect('posts/printorder');
				}else{
					die('something went wrong');
				}
			}else{
				$data = [
					'name' => '',
					'cvv' => '',
					'card_number' => '',
					'card_expiry' => '',
					'pin' => ''
				];
				$this->view('posts/card_details', $data);
			}
		}

		public function printorder(){
			$id = $_SESSION['user_id'];
			$getdelivery = $this->postModel->getdelivery();
			$getorder = $this->postModel->getallorder();
			$data = [
				'id' => $_SESSION['user_id'],
				'getorder' => $getorder,
				'getdelivery' => $getdelivery
			];

			$this->view('posts/printorder', $data);
		}

		public function unset(){
			if (isset($_SESSION['food_cart'])) {
			
				$id = $_SESSION['user_id'];
				$getuser = $this->userModel->getUserById($id);
				$getexistingdelivery = $this->postModel->delivery($getuser->id);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				foreach ($_SESSION['food_cart'] as $keys => $values) {
					unset($_SESSION['food_cart'][$keys]);
					
					if($getexistingdelivery){
						redirect('posts/checkout1');
					}else{
						redirect('posts/checkout');
					}
				}
			}
			}else{
				redirect('users/dashboard');
			}	
		}


		public function removefromcart($id){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if (!empty($_SESSION['food_cart'])) {
				foreach ($_SESSION['food_cart'] as $keys => $values) {
			     if ($values['food_id'] == $id) {
			       	unset($_SESSION['food_cart'][$keys]);
			       	flash2('removed', 'food item has been removed');
			        redirect('posts/cart');
			     }
			   	}
			   }
			}
		}

		public function restorder(){
			$id = $_SESSION['user_id'];
			$restorder = $this->postModel->restorder($id);
			$ordercount = $this->postModel->getrestordercount($id);			
			$getorder = $this->postModel->getrestorder();
			$data = [
				'restorder' => $restorder,
				'ordercount' => $ordercount,
				'getorder' => $getorder
			];
			$this->view('posts/restorder', $data);

		}

		public function processfood($id){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$data = [
					'id' => $id,
					'user_id' => $_POST['user_id'],
					'status' => trim($_POST['status']),
					'food' => $_POST['food'],
					'quantity' => $_POST['quantity'],
					'price' => $_POST['price'],
					'pdate' => date('Y-m-d') 
				];
				if ($this->postModel->processStatus($data) && $this->postModel->insertProcessed($data)) {
					redirect('posts/restorder');
				}else{
					die('something might have gone wrong');
				}
			}else{
				$this->view('posts/restorder');
			}
		}


		public function removeprocessedfood($id){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				if ($this->postModel->removeprocessedfood($id)) {
					redirect('posts/restorder');
				}else{
					die('something went wrong');
				}
			}else{
				$this->view('posts/restorder');
			}
		}

		public function processed(){
			$id = $_SESSION['user_id'];
			$getprocessed = $this->postModel->getprocessed($id);
			$allprocessed = $this->postModel->allprocessed();
			$data = [
				'getprocessed' => $getprocessed,
				'allprocessed' => $allprocessed
			];
			$this->view('posts/processed', $data);
		}

		public function getprocesseddate(){
			if (isset($_GET['from']) && isset($_GET['to'])) {
				$data = [
					'from' => $_GET['from'],
					'to' => $_GET['to']
				];
				$get = $this->postModel->getprocesseddate($data['from'], $data['to']);
				if ($get) {
					$data = [
						'from' => $_GET['from'],
						'to' => $_GET['to'],
						'get' => $get
					];
					$this->view('posts/getprocesseddate', $data);
				}else{
					die('i could not select');
				}
				$this->view('posts/getprocesseddate', $data);
			}	
		}

		public function completed_order($id){
			$userOrder = $this->postModel->getUserOrder($id);
			$data = [
				'userOrder' => $userOrder
			];
			$this->view('posts/completed_order', $data);
		}



	}

	
