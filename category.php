
<?php

require_once "./base.php";

if($_GET&&array_key_exists('cid', $_GET)){
	$cid=$_GET['cid'];
	$result=$db->getGidByCid($cid);
	$gid=array();
	foreach ($result as $value) {
		# code...
		$gid[]=$value['g_id'];
	}
	$game=array();
	foreach ($gid as $value) {
		# code...
		$game[]=$db->getGameById($value);
	
	}
	



}












$categories=$db->getAllCategories();
$top3Game=$db->getGameTop3();


echo $twig->render('category.html.twig', //templete file
	array(//data array
		'games'=>$game,
		'categories'=>$categories,
		'top3game'=>$top3Game,
	)
);


 ?>