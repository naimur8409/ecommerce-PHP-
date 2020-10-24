<?php
class Slider extends DbConnection{
	
	public $id;
	public $name;
	public $logo;
	public $status;
	public $url;
	private $table_name="slider";
	
	public function __construct(){
		 parent::__construct();
	}
	
	public function getSlider(){
		
		$sql = "SELECT * FROM ".$this->table_name;
		$query = $this->db->query($sql);
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}

    public function getActiveSlider(){
        $id = 1;
        $sql = "SELECT * FROM ".$this->table_name." WHERE status=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $data = $query->fetchALL(PDO::FETCH_ASSOC);
        return $data ? $data : [];


    }
	
	public function getSliderById($id){
		$sql = "SELECT * FROM ".$this->table_name." WHERE id=?";
		$query = $this->db->prepare($sql);
		$query->execute([$id]);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
	}
	
	public function save(){
		
		$sql = "INSERT INTO ".$this->table_name."(name, logo, status, url) VALUES(?, ?, ?, ?)";
		$query = $this->db->prepare($sql);
		$query->execute([$this->name, $this->logo, $this->status, $this->url]);
		return $this->db->lastInsertId();
		
	}
	
	public function update($id){
		
		$sql = "UPDATE ".$this->table_name." SET name=?, status=?, url=? WHERE id=?";
		$query = $this->db->prepare($sql);
		$update = $query->execute([$this->name, $this->status, $this->url, $id]);
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
				move_uploaded_file($FILES['logo']['tmp_name'], "../uploads/mainslider/".$file_name);
				return $file_name;
			 }
		else{
			return false;
		}

		 
		
	}
	
}



?>