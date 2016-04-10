<?php
            session_start();

include 'header.php';
        include 'connect.php';
?>
<html>
    <head>
        <title>
            homepage
        </title>
    </head> 
    <body>
        <?php
        
    if(!isset($_COOKIE["PHPSESSID"])||$_SESSION['signed_in']!='true')
        echo'<a href="login.php">Login first</a><br>';
    else
    {

         echo'<a href="topic.php">create new topic</a><br><br>';
         
 
            $sql = "SELECT 
                        TNAME,TID 
                    FROM
                        TOPICS";
                                       
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
                    echo "All topics<ol>";
                    
                    while ($row = mysqli_fetch_assoc($result))
                   { 
                       echo "<a href='viewpost.php?id=".$row['TID']."'>*".$row['TNAME']."</a><br>";
                    }
                    echo"</ol>";
                }
    }}    
    echo" <a href='signout.php'>so</a>  "
        ?>
    </body>
</html>