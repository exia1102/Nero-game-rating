<?php 

require_once "./base.php";


if($_GET&&array_key_exists('gid', $_GET)&&array_key_exists('comment', $_GET)){
	$gid=$_GET['gid'];
	$comment=$_GET['comment'];
	$db->addComment($gid,$comment);
	$comments=$db->getAllComment($gid);
	echo json_encode($comments);


	
	}






 ?>