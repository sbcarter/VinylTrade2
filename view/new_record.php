<?php require_once '../model/global.php';
if (!isset($_SESSION['logged_in'])) {
    header('location:../view/index.html');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
        
        <!-- Bootstrap core CSS -->
        <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../view/add_record_css.css" rel="stylesheet">
        <title>Your Records</title>
    </head>
    <body>
        
        <?php include '../include/vinylNavbar.php' ?>
        
        <div class="center_content">
            <div class="content">
                
                <div class="starter-template">
                    
                    <h1>Add User Records</h1>
                </div>
                <p class="error"><?php if($error != "") echo $error; ?></p>
                <form action="../model/add_record.php" method="post">
                <div class="form-group">
                    <label for="recordAlbumName">Album Title</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Album Title" name="album" style="width: 300px;">
                </div>

                <div class="form-group">
                    <label for="recordArtistName">Artist Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Artist Name" name="artist" style="width: 300px;">
                </div>
                <div class="form-group">
                    <label>Album condition:</label><br />
                    <input type="radio" name="condition" value="great"/>
                    <label> Great (like new)</label><br />
                    <input type="radio" name="condition" value="good"/>
                    <label> Good (lightly worn)</label><br />
                    <input type="radio" name="condition" value="fair"/>
                    <label> Fair (decent amount of wear)</label>
                </div>
                <div class="form-group">
                    <label>Allow for Shipping and Trade?:</label><br />
                    <input type="radio" name="shipAllow" value="yes">
                    <label>Yes</label><br />
                    <input type="radio" name="shipAllow" value="no">
                    <label>No</label><br />
                <button type="submit" class="btn btn-default">Add</button>
                </form>
                <div class="condition">
                    <p>
                        <h4>
                            Conditon description
                        </h4>
                        <b>Great</b>- An album that appears to have like new qualities. No split spines or bent corners, play quality is high with no skips or scratches<br /><br />
                        <b>Good</b>- An album that is still in great shape but there is evidence of wear such as bent corners, the actual vinyl has a very minimal amount of scratches if any<br /><br />
                        <b>Fair</b>- this album has been used heavily and shows it. There are a few scratches and possibly a few skips when played.
                    </p>
                </div>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>    
    </body>
<html>
