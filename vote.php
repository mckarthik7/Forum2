<?php
    include 'connect.php';
function getupvote($pid){
//add db connection to link here
$upquery='SELECT COUNT(*) AS num FROM forum2.vote where PID = '.$pid.' and vote="UPVOTE"';
$up= mysqli_query($GLOBALS['link'],$upquery);
$ups=mysqli_fetch_assoc($up);
echo $ups['num'];
return $ups['num'];
}

function getdownvote($pid){
	//add db connection to link here
	$downquery='SELECT COUNT(*)as num FROM forum2.vote where PID ='.$pid.' and vote="DOWNVOTE";';
	$down= mysqli_query($GLOBALS['link'],$downquery);
        $ups=mysqli_fetch_assoc($down);

	return $ups['num'];
}

//Use above functions as :-
/*		CHANGE THIS LATER ON 
	//we'll save tid in session i guess or just use $_get whatever the case save it as $tid;
 while($row = mysqli_fetch_assoc($link,$result)) 				//result contains query select * from forum.post INNER JOIN forum.user using UID where TID = 'tid';it will contain pid pcontent uid uname tid ptimestamp using pid and tid we'll use the above functions to get upvote/downvote count


                {               	//the formatting needs to be changed :/
				echo '<tr'>;					
				echo '<td>'.$row['Uname'].'<br>';
				echo $row['Ptime'].<br>
				echo '</td'>;
				echo '<td>';
				echo $row['Pcontent'];
				echo '</td>';
				echo '<td> upvotes'.getupvote($row['PID',$tid]);
				echo '<br>downvotes'.getdownvotes($row['PID'],$tid);

                }
*/

?>