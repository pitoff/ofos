<?php
	class Post{
		private $db;

		public function __construct(){
			$this->db = new Database();
		}

		public function getPostById($id){
			$this->db->query('SELECT * FROM posts WHERE id = :id');
			$this->db->bind(':id', $id);

			$row = $this->db->single();
			return $row;
		}

		public function deletePost($id){
			$this->db->query('DELETE FROM posts WHERE id = :id');
			$this->db->bind(':id', $id);
			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}


//get restaurant and category section
		public function getRestCatMenu(){
			$this->db->query("SELECT *, menu.food_category as menuFc, category.food_category as categoryFc, menu.rest_name as menurestName, user.rest_name as userrestName FROM menu INNER JOIN category ON menu.food_category = category.food_category INNER JOIN user ON menu.rest_name = user.rest_name");
			
			$getrestcatmenu = $this->db->resultSet();
			return $getrestcatmenu;

		}

		public function singlecat($food_category){
			$this->db->query("SELECT * FROM category WHERE food_category = :food_category");
			$this->db->bind(':food_category', $food_category);
			$row = $this->db->single();
			return $row;
		}

		public function alluserrestaurant($rest_name){
			$this->db->query("SELECT * FROM user rest_name = :rest_name");
			$this->db->bind(':rest_name', $rest_name);
			$row = $this->db->single();
			return $row;
		}
//section end



		public function getAllrestaurants(){
			$this->db->query("SELECT * FROM user WHERE role = 2");
			$allrestaurants = $this->db->resultSet();
			return $allrestaurants;
		}

		public function addcategory($data){
			$this->db->query("INSERT INTO category (user_id, food_category, rest_name) VALUES (:user_id, :food_category, :rest_name)");

			$this->db->bind(':user_id', $data['user_id']);
			$this->db->bind(':food_category', $data['food_category']);
			$this->db->bind(':rest_name', $data['rest_name']);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function getallcategory(){
			$this->db->query("SELECT * FROM category");
			$allrestaurants = $this->db->resultSet();
			return $allrestaurants;
		}

		public function addmenu($data){
			$this->db->query("INSERT INTO menu (user_id, rest_name, food_category, food, price, food_image) VALUES (:user_id, :rest_name, :food_category, :food, :price, :image)");

			$this->db->bind(':user_id', $data['user_id']);
			$this->db->bind(':rest_name', $data['rest_name']);
			$this->db->bind(':food_category', $data['food_category']);			
			$this->db->bind(':food', $data['food']);
			$this->db->bind(':price', $data['price']);
			$this->db->bind(':image', $data['food_image']);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function viewallmenu(){
			$this->db->query("SELECT * FROM menu");
			$allmenu = $this->db->resultSet();
			return $allmenu;
		}

		public function viewrestmenuwhereid($id){
			$this->db->query("SELECT * FROM menu WHERE user_id = :id");
			$this->db->bind(':id', $id);
			$allmenu = $this->db->resultSet();
			return $allmenu;
		}

		public function getmenubyid($id){
			$this->db->query("SELECT * FROM menu WHERE id = :id");
			$this->db->bind(':id', $id);
			 $row = $this->db->single();
			 return $row;
		}

		public function removefood($id){
			$this->db->query('DELETE FROM menu WHERE id = :id');
			$this->db->bind(':id', $id);
			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function updatemenu($data){
			$this->db->query("UPDATE menu SET rest_name = :rest_name, food_category = :food_category, food = :food, price = :price, food_image = :image WHERE id = :id");

			$this->db->bind(':id', $data['id']);
			$this->db->bind(':rest_name', $data['rest_name']);
			$this->db->bind(':food_category', $data['food_category']);			
			$this->db->bind(':food', $data['food']);
			$this->db->bind(':price', $data['price']);
			$this->db->bind(':image', $data['food_image']);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		// public function getnumofrestaurants(){
		// 	$this->db->query("SELECT count(*) FROM user WHERE role = 2");
		// 	$numofrestaurants = $this->db->resultSet();
		// 	return $numofrestaurants;
		// }

		public function eachrestaurant($id){
			$this->db->query("SELECT * FROM user WHERE id = :id");
			$this->db->bind(':id', $id);
			$row = $this->db->single();
			return $row;
		}

		public function getallrestaurantmenu(){
			$this->db->query("SELECT * FROM menu ORDER BY food_category");
			$allrestaurantmenu = $this->db->resultSet();
			return $allrestaurantmenu;
		}

		public function cart($data){
			$this->db->query("INSERT INTO food_order (user_id, user_name, food_id, food, quantity, price, rest_name, rest_id, orderdate) VALUES (:user_id, :user_name, :food_id, :food, :quantity, :price, :rest_name, :rest_id, :orderdate)");
			$this->db->bind(':user_id', $_SESSION['user_id']);
			$this->db->bind(':user_name', $_SESSION['firstname']);
			$this->db->bind(':food_id', $data['food_id']);
			$this->db->bind(':food', $data['name']);
			$this->db->bind(':quantity', $data['quantity']);
			$this->db->bind(':price', $data['price']);
			$this->db->bind(':rest_name', $data['rest_name']);
			$this->db->bind(':rest_id', $data['rest_id']);
			$this->db->bind(':orderdate', $data['orderdate']);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
			 		
		}

		public function adddelivery($data){
			$this->db->query("INSERT INTO delivery (user_id, delivery_landmark, delivery_addr, delivery_time, phone_number, payment_type, delivery_date) VALUES (:user_id, :dl, :da, :dt, :phone, :pt, :ddate)");
			$this->db->bind(':user_id', $_SESSION['user_id']);
			$this->db->bind(':dl', $data['lm']);
			$this->db->bind(':da', $data['addr']);
			$this->db->bind(':dt', $data['time']);
			$this->db->bind(':phone', $data['phone_number']);
			$this->db->bind(':pt', $data['payment_type']);
			$this->db->bind(':ddate', $data['date']);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
			 	
		}

		public function existingdelivery($id){
			$this->db->query("SELECT * FROM delivery WHERE user_id = :id");
			$this->db->bind(':id', $id);
			$row = $this->db->single();
			return $row;
		}

		public function delivery($id){
			$this->db->query("SELECT * FROM delivery WHERE user_id = :id");
			$this->db->bind(':id', $id);
			$row = $this->db->single();
			if ($this->db->rowCount() > 0) {
				return true;
			}else{
				return false;
			}
		}

		public function updatedelivery($data){
			$this->db->query("UPDATE delivery SET delivery_landmark = :dl, delivery_addr = :da, delivery_time = :dt, phone_number = :phone, payment_type = :pt, delivery_date = :ddate WHERE user_id = :id");

			$this->db->bind(':id', $data['user_id']);
			$this->db->bind(':dl', $data['lm']);
			$this->db->bind(':da', $data['addr']);			
			$this->db->bind(':dt', $data['time']);
			$this->db->bind(':phone', $data['phone_number']);
			$this->db->bind(':pt', $data['payment_type']);
			$this->db->bind(':ddate', $data['date']);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function getallorder(){
			$this->db->query("SELECT * FROM food_order");
			$getorder = $this->db->resultSet();
			return $getorder;
		}

		public function getdelivery(){
			$this->db->query("SELECT *, delivery.user_id as userDelivery, user.id as userId FROM delivery INNER JOIN user ON delivery.user_id = user.id");
			
			$getdelivery = $this->db->resultSet();
			return $getdelivery;

		}

		public function getrestorder(){
			$this->db->query("SELECT *, food_order.user_id as food_orderUserId, delivery.user_id as deliveryUserId FROM food_order INNER JOIN delivery on food_order.user_id = delivery.user_id");
			$getrestorder = $this->db->resultSet();
			return $getrestorder;
		}

		public function processStatus($data){
			$this->db->query('UPDATE food_order SET status = :status WHERE order_id = :id');

			$this->db->bind(':id', $data['id']);
			$this->db->bind(':status', $data['status']);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function insertProcessed($data){
			$this->db->query('INSERT INTO processed (user_id, rest_id, food, quantity, price, pdate) VALUES (:user_id, :rest_id, :food, :quantity, :price, :pdate)');
			$this->db->bind(':user_id', $data['user_id']);
			$this->db->bind(':rest_id', $_SESSION['user_id']);
			$this->db->bind(':food', $data['food']);
			$this->db->bind(':quantity', $data['quantity']);
			$this->db->bind(':price', $data['price']);
			$this->db->bind(':pdate', $data['pdate']);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function removeprocessedfood($id){
			$this->db->query('DELETE FROM food_order WHERE order_id = :id');
			$this->db->bind(':id', $id);
			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function getprocessed(){
			$this->db->query("SELECT * FROM processed");
			$getprocessed = $this->db->resultSet();
			return $getprocessed;
		}

		public function allprocessed(){
			$this->db->query("SELECT *, processed.rest_id as processedRestId, user.id as UserId FROM processed INNER JOIN user on processed.rest_id = user.id");
			$allprocessed = $this->db->resultSet();
			return $allprocessed;
		}

		public function getrestordercount(){
			$this->db->query("SELECT * FROM food_order WHERE status = '' AND rest_id = :rest_id");
			$this->db->bind(':rest_id', $_SESSION['user_id']);
			$count = $this->db->resultSet();
			$count1 = count($count);
			return $count1;
		}

		public function restorder($id){
			$this->db->query("SELECT * FROM user WHERE id = :id");
			$this->db->bind(':id', $id);
			$row = $this->db->single();
			return $row;
		}

		public function getprocesseddate($from, $to){
			$this->db->query("SELECT * FROM processed WHERE pdate BETWEEN :from_when AND :to_when");

			$this->db->bind(':from_when', $from);
			$this->db->bind(':to_when', $to);

			$result = $this->db->resultSet();
			return $result;

		}

		public function cardDetails($data){
			$this->db->query("UPDATE delivery SET C_name = :name, Cvv = :cvv, C_num = :card_number, C_expiry = :card_expiry, C_pin = :pin WHERE user_id = :id");

			$this->db->bind(':id', $_SESSION['user_id']);
			$this->db->bind(':name', $data['name']);
			$this->db->bind(':cvv', $data['cvv']);
			$this->db->bind(':card_number', $data['card_number']);
			$this->db->bind(':card_expiry', $data['card_expiry']);
			$this->db->bind(':pin', $data['pin']);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function getUserOrder($id){
			$this->db->query("SELECT *, food_order.rest_id as restId, processed.rest_id as processedRestId FROM processed INNER JOIN food_order on processed.rest_id = food_order.rest_id WHERE processed.user_id = :id ORDER BY processed.pdate DESC");
			$this->db->bind(':id', $id);
			$result = $this->db->resultSet();
			return $result;
		}

	}