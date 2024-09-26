<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title></title>
  
  
      <link rel="stylesheet" href="<?php echo base_url(); ?>login/css/style.css">

  
</head>

<body>

<?php	if (isset($gagal))
		{	echo ("	<div class='alert alert-error'>
					<strong>".$gagal."</strong>			 
					</div>
				");	
			unset($gagal);
		}  	 
?>

<form action="<?php echo base_url(); ?>/home/ceklogin" method="post" role="form">
  <h2>Login</h2>
  		<p>
			<label for="username" class="floatLabel">Username</label>
			<input id="username" name="username" type="text">
		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input id="password" name="password" type="password">
		</p>
		<p>
			<input type="submit" class="" value="LOGIN" name="login">
		</p>
		
	</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="<?php echo base_url (); ?>login/js/index.js"></script>




</body>

</html>
