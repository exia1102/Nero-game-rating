<?php 

class database{

	private $pdo;
	
	private function getInstance(){
		if(!$this->pdo){
			$this->pdo = new PDO('mysql:host=localhost;dbname=gamerating;charset=utf8mb4','root','root');
		}
			return $this->pdo;//checkself order dont need else{}
	}
	

	public function getAllCategories(){
		$stmt=$this->getInstance()->query("SELECT * from category");
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	

	public function getAllGame(){
		$stmt=$this->getInstance()->query("SELECT * from gameInfo");
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getGameById($gid){
		$stmt=$this->getInstance()->prepare("SELECT * from gameInfo where g_id=:gid");
		$stmt->execute(
			array(
				":gid"=>$gid,
			)
		);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function getCategoryById($gid){
		$stmt=$this->getInstance()->prepare("SELECT * from game_is_category where g_id=:gid");
		$stmt->execute(
			array(
				":gid"=>$gid,
			)
		);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}
	public function getGameTop3(){
		$stmt=$this->getInstance()->query("SELECT * from gameInfo order by g_totalscore/num_user limit 3");
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getCategoryByCid($cid){
		$stmt=$this->getInstance()->prepare("SELECT * from category where c_id=:cid");
		$stmt->execute(
			array(
				":cid"=>$cid,
			)
		);
		return $stmt->fetch(PDO::FETCH_ASSOC);
		
	}
	public function getGidByCid($cid){
		$stmt=$this->getInstance()->prepare("SELECT g_id from game_is_category where c_id=:cid");
		$stmt->execute(
			array(
				":cid"=>$cid,
			)
		);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getGameBySearch($str){
		$stmt=$this->getInstance()->prepare("SELECT * from gameInfo where g_name like :str or producer like :str"); 
		$stmt->execute(
			array(
				":str"=> "%$str%",
			)
		);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function addScore($score,$gid){
		$stmt=$this->getInstance()->prepare("UPDATE gameInfo set g_totalscore=g_totalscore+:g_newscore where g_id=:gid"); 
		$stmt->execute(
			array(
				":gid"=>$gid,
				":g_newscore"=> $score,
			)
		);
		$stmt=$this->getInstance()->prepare("UPDATE gameInfo set num_user=num_user+1 where g_id=:gid"); 
		$stmt->execute(
			array(
				":gid"=>$gid,
			)
		);
		$stmt=$this->getInstance()->prepare("INSERT INTO score (g_id,score) values(:gid,:score)"); 
		$stmt->execute(
			array(
				":gid"=>$gid,
				":score"=>$score,
			)
		);


	}




}






 ?>