<?php
 include 'header.php';
 include 'connect.php';
 ?>
<html>
    <head>
        <title>
            topic
        </title>
    </head>   
    <body>
        <?php
            if(!isset($_COOKIE["PHPSESSID"]))
                echo'<a href="login.php">Login first</a><br>';
            else
            {
                session_start();
                if($_SERVER['REQUEST_METHOD']!= 'POST')
                {      
                    echo '<form method="post" action="">
                    Topic: <input type="text" name="T_name" /><br>
                    DESCRIPTION: <textarea name="comment">Enter text here...</textarea>
                    <input type="submit" value="Create" />
                    </form>';
                }
                else
                {
                    $errors = array(); /* declare the array for later use */
                    if(!isset($_POST['T_name']))
                    {
                        $errors[] = 'The username field must not be empty.';
                    }
                       
                    if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
                    {
                        echo 'Uh-oh.. a couple of fields are not filled in correctly..';
                        echo '<ul>';
                        foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
                        {
                            echo '<li>' . $value . '</li>'; /* this generates a nice error list */
                        }
                        echo '</ul>';
                    }       
                    else
                    {
                        $sql = "INSERT INTO
                               topics(TNAME, UID, DESCR )
                               VALUES('" . mysqli_real_escape_string($link,$_POST['T_name']) . "',
                               '" .$_SESSION['user_id']."',
                               '" . mysqli_real_escape_string($link,$_POST['comment']) . "')";
                        $result = mysqli_query($link,$sql);
                        if(!$result)
                        {
                            //something went wrong, display the error
                            echo 'Something went wrong. Please try again later.';
                            //echo mysql_error(); //debugging purposes, uncomment when needed
                        }
                        else
                        {
                            echo 'Successfully added topic. You can now and start posting! :-)';
                        }
                    }
                }
            }
         ?>
    </body>
</html>