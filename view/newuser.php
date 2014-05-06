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

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">VinylTrade</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../view/index.php">Sign in</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="content">

      <div class="starter-template">
        <h1>New User Registration</h1>  
      </div>
    
<div class="main">     
  <div class="container">
    <form role="form" action="../model/add_user.php" method="post">
        <div class="form-group">
    <label for="exampleInputPassword1">Username</label>
    <input type="text" class="form-control" id="shippingaddress" placeholder="Username" name="userName" style="width: 300px;">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" style="width: 300px;">
  </div>
        <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="confirm_password" style="width: 300px;">
  </div>
        <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="First Name" name="firstName" style="width: 300px;">
  </div>
        <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Last Name" name="lastName" style="width: 300px;">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" style="width: 300px;">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Phone Number" name="phone" style="width: 300px;">
  </div>        
  
  
  <div class="form-group">
    <label for="exampleInputPassword1">Street Address</label>
    <input type="text" class="form-control" id="shippingaddress" placeholder="Street Address" name="address" style="width: 300px;">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">City</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="City" name="city" style="width: 300px;">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Zip Code</label>
    <input type="text" class="form-control" id="shippingaddress" placeholder="Zip Code" name="zipCode" style="width: 200px;">
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
    echo "<option value='".$printData[$i]."'>".$printData[$i]."</option>";
}
fclose($rhandle);
    
    
?>
  </select>

</div> 
<button type="submit" class="btn btn-default">Submit</button>
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
