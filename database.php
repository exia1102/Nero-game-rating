<?php 


class database{
	private $pdo;

	private function getInstance(){
		if (!$this->pdo) {
			$this->pdo =new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8mb4','root','root');
		}

		return $this->pdo;
	}

	public function getAllbook(){
		$stmt = $this->getInstance()->query("SELECT * from book");
		return $stmt->fetchAll(PDO::FETCH_ASSOC) ;
	}

	public function getBookById($bid){
		$stmt=$this->getInstance()->prepare("SELECT * from book where bid=:bid");
		$stmt->execute(
			array(
				":bid"=>$bid,
			)
		);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function getAllCatagories(){
	$stmt=$this->getInstance()->query("SELECT * from catagory");
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getCatagoriesById($bid){
		$stmt=$this->getInstance()->prepare("SELECT * from book_is_catagory  where bid=:bid ");
		$stmt->execute(
			array(
				":bid"=>$bid,
			)
		);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
}






 ?>


