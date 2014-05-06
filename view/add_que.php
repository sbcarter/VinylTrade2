<!DOCTYPE html>
<html>
<?php 

include '../model/global.php'; 

if (!isset($_SESSION['logged_in'])) {
    header('location:../view/index.html');
}
$user_id = $_SESSION['user_id'];        
?>
    <head>
        <title>Edit Record Que</title>
        
        <!-- Bootstrap core CSS -->
        <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Custom styles for this template -->
        <link href="../view/quepage.css" rel="stylesheet">
    </head>
    <body>
        <?php include '../include/vinylNavbar.php'; ?>
        
        <div class="container-fluid">
      <div class="row">
        <?php include ('../include/vinylSidebar.php'); ?>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">All Records  </h2>
              <p class="error"> <?php if ($error != "") echo $error; ?> </p>
          <form action="../model/add_to_que.php" method="post"> 
                   <button class="btn btn-md btn-primary " type="submit"   >Add</button>
             
             
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Album</th>
                  <th>Artist</th>
                  <th>Wait Time</th>
                  <th>Owner</th>
                  <th>Add to Que</th>
                  
                  
                </tr>
              </thead>
              <tbody>
               
                   
<?php
$db = new DB();
$record = $db->select('ALBUMS',"owner != ".$user_id." order by album" );
$owners = $db->select('USER','user_id is not null');
//
// create record object that will hold owner_id, album_id, album, artist, wait time, and owner email
//



$i = 1;
$userN;
foreach ($record as $records) {
    foreach ($owners as $user) {
        if ($user['user_id'] == $records['owner']) {
            $userN = $user['username'];
        }
    }    
    echo '<tr>';
    echo '<td>'.$i.'</td>';
    echo '<td>'.$records['album'].'</td>';
    echo '<td>'.$records['artist'].'</td>';
    echo '<td>N/A</td>';
    echo "<td>".$userN."</td>";
    
    echo '<td><input type="radio" name="add" value="'.$records['album_id'].'"></td>';
   
    echo '</tr>';
    $i++;
}


?>
                  
                
              </form>  
              </tbody>
            </table>
          </div>
          </form>
            </div>  
          </div>
        </div>
    </body>
     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
</html>