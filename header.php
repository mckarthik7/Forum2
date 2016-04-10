<!doctype html>
<html>
<head>
<style>
body {
  left: 0;
  margin: 0;
  overflow-x:scroll;
  overflow-y:scroll;
  overflow:scroll;
  position: relative;
}
.menu {
  background: #47a3da repeat left top;
  left: -285px;
  height: 100%;
  position: fixed;
  width: 285px;
}
.jumbotron {
  background-color: #258ecd;
  height: 100%;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.menu ul {
  border-top: 1px solid #258ecd;
  list-style: none;
  margin: 0;
  padding: 0;
}

.menu li {
  border-bottom: 1px solid #258ecd;
  font-family: 'Open Sans', sans-serif;
  line-height: 45px;
  padding-bottom: 3px;
  padding-left: 20px;
  padding-top: 3px;
}

.menu a {
  color: #afdefa;
  font-size: 15px;
  text-decoration: none;
  text-transform: uppercase;
}

.icon-close {
  cursor: pointer;
  padding-left: 10px;
  padding-top: 10px;
  color: #afdefa;
}

.icon-close a {
  cursor : pointer;
  color: #afdefa;
  font-family: 'Open Sans', sans-serif;
  line-height: 45px;
  padding-bottom: 3px;
  padding-left: 20px;
  padding-top: 3px;
}

.icon-menu {
  color: #afdefa;
  cursor: pointer;
  font-family: 'Open Sans', sans-serif;
  font-size: 16px;
  padding-bottom: 25px;
  padding-left: 25px;
  padding-top: 25px;
  text-decoration: none;
  text-transform: uppercase;
}
h1 {
color:#fff;
  padding-bottom: 25px;
  padding-left: 25px;
  padding-top: 25px;
}
.icon-menu i { margin-right: 5px; }
p {
  color: #afdefa;
  font-size: 15px;
  text-decoration: none;
  text-transform: uppercase;
}
</style>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<title>Forums</title>
</head>
<body>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<div class="menu"> 
  <div class="icon-close"> <i class="fa fa-close"></i> <a>CLOSE</a></div>
  <ul>
    <li> <a href="home.php"> Home</a></li>
    <li><a href="Login.php">Login</a></li>
    <li><a href="signup.php">Signup</a></li>
    <li><a href="profile.php">Profile</a></li>
    <li><a href="allfiles.php">ALL FILES</a></li>
  </ul>
</div>

<!-- Main body -->

<div class="jumbotron">
<div class="icon-menu"> <i class="fa fa-bars"></i> Menu </div>
</div>
<script>
var main = function() {
 
 /* Push the body and the nav over by 285px over */
  
$('.icon-menu').click(function() {
  
  $('.menu').animate({
     
 left: "0px"
   
 }, 200);

    
$('body').animate({
      
left: "285px"
  
  }, 200);
 
 });

  
/* Then push them back */
  
$('.icon-close').click(function() {
   
 $('.menu').animate({
    
  left: "-285px"
   
 }, 200);

    
$('body').animate({
  left: "0px"
  }, 200);
});
};
$(document).ready(main);

</script>
</body>
</html>