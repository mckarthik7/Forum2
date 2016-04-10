<?php
session_start();
require_once('connect.php');
$id=$_SESSION['user_id'];
$q="SELECT * FROM users where UID=".$_SESSION['user_id'];
$result3 = mysqli_query($link,$q);
while($row3 = mysqli_fetch_assoc($result3))
{ 
$uname=$row3['UNAME'];
$email=$row3['EMAIL'];
//$picture=$row3['picture'];
echo '<table width="398" border="0" align="center" cellpadding="0">
  <tr>
    <td height="26" colspan="2">Your Profile Information </td>
	<td><div align="right"><a href="index.php">logout</a></div></td>
  </tr>
  <tr>
    <td width="129" rowspan="5"><img src="viewpic.php?uid='.$id.'" width="129" height="129" alt="no image found"/></td>
    <td width="82" valign="top"><div align="left">FirstName:</div></td>
    <td width="165" valign="top">'.$uname.'</td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Email:</div></td>
    <td valign="top">'.$email.'</td>
  </tr>
</table>
<p align="center"><a href="index.php"></a></p>';
}
?>
