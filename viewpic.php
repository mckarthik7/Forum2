<?php
/*include 'connect.php';
$uid=$_GET['uid'];
$getimg='select UIMAGE FROM UIMAGE WHERE UID='.$uid;
//echo $getimg;
$res=  mysqli_query($link, $getimg);
$a=  mysqli_fetch_assoc($res);
header("Content-type: image/jpeg");
echo $a['UIMAGE'];
*/
?>
<?php
/*** Check the $_GET variable ***/
if(filter_has_var(INPUT_GET, "uid") !== false && filter_input(INPUT_GET, 'uid', FILTER_VALIDATE_INT) !== false)
    {
    /*** set the image_id variable ***/
    $uid = filter_input(INPUT_GET, "uid", FILTER_SANITIZE_NUMBER_INT);
   try    {
          /*** connect to the database ***/
          $dbh = new PDO("mysql:host=localhost;dbname=forum2", 'root', '');

          /*** set the PDO error mode to exception ***/
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          /*** The sql statement ***/
          $sql = "SELECT UIMAGE FROM UIMAGE WHERE uid=".$uid;

          /*** prepare the sql ***/
          $stmt = $dbh->prepare($sql);

          /*** exceute the query ***/
          $stmt->execute(); 

          /*** set the fetch mode to associative array ***/
          $stmt->setFetchMode(PDO::FETCH_ASSOC);

          /*** set the header for the image ***/
          $array = $stmt->fetch();

          /*** the size of the array should be 3 (1 for each field) ***/
         // if(sizeof($array) === 3)
           //   {
             // echo '<p>This is '.$array['image_name'].' from the database</p>';
             // echo '<img '.$array['image_size'].' src="showfile.php?image_id='.$image_id.'">';
             // }
          //else
            //  {
             // throw new Exception("Out of bounds error");
             // }
          //}
              
                     header("Content-type: jpeg");
                  echo $array['UIMAGE'];
              
   } 
       catch(PDOException $e)
          {
          echo $e->getMessage();
          }
       catch(Exception $e)
          {
          echo $e->getMessage();
          } 
    }
?>