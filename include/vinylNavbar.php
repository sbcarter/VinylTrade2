<?php 
include '../model/global.php';
$username = $_SESSION['username'];
?>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>                             <!-- echo out the username, must find how to grab it?? -->
          <a class="navbar-brand" >VinylTrade Account Home  Welcome, <?php echo $username;?> !</a>
         
        </div>
          <form method="post" action="login.php">
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../view/homepage.php">Home</a></li>
            <li><a href="../model/logout.php">Sign Out</a></li>
        </form>
          </ul>
          <form class="navbar-form navbar-right">
           
          </form>
        </div>
      </div>
    </div>