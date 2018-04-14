<!DOCTYPE html>
<html>
<head>
	<title></title>

		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
  <div class="container">
  	<div class="row">
  		<div class="headerContent">
  			<header>
  				<h2>Most awesome file Uploader</h2>
  				<p>With the helop of this app we can easily see your <strong>photo</strong></p>
  			</header>
  			<hr>
  			<button type="button" class="btn btn-primary btn-lg" id="UploadImage" data-toggle='modal' data-target="#modalPopUp">Upload your Image</button>
  		</div>
  	</div>

  	<div class="modal" tabindex="-1" id="modalPopUp">
  		<div class="modal-dialog">
  			<div class="modal-content">
  				<div class="modal-header">
  					<h3 class="modal-title">Upload Images</h3>
  					<span class="close glyphicon-eye-close" data-dismiss="modal"></span> 
  				</div>
  				<div class="modal-body">
  				 <p>here you can easily upload you image and also can see which image do you really want to upload on the server.Enjoy with this app...</p>
  					<form class="form form-inline" method="POST">
  						<div class="form-group">
  							<input type="file" name="Images" class="form-control">
  							<button type="submit" class="btn btn-primary">Upload Images</button>
  						</div>
  					</form>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
</head>
<body>

</body>
</html>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
