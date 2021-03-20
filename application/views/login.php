<html>
<head>
	<title>Login Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h4  style="margin-top:50px;">Please Login to your account</h4>
		<form action="<?php echo base_url(); ?>user-login" method="post">
			<div class="form-group">
				<label for="email">Username:</label>
				<input type="text" class="form-control col-md-4" placeholder="Enter Username" name="username" required>
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control col-md-4" placeholder="Enter password" name="pwd" required>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>



	</div>
</body>

</html>