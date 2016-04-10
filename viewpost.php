
<?php
    include 'vote.php';
    include 'header.php';
    include 'connect.php';
    if(!isset($_COOKIE["PHPSESSID"]))
        echo'<a href="login.php">Login first</a><br>';
    else
    {
        $mna=$_GET['id'];
        session_start();
        $sql = "SELECT 
            TNAME,TID,DESCR
        FROM
            TOPICS
        WHERE
            TID = $mna" ;                         
        $result = mysqli_query($link,$sql);
        while ($row = mysqli_fetch_assoc($result))
        { 
            echo " <p id=".$row['TID']."'>Topic :".$row['TNAME']."<br>Description :".$row['DESCR']."</p>";
        }
        $sql = "SELECT 
            PCONTENT,PID,USERS.UNAME
        FROM
            POSTS NATURAL JOIN USERS
        WHERE
            posts.TID = $mna ";
        $result = mysqli_query($link,$sql);
        
        echo"<dl>";
        while ($row = mysqli_fetch_assoc($result))
        { 
            echo "<dt>'".$row['UNAME']."'</dt><dd>'".$row['PCONTENT']."'</dd>".'Upvotes:';
            $ups=  getupvote($row['PID']);
            echo $ups;
        }
        echo"</dl>"; 
        $err="";   
        echo'<form method="get" action="abc.php">
            <input type = "textarea" name="abc">Enter your comment:</input>
            <input type= "hidden" name="id" value=" '.$mna.' "></input>
            <br><input type=submit action="posts">';
        if(!isset($_POST['abc'])||$_POST['abc']=="")
        {
            $err="Enter the comment";
        }
        if($err!="")
            echo $err;
        else
        {
            $comment=$_POST['abc'];
            if($comment!="")
            {   
                $sql = "INSERT INTO
                        posts(PCONTENT, UID,  TID)
                        VALUES('" . $comment . "'," . $_SESSION['user_id']. ",".$_GET['id'].")";
                $comment="";
            }
        }         
        $result = mysqli_query($link,$sql);
        if(!$result)
        {
            echo 'Something went wrong while registering. Please try again later.';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        }
        else
        {
            echo 'Successfully registered. You can now <a href="index.php">sign in</a> and start posting! :-)';
        }
        
    }
0?>