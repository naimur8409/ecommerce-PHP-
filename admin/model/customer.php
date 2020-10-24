<?php
class Customer extends DbConnection{
	
	public $id;
	public $name;
	public $phone;
	public $email;
	public $company;
	public $address;
	public $city;
	public $postcode;
	public $country;
	public $state;
	public $news_subscribe;
	public $password;
	public $status;
	public $newsletter;
	public $facebook_id;

	private $table_name="customer";
	public function __construct(){
		 parent::__construct();
	}
	
	public function getCustomers(){
		
		$sql = "SELECT * FROM ".$this->table_name;
		$query = $this->db->query($sql);
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}

	public function getCustomerById($id){
		
		$sql = "SELECT * FROM ".$this->table_name." WHERE id=?";
		$query = $this->db->prepare($sql);
		$query->execute([$id]);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}
	
		public function getCustomerByFacebookId($facebook_id, $email){
		
		$sql = "SELECT * FROM ".$this->table_name." WHERE facebook_id=? OR email=?";
		$query = $this->db->prepare($sql);
		$query->execute([$facebook_id, $email]);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}

	public function getCustomerByEmail($email){
		
		$sql = "SELECT * FROM ".$this->table_name." WHERE email=?";
		$query = $this->db->prepare($sql);
		$query->execute([$email]);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}

	
	
	public function save(){
		
		$sql = "INSERT INTO ".$this->table_name."(name, email, phone, company, address, city, postcode, country, state, news_subscribe, password, status, facebook_id) VALUES(?, ?, ?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?)";
		$query = $this->db->prepare($sql);
		$query->execute([$this->name, $this->email,$this->phone, $this->company, $this->address, $this->city, $this->postcode, $this->country, $this->state, $this->news_subscribe, $this->password, $this->status, $this->facebook_id]);
		
		return $this->db->lastInsertId();
		
	}
	
	public function update($id){
		
$sql = "UPDATE ".$this->table_name." SET name=?, email=?, phone=?, company=?, address=?, city=?, postcode=?, country=?, state=? news_subscribe=? WHERE id=?";
$query = $this->db->prepare($sql);
$query->execute([$this->name, $this->email,$this->phone, $this->company, $this->address, $this->city, $this->postcode, $this->country, $this->state, $this->news_subscribe, $id]);

		return $update ? true : false;
		
	}


		public function updatePassword($id){
		
		$sql = "UPDATE ".$this->table_name." SET password=? WHERE id=?";
		$query = $this->db->prepare($sql);
		$query->execute([$this->password, $id]);

				return $update ? true : false;
		
	}

	
	
	public function delete($id){
		
		$sql = "DELETE FROM ".$this->table_name." WHERE id=?";
		$query = $this->db->prepare($sql);
		$delete = $query->execute([$id]);
		return $delete ? true : false;
		
	}

	public function newsLetter(){
		
		$sql = "INSERT INTO newsletters(email) VALUES(?)";
		$query = $this->db->prepare($sql);
		$query->execute([$this->newsletter]);
		return $this->db->lastInsertId();
	}





	
	
	
}



?>