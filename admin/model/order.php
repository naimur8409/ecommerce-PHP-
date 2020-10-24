<?php
class Orders extends DbConnection{
	
	public $id;
	public $customer_id;
	public $ship_name;
	public $ship_mobile;
	public $ship_address;
	public $ship_city;
	public $ship_postcode;
	public $ship_country;
	public $shipping_method;
	public $payment_method;
	public $payment_status;
	public $amount;
	public $shipping_amount;
	public $product_id;
	public $name;
	public $quantity;
	public $price;
	public $image;
	public $status;

	private $table_name="orders";
	private $add_table_name = "orderdetails";
	
	public function __construct(){
		 parent::__construct();
	}
	
	public function getOrders(){
		
		$sql = "SELECT * FROM ".$this->table_name;
		$query = $this->db->query($sql);
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}

	public function getOrdersById($id){
		
		$sql = "SELECT * FROM ".$this->table_name." WHERE id=?";
		$query = $this->db->prepare($sql);
		$query->execute([$id]);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}

	public function getOrderByCustomerId($customer_id){
		
		$sql = "SELECT * FROM ".$this->table_name." WHERE customer_id=?";
		$query = $this->db->prepare($sql);
		$query->execute([$customer_id]);
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}


	public function getOrderDetailsByOrderId($order_id){
		
		$sql = "SELECT * FROM ".$this->add_table_name." WHERE order_id=?";
		$query = $this->db->prepare($sql);
		$query->execute([$order_id]);
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}

	
	
	public function save(){
		
		$sql = "INSERT INTO `".$this->table_name."` (`customer_id`, `ship_name`, `ship_mobile`, `ship_address`, `ship_city`, `ship_postcode`, `ship_country`, `shipping_method`, `payment_method`, `amount`, `shipping_amount`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$query = $this->db->prepare($sql);

		$query->execute([$this->customer_id, $this->ship_name, $this->ship_mobile, $this->ship_address,$this->ship_city, $this->ship_postcode, $this->ship_country, $this->shipping_method, $this->payment_method, $this->amount, $this->shipping_amount]);
		
		return $this->db->lastInsertId();
		
	}

	public function saveOrderDetails(){
		
		$sql = "INSERT INTO `".$this->add_table_name."` (`order_id`, `product_id`, `name`, `quantity`, `price`, `image`) VALUES (?, ?, ?, ?, ?, ?)";

		$query = $this->db->prepare($sql);

		$query->execute([$this->id, $this->product_id, $this->name, $this->quantity, $this->price, $this->image]);
		
		return $this->db->lastInsertId();
		
	}
	
	public function update($id){
		
$sql = "UPDATE ".$this->table_name." SET category_id=?, brand_id=?, name=?, sku=?, price=?, quantity=?, description=?, status=?, is_feature=? WHERE id=?";
$query = $this->db->prepare($sql);
$update = $query->execute([$this->category_id, $this->brand_id, $this->name, $this->sku,$this->price, $this->quantity, $this->description, $this->status, $this->is_feature, $id]);

		return $update ? true : false;
		
	}

public function orderStatusUpdate($id){
		
$sql = "UPDATE `".$this->table_name."` SET `payment_status`=?, `status`=?, updated_at=? WHERE `".$this->table_name."`.id=?";

$query = $this->db->prepare($sql);
$update = $query->execute([$this->payment_status, $this->status, date("Y-m-d"), $id]);

		return $update ? true : false;
		
	}

	
	
	public function delete($id){
		
		$sql = "DELETE FROM ".$this->table_name." WHERE id=?";
		$query = $this->db->prepare($sql);
		$delete = $query->execute([$id]);
		return $delete ? true : false;
		
	}
	
	public function sendSMS($mobile, $message){
	    
	    $user = "******";
        $pass = "*****";
        $sid = "******";
        $url="http://sms.sslwireless.com/pushapi/dynamic/server.php";
        
        $param="user=$user&pass=$pass&sms[0][0]= $mobile &sms[0][1]=".urlencode($message)."&sms[0][2]=123456789&sid=$sid";
        
        $crl = curl_init();
        curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2);
        curl_setopt($crl,CURLOPT_URL,$url);
        curl_setopt($crl,CURLOPT_HEADER,0);
        curl_setopt($crl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($crl,CURLOPT_POST,1);
        curl_setopt($crl,CURLOPT_POSTFIELDS,$param);
        $response = curl_exec($crl);
        curl_close($crl);
        return $response;
	    
	}
	
	
	
}



?>