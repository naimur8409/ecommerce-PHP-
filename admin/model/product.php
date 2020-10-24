<?php
class Product extends DbConnection{
	
	public $id;
	public $name;
	public $category_id;
	public $brand_id;
	public $sku;
	public $price;
	public $quantity;
	public $description;
	public $is_feature;
	public $is_new;
	public $image;
	public $status;
	public $image_name;
	private $table_name="products";
	private $add_table_name = "product_images";
	
	public function __construct(){
		 parent::__construct();
	}
	
	public function getProducts(){
		
		$sql = "SELECT * FROM ".$this->table_name;
		$query = $this->db->query($sql);
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}

	public function getProductsByCategoryId($category_id){
		
		$sql = "SELECT * FROM ".$this->table_name." WHERE category_id=?";
		$query = $this->db->prepare($sql);
		$query->execute([$category_id]);
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}

	public function getProductsByCategoryIds($category_ids){
		
		$sql = "SELECT * FROM ".$this->table_name." WHERE category_id IN($category_ids)";
		$query = $this->db->query($sql);
		//$query->execute([$category_ids]);
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}

	public function getProductsBySearch($keyword){

		$sql = "SELECT * FROM ".$this->table_name." WHERE name LIKE :keyword OR price LIKE :keyword OR description LIKE :keyword";
		$query = $this->db->prepare($sql);
		$query->bindValue(":keyword", "%".$keyword."%");
		$query->execute();
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		return $data ? $data : [];

	}

	public function getProductsAdditionalImage($id){
		
		$sql = "SELECT * FROM ".$this->add_table_name." WHERE product_id=?";
		$query = $this->db->prepare($sql);
		$query->execute([$id]);
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}


	
	public function getProductById($id){
		$sql = "SELECT * FROM ".$this->table_name." WHERE id=?";
		$query = $this->db->prepare($sql);
		$query->execute([$id]);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
	}

	public function getProductWithCategoryAndBrand(){

	$sql = "SELECT p.*, c.name as category_name, b.name as brand_name FROM ".$this->table_name." as p, categories as c, brands as b WHERE p.category_id = c.id AND p.brand_id = b.id";

	$query = $this->db->query($sql);
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
	return $data ? $data : [];


	}
	
	public function save(){
		
		$sql = "INSERT INTO ".$this->table_name."(category_id, brand_id, name, sku, price, quantity, image, description, status, is_feature, is_new) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ? ,?, ?)";
		$query = $this->db->prepare($sql);
		$query->execute([$this->category_id, $this->brand_id, $this->name, $this->sku,$this->price, $this->quantity, $this->image, $this->description, $this->status, $this->is_feature, $this->is_new]);
		
		return $this->db->lastInsertId();
		
	}
	
	public function update($id){
		
$sql = "UPDATE ".$this->table_name." SET category_id=?, brand_id=?, name=?, sku=?, price=?, quantity=?, description=?, status=?, is_feature=?, is_new=? WHERE id=?";
$query = $this->db->prepare($sql);
$update = $query->execute([$this->category_id, $this->brand_id, $this->name, $this->sku,$this->price, $this->quantity, $this->description, $this->status, $this->is_feature, $this->is_new, $id]);

		return $update ? true : false;
		
	}

	public function saveAdditionalImage(){
		$sql = "INSERT INTO ".$this->add_table_name."(product_id, image_name) VALUES(?, ?)";
		$query = $this->db->prepare($sql);
		$query->execute([$this->id, $this->image_name]);
		return $this->db->lastInsertId();
	}

	public function updateImage($id){

		$sql = "UPDATE ".$this->table_name." SET image=? WHERE id=?";
		$query = $this->db->prepare($sql);
		$update = $query->execute([$this->image, $id]);
		return $update ? true : false;

	}
	
	public function delete($id){
		
		$sql = "DELETE FROM ".$this->table_name." WHERE id=?";
		$query = $this->db->prepare($sql);
		$delete = $query->execute([$id]);
		return $delete ? true : false;
		
	}
	
	public function uploadImage($FILES, $name){
		
		$ext = end(explode(".", $FILES['image']['name']));

		$file_name = $name.'.'.$ext;
		
		move_uploaded_file($FILES['image']['tmp_name'], "../uploads/product/".$file_name);
		
		return $file_name;
		 
		
	}

	public function uploadAdditionalImage($FILES, $name){
		
		$ext = end(explode(".", $FILES['name']));

		$file_name = $name.'.'.$ext;
		
		move_uploaded_file($FILES['tmp_name'], "../uploads/product/".$file_name);
		
		return $file_name;
		 
		
	}
	
}



?>