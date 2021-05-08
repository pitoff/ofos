<?php
	class User{
		private $db;

		public function __construct(){
			$this->db = new Database;
		}

		public function regularsignup($data){
			$this->db->query("INSERT INTO user (role, surname, firstname, email, password, phonenumber) VALUES (3, :sn, :fn, :email, :password, :phonenumber)");

			$this->db->bind(':sn', $data['sn']);
			$this->db->bind(':fn', $data['fn']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':password', $data['password']);
			$this->db->bind(':phonenumber', $data['phonenumber']);

			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}

		public function restaurantsignup($data){
			$this->db->query("INSERT INTO user (role, surname, firstname, email, password, phonenumber, rest_name, rest_image, rest_desc, landmark, addr) VALUES (2, :sn, :fn, :email, :password, :phonenumber, :rest_name, :rest_img, :rest_desc, :landmark, :addr)");

			$this->db->bind(':sn', $data['sn']);
			$this->db->bind(':fn', $data['fn']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':password', $data['password']);
			$this->db->bind(':phonenumber', $data['phonenumber']);
			$this->db->bind(':rest_name', $data['rest_name']);
			$this->db->bind(':rest_img', $data['rest_img']);
			$this->db->bind(':rest_desc', $data['rest_desc']);
			$this->db->bind(':landmark', $data['rest_lm']);
			$this->db->bind(':addr', $data['rest_addr']);
			$this->db->bind(':addr', $data['rest_addr']);

			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}

		public function login($email, $password){
			$this->db->query("SELECT * FROM user WHERE email = :email");
			$this->db->bind(':email', $email);
			$row = $this->db->single();

			$hashed_password = $row->password;
			if (password_verify($password, $hashed_password)) {
				return $row;
			}else{
				return false;
			}
		}

		public function findUserByEmail($email){
			$this->db->query("SELECT * FROM user WHERE email = :email");
			$this->db->bind(':email', $email);
			$row = $this->db->single();
			if ($this->db->rowCount() > 0) {
				return true;
			}else{
				return false;
			}

		}

		public function updatereststatus($data){
			$this->db->query('UPDATE user SET status = :status WHERE id = :id');

			$this->db->bind(':id', $data['id']);
			$this->db->bind(':status', $data['status']);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function deactivaterest($data){
			$this->db->query('UPDATE user SET status = :status WHERE id = :id');

			$this->db->bind(':id', $data['id']);
			$this->db->bind(':status', $data['status']);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function updaterest($data){
			$this->db->query('UPDATE user SET surname = :sn, firstname = :fn, email = :email, phonenumber = :phonenumber, landmark = :landmark, addr = :addr, rest_desc = :rest_desc, rest_image = :rest_img WHERE id = :id');

			$this->db->bind(':id', $data['id']);
			$this->db->bind(':sn', $data['surname']);
			$this->db->bind(':fn', $data['firstname']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':phonenumber', $data['phonenumber']);
			$this->db->bind(':landmark', $data['landmark']);
			$this->db->bind(':addr', $data['addr']);
			$this->db->bind(':rest_desc', $data['desc']);
			$this->db->bind(':rest_img', $data['rest_img']);
			
			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function deleterestaurant($id){
			$this->db->query('DELETE FROM user WHERE id = :id');
			$this->db->bind(':id', $id);
			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function getUserById($id){
			$this->db->query("SELECT * FROM user WHERE id = :id");
			$this->db->bind(':id', $id);
			 $row = $this->db->single();
			 return $row;
		}

		public function getAllUser(){
			$this->db->query("SELECT * FROM user WHERE role = 3");
			$result = $this->db->resultSet();
			return $result;
		}

		public function getrestaurantcount(){
			$this->db->query("SELECT * FROM user WHERE role = 2");
			$count = $this->db->resultSet();
			$count1 = count($count);
			return $count1;
		}

		public function getusercount(){
			$this->db->query("SELECT * FROM user WHERE role = 3");
			$count = $this->db->resultSet();
			$usercount = count($count);
			return $usercount;
		}

		public function processedcount(){
			$this->db->query("SELECT * FROM processed");
			$count = $this->db->resultSet();
			$processedcount = count($count);
			return $processedcount;
		}

		public function menucount(){
			$this->db->query("SELECT * FROM menu");
			$count = $this->db->resultSet();
			$menucount = count($count);
			return $menucount;
		}

		public function restprocessedcount($id){
			$this->db->query("SELECT * FROM food_order where rest_id = :id");
			$this->db->bind(':id', $id);
			$count = $this->db->resultSet();
			$processedcount = count($count);
			return $processedcount;
		}

		public function restmenucount($id){
			$this->db->query("SELECT * FROM menu where user_id = :id");
			$this->db->bind(':id', $id);
			$count = $this->db->resultSet();
			$menucount = count($count);
			return $menucount;
		}

		public function getrestimg(){
			$this->db->query("SELECT * FROM user where role = 2");
			$result = $this->db->resultSet();
			return $result;
		}



}


		