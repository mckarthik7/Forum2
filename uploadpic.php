<?php
include 'header.php';
include 'connect.php';
session_start();
if($_SERVER['REQUEST_METHOD'] != 'POST')
{	 //the 1000000 restricts file to 1mb we should keep it 500 kb or something
    echo '<form enctype="multipart/form-data" method="post" action="">
    	  <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />				
        <input name="userfile" type="file" />
        <input type="submit" value="Submit" />
     </form>';	
}
else
{
    //the form has been posted, so save it
/*** check if a file was submitted ***/
if(!isset($_FILES['userfile']))
    {
    echo '<p>Please select a file</p>';
    }
else
    {
    try    {
        upload();
        echo '<p>Thank you for submitting</p>';
        }
    catch(Exception $e)
        {
        echo '<h4>'.$e->getMessage().'</h4>';
        }
    }

}
function upload(){
/*** check if a file was uploaded ***/
if(is_uploaded_file($_FILES['userfile']['tmp_name']) && getimagesize($_FILES['userfile']['tmp_name']) != false)
    {
    /***  get the image info. ***/
    $size = getimagesize($_FILES['userfile']['tmp_name']);
    /*** assign our variables ***/
    $type = $size['mime'];
    $imgfp = fopen($_FILES['userfile']['tmp_name'], 'rb');
    $size = $size[3];
    $name = $_FILES['userfile']['name'];
    $maxsize = 99999999;


    /***  check the file is less than the maximum file size ***/
    if($_FILES['userfile']['size'] < $maxsize )
        {
        /*** connect to db ***/
        $dbh = new PDO("mysql:host=localhost;dbname=forum2", 'root', '');

                /*** set the error mode ***/
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            /*** our sql query ***/
        $stmt = $dbh->prepare("INSERT INTO UIMAGE VALUES (? ,?)");
        $stmt->bindParam(1, $_SESSION['user_id']);
        $stmt->bindParam(2, $imgfp, PDO::PARAM_LOB);
        /*** bind the params ***/
        /*** execute the query ***/
        $stmt->execute();
        }
    else
        {
        /*** throw an exception is image is not of type ***/
        throw new Exception("File Size Error");
        }
    }
else
    {
    // if the file is not less than the maximum allowed, print an error
    throw new Exception("Unsupported Image Format!");
    }
}
?>
