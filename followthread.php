<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'connect.php';
$fq='select * from Tfollow inner join topics on topics.TID=Tfollow.TID where tfollow.UID='.$_SESSION['user_id'].' order by recents desc';
$fu=  mysqli_query($link, $fq);
while ($rows = mysqli_fetch_assoc($fu)) {
    
    echo "<td><a href='viewpost.php?id=".$rows['TID']."'>*".$rows['TNAME']."</a></td>";
}