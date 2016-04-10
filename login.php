
       <?php
                   include 'header.php';
                   session_start();
       ?>
    <?php
            include'connect.php';
        if(isset($_SESSION['signed_in'])&&$_SESSION['signed_in']==true)
            {
                echo 'You are already signed in! <br><a href="Signout.php"> Sign out!</a>';
            }
        else
        {
            if($_SERVER['REQUEST_METHOD'] != 'POST')
           {
                echo '<form method="post" action="">
                      Username: <input type="text" name="user_name" />
                      Password: <input type="password" name="user_pass">
                      <input type="submit" value="Sign in" />
                      </form>';
           }
            else
           {   echo $_POST['user_name'];
                $errors = array(); /* declare the array for later use */
                if(($_POST['user_name'])=='')
                {
                    $errors[] = 'The username field must not be empty.';
                }
                if(($_POST['user_pass'])=='')
                {
                    $errors[] = 'The password field must not be empty.';
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
                    $sql = "SELECT 
                        UID,
                        UNAME,
                        UTYPE
                    FROM
                        users
                    WHERE
                        UNAME = '" . mysqli_real_escape_string($link,$_POST['user_name']) . "'
                    AND
                        PWD = '" . $_POST['user_pass'] . "'";
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
                            echo 'You have supplied a wrong user/password combination. Please try again.';
                        }
                        else
                        {
                            
                            $_SESSION['signed_in'] = true;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $_SESSION['user_id']    = $row['UID'];
                                $_SESSION['user_name']  = $row['UNAME'];
                                $_SESSION['user_level'] = $row['UTYPE'];
                            }
                            echo 'Welcome, ' . $_SESSION['user_name'] . '. <a href="home.php">GO to home!</a>.';
                         }
                    }
                }       
            }
        }
        
    ?>        
