<?php
include 'connect.php';
function ($uid,$tid)
{
$fq='insert into tfollow values("'.$uid.'","'.$tid.'")';
$fu=  mysqli_query($link, $fq);
if(!$fu)
	echo 'Something went wrong...';
}


?>