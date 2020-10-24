<?php
class Marks extends Dbconnection{

	public $id;
	public $name;
	public $roll;
	public $subject;
	public $marks;

	private $table_name = "marks";

	public function __construct(){
		parent::__construct();
	}

   
    public function getMarks(){
    	$sql = "SELECT * FROM ".$this->table_name;
    	$query = $this->db->query($sql);
    	$data = $query->fetchAll(PDO::FETCH_ASSOC);
    	return $data ? $data : [];

    }

	 public function getMarksById($id){
            $sql = "SELECT * FROM ".$this->table_name." WHERE id=?";
         $query = $this->db->prepare($sql);
         $query->execute([$id]);
         $data = $query->fetch(PDO::FETCH_ASSOC);
         
         return $data ? $data : [];
	  }

	  public function getMarksByRoll($roll){
         
         $sql = "SELECT * FROM ".$this->table_name." WHERE roll=?";
         $query = $this->db->prepare($sql);
         $query->execute([$roll]);
         $data = $query->fetchAll(PDO::FETCH_ASSOC);
         
         return $data ? $data : [];

	  }
    
	public function save(){

		$sql = "INSERT INTO ".$this->table_name."(name, roll, subject, marks) VALUES(?, ?, ?, ?)";
		$query = $this->db->prepare($sql);
		$query->execute([$this->name, $this->roll, $this->subject, $this->marks]);
		return $this->db->lastInsertId();

	}
	
	public function gradePoint($marks){
		
		 if($marks<=100 && $marks>=80)
		 {
			 return "5.00";
		 }
		 else if($marks<=79 && $marks>=70)
		 {
			 return "4.00";
		 }
		 else if($marks<=69 && $marks>=60)
		 {
			 return "3.5";
		 }
		 else if($marks<=59 && $marks>=50)
		 {
			 return "3.00";
		 }
		 else if($marks<=49 && $marks>=40)
		 {
			 return "2.00";
		 }
		 else if($marks<=39 && $marks>=33)
		 {
			 return "1.00";
		 }
		 else{
			 return "0.00";
		 }
		 
		
	}
	
	public function grade($marks){
		
		 if($marks<=100 && $marks>=80)
		 {
			 return "A+";
		 }
		 else if($marks<=79 && $marks>=70)
		 {
			 return "A";
		 }
		 else if($marks<=69 && $marks>=60)
		 {
			 return "A-";
		 }
		 else if($marks<=59 && $marks>=50)
		 {
			 return "B";
		 }
		 else if($marks<=49 && $marks>=40)
		 {
			 return "C";
		 }
		 else if($marks<=39 && $marks>=33)
		 {
			 return "D";
		 }
		 else{
			 return "F";
		 }
		 
		
	}

	
}




?>