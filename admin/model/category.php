<?php
class Category extends Dbconnection{

	public $id;
	public $name;
	public $parent_id;
	public $status;
	
	private $table_name = "categories";

	public function __construct(){
		parent::__construct();
	}

   
    public function getCategories(){
    	$sql = "SELECT * FROM ".$this->table_name;
    	$query = $this->db->query($sql);
    	$data = $query->fetchAll(PDO::FETCH_ASSOC);
    	return $data ? $data : [];

    }
	
	public function getCategoriesWithParentName(){
		$sql = "SELECT c1.*, c2.name as parent_name FROM ".$this->table_name." as c1
				LEFT JOIN ".$this->table_name." as c2 
        		ON c2.id = c1.parent_id";
		$query = $this->db->query($sql);
    	$data = $query->fetchAll(PDO::FETCH_ASSOC);
    	return $data ? $data : [];	
			
	}


	public function getCategoryByParentId($id){
		 
		  $sql = "SELECT * FROM ".$this->table_name." WHERE parent_id=?";
         $query = $this->db->prepare($sql);
         $query->execute([$id]);
         $data = $query->fetchAll(PDO::FETCH_ASSOC);
         
         return $data ? $data : [];

	  }

	 public function getCategoryById($id){
		 
		  $sql = "SELECT * FROM ".$this->table_name." WHERE id=?";
         $query = $this->db->prepare($sql);
         $query->execute([$id]);
         $data = $query->fetch(PDO::FETCH_ASSOC);
         
         return $data ? $data : [];

	  }


	public function save(){

		$sql = "INSERT INTO ".$this->table_name."(name, parent_id, status) VALUES(?, ?, ?)";
		$query = $this->db->prepare($sql);
		$query->execute([$this->name, $this->parent_id, $this->status]);
		return $this->db->lastInsertId();

	}

	public function update($id){
	
	 $sql = "UPDATE ".$this->table_name." SET name=?, parent_id=?, status=? WHERE id=?";
	 
	 $query = $this->db->prepare($sql);
	 
	 $status = $query->execute([$this->name, $this->parent_id, $this->status, $id]);
	 
	 return $status ? true : false;

	}

	public function delete($id){
		
	$sql = "DELETE FROM ".$this->table_name." WHERE id=?";
	
	$query = $this->db->prepare($sql);
	 
	 $status = $query->execute([$id]);
	 
	 return $status ? true : false;

	}
}
?>