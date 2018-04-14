<?php
$connect=new PDO("mysql:host=localhost;dbname=testing4",'root','' );

 function fill_unit_select_box($connect)
 {
 	$output='';
  $get_table_items=$connect->prepare("Select * From tbl_unit ORDER BY unit_name ASC");
    $get_table_items->execute();
  $get_table_data= $get_table_items->fetchAll();
   foreach ($get_table_data as  $value) 
   {
   	   $output .='<option value='.$value['unit_name'].'>'.$value['unit_name'].' </option>';
   }

   return $output;
 }
  

?>

<!DOCTYPE html>
<html>
<head>
	<title>jquery select box</title>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
 <div class="container">
 	<div class="content_header">
 		<header>
 			<p><h3 style="text-align: center;">Add and remove select element in PHP</h3></p>
 			<p class="text-center text-info"><mark>enter item list</mark></p>
 		</header>
 	</div>


<hr>
  <!--main content here-->
	  <form class="form" id="form" method="POST">
	    <div class="table-responsive">
	    <span id="error"></span>
 		  <table class="table table-bordered" id="item_table">
 		  	<thead>
 		  		<tr>
 		  			<th>item Name</th>
 		  			<th>Quantity</th>
 		  			<th>Select item</th>
 		  			<td> 
 		  			<button id="add_link" type="button" class="btn btn-success btn-sm"> 
 		  			<span class="glyphicon glyphicon-plus"></span> </button>
 		  			</td>
 		  		</tr>
 		  	</thead>
 		   
 		  </table>
 		</div>

 		<button class="btn btn-primary center-block" id="submit" type="submit">submit</button>
	  </form>	
 	</div>
</body>
</html>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
	$(document).ready(function(){
		$('.container').on('click', '#add_link', function()
		{
			var add_content ="<tr><td> <input type='text' name='item_name[]' class='form-control item_name'> </td> <td> <input type='text' name='item_quantity[]' class='form-control item_quantity'> </td> <td><select name='item_unit[]' class='form-control item_unit'><option value=''> Select Unit </option>  <?php echo fill_unit_select_box($connect); ?>  </select> </td> <td> <button type='button' id='delete_link' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-minus'></span> </button> </td> </tr>";
    	   $('#item_table').append(add_content);

		});

		$('.container').on('click', '#delete_link', function(e)
		{
             $(this).closest('tr').remove();
		});



		$('#form').submit(function(e)
		{
          e.preventDefault();
          var error='';
        	var count=1;
          $('.item_name').each(function()
          {
          	if($(this).val() == '')
          	{
          		error +='<p>enter item at '+count+' row</p>';
          		return false;
          	}
          	 count=count+1;
          });

          $('.item_quantity').each(function()
          {
        	var count=1;
          	if($(this).val() == '')
          	{
          		error += '<p>enter item Quantity at'+count+' row</p>';
          		return false;
          	}
          	     count=count+1;
          });


          $('.item_unit').each(function(){
           var count=1;
           if( $(this).val() == '')
           {
           	 error += '<p>enter item unit at'+count+' row</p>';
           	 return false;
           }
             count=count+1;
          });


         var form_data= $(this).serialize();
         if(error=='')
         {
           $.ajax({
             method: 'POST',
             data: form_data,
             url: 'insert.php',
             success: function(data)
             {
               if(data == 'ok')
               {
               	$('#item_table').find('tr:gt(0)').remove();
               	$('#error').html('<div class="alert alert-success">Items details saved</div>');
               }
             }
           });
         }
         else
         {
         	$('#error').html('<div class="alert alert-danger">'+error+'</div>');
         }

		});


 
	});
</script>