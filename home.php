<?php
    include 'header.php';
    include 'connect.php';
                if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<html>
    <head>
        <title>
            homepage
        </title>
    </head> 
    <body>
    <?php        
        if(!isset($_COOKIE["PHPSESSID"])||!isset($_SESSION['signed_in'])||$_SESSION['signed_in']==false)
            echo'<a href="login.php">Login first</a><br>';
        else
        {
            echo'<a href="topic.php">create new topic</a><br>';
            $sql = "SELECT 
                TNAME,TID 
            FROM
                TOPICS
            WHERE
                UID = '" . $_SESSION['user_id']. "'";                         
            $result = mysqli_query($link,$sql);
            if(!$result)
            {
                //something went wrong, display the error
                echo 'Something went wrong while signing in. Please try again later.';
                //echo mysql_error(); //debugging purposes, uncomment when needed
            }
            else
            {
                if(mysqli_affected_rows($link) == 0)
                {
                    echo 'You have no topics yet.Create some';
                }
                else
                {
                    echo "Your topics<ol>";
                    while ($row = mysqli_fetch_assoc($result))
                   { 
                       echo "<a href='viewpost.php?id=".$row['TID']."'>".$row['TNAME']."</a><br>";
                   }
                    echo"</ol>";
                }
            }
        }    
    include 'followthread.php';
    ?>
    </body>
</html>

