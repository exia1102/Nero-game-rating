<?php 

require_once "./base.php";



$games=$db->getAllGame();
$categories=$db->getAllCategories();
$top3Game=$db->getGameTop3();

echo $twig->render('main.html.twig', //templete file
	array(//data array
		'games'=>$games,
		'categories'=>$categories,
		'top3game'=>$top3Game,
	)
);


 ?>


