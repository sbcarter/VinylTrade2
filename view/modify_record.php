<?php require_once '../model/global.php';
if (!isset($_SESSION['logged_in'])) {
    header('location:../view/index.html');
}

$db = new DB();

$album_id = $_POST['album_id'];

$user_id = $_SESSION['user_id'];

$record = $db->select('ALBUMS','owner = '.$user_id.' and album_id = '.$album_id);
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
        <title>Modify Record</title>
    </head>
    <body>
        
        <?php include '../include/vinylNavbar.php' ?>
        
        <div class="center_content">
            <div class="content">
                
                <div class="starter-template">
                    
                    <h1>Modify User Records</h1>
                </div>
                
                <form action="../model/update_record.php" method="post">
                    <input type="hidden" name="album_id" value="<?php echo $album_id; ?>"/>
                <div class="form-group">
                    <label for="recordAlbumName">Album Title</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" <?php echo 'placeholder="'.$record['album'].'"'; ?> name="album" style="width: 300px;">
                </div>

                <div class="form-group">
                    <label for="recordArtistName">Artist Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" <?php echo 'placeholder="'.$record['artist'].'"'; ?> name="artist" style="width: 300px;">
                </div>
                <div class="form-group">
                    <label>Album condition:</label><br />
                    <input type="radio" name="condition" value="great"<?php if($record['albumCondition'] == 'great') echo 'checked'; ?>/>
                    <label> Great (like new)</label><br />
                    <input type="radio" name="condition" value="good"<?php if($record['albumCondition'] == 'good') echo 'checked'; ?>/>
                    <label> Good (lightly worn)</label><br />
                    <input type="radio" name="condition" value="fair"<?php if($record['albumCondition'] == 'fair') echo 'checked'; ?>/>
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
