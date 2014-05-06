<?php

//homepage.php

//this page shows the user the albums they have added to the site
//and also displays new albums and album news via rollingstones.com rss and 
//pitchfork.com rss

//rss displays constructed using includerss.com

require_once '../model/global.php';

if (!isset($_SESSION['logged_in'])) {
    header('location:../view/index.html');
}

$user_tools = new UserTools();
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];

$db = new DB();
$record = $db->select('ALBUMS',"owner = '$user_id'");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>VinylTrade Home Page</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../view/quepage.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

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
           <!-- <div id="cp_widget_6794902d-7631-473f-bffb-c6aa73680ecc">...</div><script type="text/javascript">
var cpo = []; cpo["_object"] ="cp_widget_6794902d-7631-473f-bffb-c6aa73680ecc"; cpo["_fid"] = "AkKAZprR7ctN";
var _cpmp = _cpmp || []; _cpmp.push(cpo);
(function() { var cp = document.createElement("script"); cp.type = "text/javascript";
cp.async = true; cp.src = "//www.cincopa.com/media-platform/runtime/libasync.js";
var c = document.getElementsByTagName("script")[0];
c.parentNode.insertBefore(cp, c); })(); </script><noscript>Powered by Cincopa <a href='http://www.cincopa.com/video-hosting'>Video Hosting</a> solution.</noscript> -->
          </form>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <?php include ('../include/vinylSidebar.php'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Album News</h1>
                
                <div class="row placeholders">
                     <div class="col-xs-6 col-sm-3 placeholder">
                     <?php @readfile('http://output76.rssinclude.com/output?type=php&id=871335&hash=45b4e2a562b6d243f42c1ec345acd546')?>
                    </div>
                     <div class="col-xs-6 col-sm-3 placeholder">
                    <?php @readfile('http://output52.rssinclude.com/output?type=php&id=871351&hash=df1ced0610e69fa17d3a21c8ab8e3a53')?>
                    </div>
            <!--  <div class="col-xs-6 col-sm-3 placeholder">
              <iframe id="pandora-001" src="http://www.pandora.com/create_station_link.html" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" width="120" height="70"></iframe>
              <span class="text-muted">Artist Name</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                </div>
              
            <div class="col-xs-6 col-sm-3 placeholder">
              <iframe src="https://embed.spotify.com/?uri=spotify:track:1w2b7yH3BlYMzDGN3QNQra" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>
              <span class="text-muted">Artist Name</span>
            </div> -->
          </div>
            <div class="row placeholders">
                <div class="center_rss">
                    <?php @readfile('http://output59.rssinclude.com/output?type=php&id=871666&hash=ef97e3b5c5cef7707ca68e97c0d7d3bf')?>
                </div>
            </div>
            
          <h2 class="sub-header">Your Albums  </h2>
            <form action="../view/modify_record.php" method="post"> 
                   <button class="btn btn-md btn-primary " type="submit"  
<?php 

if(!isset($record[1])) {
    if($record['owner'] == "") {
        echo 'disabled'; 
    }
}   
?>
                           >Modify</button>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Album</th>
                  <th>Artist</th>
                 
                  <th>Owner</th>
                  <th>Modify</th>
                </tr>
              </thead>
              <tbody>
                
<?php


//
// create record object that will hold owner_id, album_id, album, artist, wait time, and owner email
//

if (!isset($record[1])) {
    if($record['owner'] != "") {
        //do nothing
        echo '<tr>';
        echo '<td>1</td>';
        echo '<td>'.$record['album'].'</td>';
        echo '<td>'.$record['artist'].'</td>';

        echo '<td>'.$username.'</td>';
        echo '<td><input type="radio" name="album_id" value="'.$record['album_id'].'"></td>';
        echo '</tr>';
    }
}
else {
    $i = 1;
    foreach ($record as $records) {
        
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$records['album'].'</td>';
        echo '<td>'.$records['artist'].'</td>';
       
        echo '<td>'.$username.'</td>';
        echo '<td><input type="radio" name="album_id" value="'.$records['album_id'].'"></td>';
        echo '</tr>';
        $i++;
    }
}

?>
                  
                
                
              </tbody>
            </table>
              </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
  </body>
</html>
