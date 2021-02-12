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
			$this->db->query("INSERT INTO user (role, surname, firstname, email, password, phonenumber, rest_name, landmark, addr) VALUES (2, :sn, :fn, :email, :password, :phonenumber, :rest_name, :landmark, :addr)");

			$this->db->bind(':sn', $data['sn']);
			$this->db->bind(':fn', $data['fn']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':password', $data['password']);
			$this->db->bind(':phonenumber', $data['phonenumber']);
			$this->db->bind(':rest_name', $data['rest_name']);
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

		public function getUserById($id){
			$this->db->query("SELECT * FROM user WHERE id = :id");
			$this->db->bind(':id', $id);
			 $row = $this->db->single();
			 return $row;
		}
	}