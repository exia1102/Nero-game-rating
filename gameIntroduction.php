<?php 

require_once "./base.php";


$categories=$db->getAllCategories();



if($_GET&&array_key_exists('gid', $_GET)){
	$gid=$_GET['gid'];
	$g_categories=$db->getCategoryById($gid);
	$game=$db->getGameById($gid);
	$categoryName=array();
	$categoryColor=array();
	foreach ($g_categories as $value) {
		$cid=$value['c_id'];
		$category[]=$db->getCategoryByCid($cid);


		// foreach ($categories as $category) {
		// 	if($category['c_id']==$cid){
		// 		$categoryName[]=$category['c_name'];
		// 		$categoryColor[]=$category['c_color'];
		// 	}
		// }

	}




}else{
	$game=null;
	$g_categories=null;
}





echo $twig->render('gameIntroduction.html.twig', //templete file
	array(//data array
		"category"=>$category,
		"game"=>$game,
		"categories"=>$categories,
	)
);




 ?>