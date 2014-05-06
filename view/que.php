<!DOCTYPE html>

<!--
    que.php

    the user's que is displayed on this page. the user may delete records from their que.
    in the future, functionality that will allow the user to move records up or down the que 
    list will be added
-->
<html>
<?php 

include '../model/global.php'; 
$user_id = $_SESSION['user_id']; 

$db = new DB();
$record = $db->userQueSelect($user_id);
$owners = $db->select('USER','user_id is not null');
$userN;
?>
    <head>
        <title>Edit Record Que</title>
        
        <!-- Bootstrap core CSS -->
        <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Custom styles for this template -->
        <link href="quepage.css" rel="stylesheet">
    </head>
    <body>
        <?php include '../include/vinylNavbar.php'; ?>
        
        <div class="container-fluid">
      <div class="row">
        <?php include ('../include/vinylSidebar.php'); ?>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Your Que  </h2>
          <form action="../model/delete_from_que.php" method="post">
              <button class="btn btn-md btn-primary " type="submit" 
<?php 
if(!isset($record[1])) {
    if($record['owner'] == "") {
        echo 'disabled'; 
    }
}   
?>  
                      >Delete</button>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Album</th>
                  <th>Artist</th>
                  <th>Wait Time</th>
                  <th>Owner</th>
                  <th>Delete</th>
                  
                  
                </tr>
              </thead>
              <tbody>
                
<?php

//
// create record object that will hold owner_id, album_id, album, artist, wait time, and owner email
//
if($record[0] == "") {
    //do nothing
}
if (!isset($record[1])) {
    if($record['owner'] == "") {
        //do nothing
    }
    else {
        foreach ($owners as $user) {
            if ($user['user_id'] == $record['owner']) {
                $userN = $user['username'];
            }
        }    
        echo '<tr>';
        echo '<td>1</td>';
        echo '<td>'.$record['album'].'</td>';
        echo '<td>'.$record['artist'].'</td>';
        echo '<td>N/A</td>';
        echo '<td>'.$userN.'</td>';
        echo '<td><input type="radio" name="delete" value="'.$record['album_id'].'"></td>';
        echo '</tr>';
    }
}
else { 
    $i = 1;
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
        echo '<td>'.$userN.'</td>';
        echo '<td><input type="radio" name="delete" value="'.$records['album_id'].'"></td>';
        echo '</tr>';
        $i++;
    }
} 

?>
                  
                              
                
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