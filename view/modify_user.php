<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>New User Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../view/newuser.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php include ('../include/vinylNavbar.php'); ?>
<div class="center_content"> 
    <div class="content">

      <div class="starter-template">
        <h1>Modify User Information</h1>  
      </div>
 <?php 
require_once '../model/global.php';

$user_id = $_SESSION['user_id'];

$db = new DB();

$where = "user_id = ".$user_id;

$user = $db->select('USER',$where);

?>
   
  <div class="container">
    <form role="form" action="../model/update_user.php" method="post">
        
        <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" <?php if(!empty($user['firstName'])) echo 'placeholder='.$user['firstName']; ?> name="firstName" style="width: 300px;">
  </div>
        <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" <?php if(!empty($user['lastName'])) echo 'placeholder='.$user['lastName']; ?> name="lastName" style="width: 300px;">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" <?php if(!empty($user['email'])) echo 'placeholder='.$user['email']; ?> name="email" style="width: 300px;">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input type="text" class="form-control" id="exampleInputEmail1" <?php if(!empty($user['phone'])) echo 'placeholder='.$user['phone']; ?> name="phone" style="width: 300px;">
  </div>        
  
  
  <div class="form-group">
    <label for="exampleInputPassword1">Street Address</label>
    <input type="text" class="form-control" id="shippingaddress" <?php if(!empty($user['streetAddress'])) echo 'placeholder='.$user['streetAddress']; ?> name="address" style="width: 300px;">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">City</label>
    <input type="text" class="form-control" id="exampleInputEmail1" <?php if(!empty($user['city'])) echo 'placeholder='.$user['city']; ?> name="city" style="width: 300px;">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Zip Code</label>
    <input type="text" class="form-control" id="shippingaddress" <?php if(!empty($user['zip'])) echo 'placeholder='.$user['zip']; ?> name="zipCode" style="width: 200px;">
  </div>
<!-- Single button -->
<div class="form-group">

 
    <label>State</label><br />
  <select name="state"  role="menu">
<?php 
$rhandle = fopen("50states.csv","r");
$count;
$printData;
while(!feof($rhandle)) {
    $data = fgets($rhandle);
    $splitData = split(",",$data);
    $printData = str_replace(","," ",$splitData);
    $count = sizeof($printData);
    
}
for ($i = 0;$i < $count;$i++) {
    if($user['state'] == $printData[$i]) {
        echo "<option value='".$printData[$i]."'selected>".$printData[$i]." </option>";
    }
    else {
        echo "<option value='".$printData[$i]."'>".$printData[$i]."</option>";
    }
}
fclose($rhandle);
    
    
?>
  </select>

</div> 
<button type="submit" class="btn btn-default">Save</button>
</form>    

      
</div>
</div>
</div><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
