<?php 

require_once "./base.php";


if($_GET&&array_key_exists('gid', $_GET)&&array_key_exists('score', $_GET)){
	$gid=$_GET['gid'];
	$score=$_GET['score'];
	
	$db->addScore($score,$gid);
	$game=$db->getGameById($gid);
	$scoreNew=$game['g_totalscore']/$game['num_user'];
	echo $scoreNew;
	}






 ?>