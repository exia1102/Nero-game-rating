
<?php

require_once "./base.php";

$categories=$db->getAllCategories();

if($_GET&&array_key_exists('str', $_GET)){
	$str=$_GET['str'];
	$game=$db->getGameBySearch($str);

}else{
	$game=null;
}



echo $twig->render('searchResult.html.twig', //templete file
	array(//data array
		'categories'=>$categories,
		'game'=>$game,
	)
);


 ?>