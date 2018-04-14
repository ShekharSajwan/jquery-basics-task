<!DOCTYPE html>
<html>
<head>
	<title>jquery</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<style>
	.form-group
	{
		padding: 10px;
	}
</style>
<body>
 <div class="container">
 	  <header>
 	  	<h2>Upload any Images</h2>
 	  </header> <hr>
 	 
 		  <form class="form-inline" method="POST" enctype="multipart/form-data">
 		  	<div class="form-group fileFirst">
 		  	 <label for="file1">File First:</label>
 		  	 <input type="file" name="file1" class="form-control">
 		  	 <button class="btn btn-primary" type="submit" id="uploadFile1">Upload</button>	
 		     <button class="btn btn-danger cancel" type="button">Cancel</button>	
 	      	</div>

 	      	<div class="progress progress-striped active">
 	      		<div class="progress-bar" style="width: 0%;"></div>
 	      	</div>
 		  </form>
 	 
        <hr>
 	 
 		  <form class="form-inline" method="POST"  enctype="multipart/form-data">
 		  	<div class="form-group fileSecond">
 		  	 <label for="file1">File Second:</label>
 		  	 <input type="file" name="file1" id="file1" class="form-control">
 		  	 <button class="btn btn-primary" type="submit" id="uploadFile1">Upload</button>	
 		  	  <button class="btn btn-danger cancel" type="button">Cancel</button>		
 	      	</div>

 	      	<div class="progress progress-striped active">
 	      		<div class="progress-bar" style="width: 0%;"></div>
 	      	</div>
 		  </form>
 	 
         <hr>
 
 		  <form class="form-inline" method="POST"  enctype="multipart/form-data">
 		  	<div class="form-group fileThird">
 		  	 <label for="file1">File Third:</label>
 		  	 <input type="file" name="file1" id="file1" class="form-control">
 		  	 <button class="btn btn-primary" type="submit" id="uploadFile1">Upload</button>	
 		   <button class="btn btn-danger cancel" type="button">Cancel</button>	
 	      	</div>

 	      	<div class="progress progress-striped active">
 	      		<div class="progress-bar" style="width: 0%;"></div>
 	      	</div>

 		  </form>
 	 
 	</div>
 </div>
</body>
</html>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
	$(document).on('submit','form',function(e){
     e.preventDefault();
     $form=$(this);
     uploadImage($form);
	});

	function uploadImage($form)
	{
		$form.find('.progress-bar').removeClass('progress-bar-danger').removeClass('progress-bar-success');

		var form_data=new FormData($form[0]);
		var request=new XMLHttpRequest();
 
		request.upload.addEventListener('progress', function(e)
		{
          var percent=Math.round(e.loaded/e.total * 100);
          $form.find('.progress-bar').width(percent +'%').html(percent+'%');
		});

		request.addEventListener('load', function(e)
		{
         $form.find('.progress-bar').addClass('progress-bar-success').html('upload completed...');

		});

		request.open('POST', 'server.php');
		request.send(form_data);

		$form.on('click','.cancel', function(e)
		{
          request.abort();
          $form.find('.progress-bar').addClass('progress-bar-danger').removeClass('progress-bar-success').html('upload aborted...');
		});

	}
</script>