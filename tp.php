<?php
include 'connect.php';
$t=time()-86400;
$qu='update topics set recents values('.time().')';
echo $qu;
mysqli_query($link, $qu);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
