<?php

class Dbconnection{

	protected $db;

public function __construct(){

   try{
    
      $this->db = new PDO("mysql:host=localhost;dbname=bmunion_estore", "bmunion_eroot", "R&W4Fu}ojf4%");

   }catch(PDOExection $e){
   	

   }

}

}






?>