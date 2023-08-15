<?php 
session_start();
require('database.php');


if (isset($_SESSION['ID']) && isset($_SESSION['user'])) {

 ?>

<!DOCTYPE html>
<html>
<head>
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #04AA6D;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<title>SHOES CLEANING SERVICES</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<style>

body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("clean shoe.jpg");
  min-height: 90%;
}
</style>
</head>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="#" class="w3-bar-item w3-button">HOME</a>
    <a href="#menu" class="w3-bar-item w3-button">MENU</a>
    <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
    <a href="#myMap" class="w3-bar-item w3-button">CONTACT</a>
    <a href="view.php" class="w3-bar-item w3-button">ORDER</a>
    <a href="logout.php" class="w3-bar-item w3-button">LOGOUT</a>
  </div>
</div>
  
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-padding">
    <span class="w3-tag w3-xlarge">Open from 10am to 10pm</span>
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white w3-hide-small" style="font-size:100px">Shoe<br>CLEANING SERVICES</span>
    <span class="w3-text-white w3-hide-large w3-hide-medium" style="font-size:60px"><b>tshoe<br>CLEANING SERVICES</b></span>
    <p><a href="#menu" class="w3-button w3-xxlarge w3-black">MENU</a></p>
  </div>
</header>

<div class="alert success">
  <span class="closebtn">&times;</span>  
  <h1><strong>Login Successfully!</strong> Welcome <?php echo $_SESSION['user']; ?></h1>
</div>
<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>

<!-- Menu Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
  <div class="w3-content">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">THE MENU</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Clean');" id="myLink">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Clean</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Repaint');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Repaint</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Restore');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Restore</div>
      </a>
    </div>

    <div id="Clean" class="w3-container menu w3-padding-32 w3-white">
    <?php
    $sql="Select * from service where type='clean';";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) {
      ?>
      <h1><b><?php echo $row["type_cl"]; ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round">RM <?php echo $row["price"]; ?></span></h1>
      <p class="w3-text-grey"><?php echo $row["descrip"]; ?></p>
      <hr>
      <?php
         } ?>
    </div>

    <div id="Repaint" class="w3-container menu w3-padding-32 w3-white">
    <?php
    $sql="Select * from service where type='repaint';";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) {
      ?>
      <h1><b><?php echo $row["type_cl"]; ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round">RM <?php echo $row["price"]; ?></span></h1>
      <p class="w3-text-grey"><?php echo $row["descrip"]; ?></p>
      <hr>
      <?php
         } ?>
    </div>

  <div id="Restore" class="w3-container menu w3-padding-32 w3-white">
  <?php
    $sql="Select * from service where type='restore';";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) {
      ?>
      <h1><b><?php echo $row["type_cl"]; ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round">RM <?php echo $row["price"]; ?></span></h1>
      <p class="w3-text-grey"><?php echo $row["descrip"]; ?></p>
      <hr>
      <?php
         } ?>
    </div>

<!-- About Container -->
<div class="w3-container w3-padding-64 w3-red w3-grayscale w3-xlarge" id="about">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">About</h1>
    <p>The Shoes Cleaning was founded in Kuala Lumpur by Mr. Fawwaz Ilman.</p>
    <p><strong>The worker?</strong> Mr. Izzul Iman and Mr. Aidil Najmi</p>
    <p>We are proud of our service.</p>
    <img src="place.png" style="width:100%" class="w3-margin-top w3-margin-bottom" alt="Restaurant">
    <h1><b>Opening Hours</b></h1>
    <div class="w3-row">
      <div class="w3-col s6">
        <p>Mon - Sat OPEN</p>
        <p>shop open from 10 a.m to 10 p.m</p>
        <p>online from 10 a.m to 12 p.m</p>
      </div>
      <div class="w3-col s6">
        <p>Sunday Closed</p>
        <p>come before it's too late</p>
        <p>or you can order it online</p>
      </div>
</div>


<!-- Contact -->
<div class="w3-container w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge" id="myMap">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Contact</h1>
    <p>Find us at some address at some place or call us at (+60)11-1854 0598</p>
    <p><span class="w3-tag">FYI!</span> We offer the fastest,cleanest and cheapest service we can do to our customers</p>
    <p class="w3-xxlarge"><strong>Feedback</strong> give us a feedback,we really appreciate your feedback to improve our service :</p>
    <form action="feedback.php">
      <p><button class="w3-button w3-light-grey w3-block" type="submit">GIVE FEEDBACK</button></p>
    </form>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-48 w3-xxlarge">
  <p>check our Instagram <a href="https://www.instagram.com/fawwazkarim/" title="W3.CSS" target="_blank" class="w3-hover-text-green">@fawwazkarim</a></p>
  <p>Contact us <a href="https://wa.me/601118540598" title="W3.CSS" target="_blank" class="w3-hover-text-green">@Shoe Cleaning Service</a></p>
</footer>


<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>

</body>
</html>

<?php 
}
else{
     header("Location: index.php");
     exit();
}
 ?>