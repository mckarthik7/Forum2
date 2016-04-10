<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$server = 'localhost';
$username   = 'root';
$password   = '';
$database   = 'forum2';
 
if(!($link=mysqli_connect($server, $username,  $password)))
{
    exit('Error: could not establish database connection');
}
if(!mysqli_select_db($link, $database))
{
    exit('Error: could not select the database');
}
global $link;
?>

