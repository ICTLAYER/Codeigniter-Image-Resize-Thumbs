<html>
<head>
	<title>Upload Form</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<br>	
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-3">
				<?php foreach ($images as $image) { ?>
					<table class="table">
						<tr>
							<td><img src="<?php echo $image->filename ?>"></td>
						</tr>
					</table>
				<?php } ?>
				<a href="<?php echo base_url()?>" class="btn-success btn btn-sm">Upload another one</a>
			</div>
		</div>
	</div>
</body>
</html>