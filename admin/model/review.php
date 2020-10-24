<?php
class Review extends DbConnection{
	
	public $product_id;
	public $customer_id;
	public $customer_name;
	public $review;
	public $rating;
	public $status;
	private $table_name="review_rating";
	
	public function __construct(){
		 parent::__construct();
	}
	
	public function getRewiew(){
		
		$sql = "SELECT * FROM ".$this->table_name;
		$query = $this->db->query($sql);
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}

    public function getActiveReview($product_id){
        $id = 1;
        $sql = "SELECT * FROM ".$this->table_name." WHERE status=? AND product_id=?";
        $query = $this->db->prepare($sql);
        $query->execute([1, $product_id]);
        $data = $query->fetchALL(PDO::FETCH_ASSOC);
        return $data ? $data : [];


    }


	public function getReviewById($id){
		$sql = "SELECT * FROM ".$this->table_name." WHERE id=?";
		$query = $this->db->prepare($sql);
		$query->execute([$id]);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
	}
	
	public function save(){
		
		$sql = "INSERT INTO ".$this->table_name."(product_id, customer_id, customer_name, review, ratting) VALUES(?, ?, ?, ?, ?)";
		$query = $this->db->prepare($sql);

		$query->execute([$this->product_id, $this->customer_id, $this->customer_name, $this->review, $this->rating]);

		return $this->db->lastInsertId();
		
	}
	
	public function update($id){
		
		$sql = "UPDATE ".$this->table_name." SET status=? WHERE id=?";
		$query = $this->db->prepare($sql);

        $update = $query->execute([$this->status, $id]);
		return $update ? true : false;
		
	}

	public function update_logo($id){

		$sql = "UPDATE ".$this->table_name." SET logo=? WHERE id=?";
		$query = $this->db->prepare($sql);
		$update = $query->execute([$this->logo, $id]);
		return $update ? true : false;

	}
	
	public function delete($id){
		
		$sql = "DELETE FROM ".$this->table_name." WHERE id=?";
		$query = $this->db->prepare($sql);
		$delete = $query->execute([$id]);
		return $delete ? true : false;
		
	}
	
	public function uploadLogo($FILES){
		
		$ext_array = ['jpg', 'png', 'jpeg'];
		$ext = end(explode('.', $FILES['logo']['name']));
		if(in_array($ext, $ext_array))
			 {
				$file_name = time().$FILES['logo']['name'];
				move_uploaded_file($FILES['logo']['tmp_name'], "../uploads/banner/".$file_name);
				return $file_name;
			 }
		else{
			return false;
		}

		 
		
	}
	
}



?>