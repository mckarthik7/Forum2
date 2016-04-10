<?php
include 'header.php';
include 'connect.php';
session_start();
$err="";
if($_GET['abc']!="")
/*    {
        $err="Enter the comment";
    }
if($err!="")
    echo $err;
else 
 */
    {
        $comment=$_GET['abc'];
        if($comment!="")
        {   
            $sql = "INSERT INTO
            posts(PCONTENT, UID,  TID)
            VALUES('" . $comment . "'," . $_SESSION['user_id']. ",".$_GET['id'].")";
            $comment="";
        }  
        else
        {
            echo "<h1>NO EMPTY COMMENTS";
        }
        $result = mysqli_query($link,$sql);
        if(!$result)
        {
            echo 'Something went wrong while registering. Please try again later.';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        }
        else
        {
           echo "<h2>Congratulations!</h2><h2>comment added</h2> ";
        }        
    }
 ?>