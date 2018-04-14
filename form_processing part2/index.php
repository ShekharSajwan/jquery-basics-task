<?php
$output=null;
if(isset($_POST['submit']))
{
  $mysqli=new mysqli('localhost','root','','testing1');
  $make=$_POST['make'];
  $modal=$_POST['modal'];
  $serial=$_POST['serial'];

  foreach ($make as $key => $value) 
  {
    $query ="SELECT serial_no FROM brand_table WHERE serial_no='".$mysqli->real_escape_string($serial[$key]) ."' LIMIT 1";
    $result_set=$mysqli->query($query);

    if($result_set->num_rows == 0)
    {
      $insert_query=$mysqli->query("INSERT INTO brand_table
    (make,modal,serial_no) values ('".$mysqli->real_escape_string($make[$key])."','".$mysqli->real_escape_string($modal[$key])."','".$mysqli->real_escape_string($serial[$key])."')");
      if(!$insert_query)
      {
        $output .="something error".$mysqli->error;
      }
      {
        $output .="modal successfully added <br>";
      }

    }
    else
    {
      $output .="<p>this is already exist. <br></p>".$mysqli->error;
    }
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 <link rel="stylesheet" type="text/css" href="../alertifyInForm/css/alertify.min.css">
</head>
<body>
<form class="form" id="reg_form" method="POST">
 <div id="container">
 	 <p>
 	 	   make: <input type="text" name="make[]" id="value_1">
 			modal:<input type="text" name="modal[]" id="value_2">
 			serial: <input type="text" name="serial[]" id="value_3">
 			<a href="#" id="add_new_field">Add</a>
 	 </p>
 </div>
 	 <button type="submit" class="btm btn-primary" name="submit">Add</button>
 	</form>
  <?php
   
   echo "$output";


  ?>

</body>
</html>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../alertifyInForm/alertify.min.js"></script>

<script>
	$(document).ready(function(){
    
   $('#submit').on('click', function(e)
   {
        e.preventDefault();
        var serialVal = $('input#value_3').val().length;
         var makeVal = $('input#value_2').val().length;
          var modalVal = $('input#value_1').val().length;
    if(serialVal == '' || makeVal == '' || modalVal=='')
    {
      alertify.alert('No value?', 'Fill all input fields.', function(){ alertify.success('Got it.'); });
        return false;
    }
   });
		var max_rows=5;
		var row=1;
		var newDiv='<p /> <div>make: <input type="text" name="make[]" id="child_value_1">modal:<input type="text" name="modal[]"   id="child_value_2">serial: <input type="text" name="serial[]"  id="child_value_3"><a href="#" id="remove_link">x</a></div>';
   
     if($())
     $('#add_new_field').click(function(e)
     { 
     	if(row <= max_rows)
     	{
     		//add rows in form fields
           $('#container').append(newDiv);
           row++;
     	}
     	
      
     });

     //removes rows in form field

     $('#container').on('click','#remove_link' ,function(e){
       $(this).parent('div').remove();
       row--;
     });


     //adding input value to child input field

     $('#container').on('dblclick','#child_value_1',function(e)
     {
       $(this).val($('#value_1').val());
     });


          $('#container').on('dblclick','#child_value_2',function(e)
     {
       $(this).val($('#value_2').val());
     });

               $('#container').on('dblclick','#child_value_3',function(e)
     {
       $(this).val($('#value_3').val());
     });


	});
</script>