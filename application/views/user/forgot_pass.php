<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>

</head>
<body>

<div id="main">
<div id="login">
<?php echo @$error; ?>
<h2>Forgot Password</h2>
<br>
<form method="post" action=''>
		<label>Email ID :</label>
		<input type="password" name="email" id="name" placeholder="Email ID"/><br /><br />
	    <input type="submit" value="login" name="forgot_pass"/><br />
</form>
</div>
</div>
</body>
</html>
 


<!-- <div class="col-md-8 col-md-offset-2">
	<form action="<?=base_url('logincheck')?>" method="post">
	<div class="row">
		<center>


<div class="col-md-7" style="float: unset;">
	<div class="form-group">
		<input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required">
		<p class="help-block text-danger"></p>
	</div>
</div>

<div class="col-md-7" style="float: unset;">
	<div class="form-group">
		<input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required="required">
		<p class="help-block text-danger"></p>
	</div>
</div>
</center>
<a href="<?base_url('Forgotpassword')?>">Forgot your password?</a>

<div id="success"></div>
<input type="submit" class="btn btn-custom btn-lg" value="Login">
</form>
</div>
</div>
</div> -->