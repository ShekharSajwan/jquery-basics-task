
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../alertifyInForm/css/alertify.min.css">

</head>
<body>
<div class="container">
	<form class="form" id="reg_form" method="POST">
		<div class="form_group">
			<label for="input_name1">
         type value 1:
			</label>
			<input type="text" class="form-control" id="Integer_value1">
		</div>
		<div class="form_group">
			<label for="input_name2">
         type value 2:
			</label>

			<input type="text" class="form-control" id="Integer_value2">
		</div>

    <div class="form_group">
      <label for="input_name2">
      TYPE OPERATOR:
      </label>

      <input type="text" class="form-control" id="Airthmetic_operator" placeholder="type any OPERATOR">
    </div>
         <hr>
		<button type="submit" id="button" class="btn btn-primary">Submit</button>
	</form>
</div>
  
<div id="results">
  
</div>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../alertifyInForm/alertify.min.js"></script>

</body>
</html>

<script>
   $(function ()
   {
      $('#reg_form').submit(function (e)
      {
          e.preventDefault();
         var Integer_value1= $(this).find('input#Integer_value1').val();
         var Integer_value2= $(this).find('input#Integer_value2').val();
         var Airthmetic_operator= $(this).find('#Airthmetic_operator').val();

          if(Integer_value1 != '' && Integer_value1!='' 
                                  && Airthmetic_operator !='')
          {
               $.ajax({
                  type:'POST',
                   data: {'Integer_value1' :Integer_value1, 
                   'Integer_value2' :Integer_value2, 
                   'Airthmetic_operator': Airthmetic_operator },
                   url: 'ajax_page.php',
                   async:false,
                   success: function (data)
                   {
                    if(data != '')
                    {
                      var result = '<div class=\'result\'>'+data+'</div>';
                      $('div#results').find('.result').remove('.result');
                      $('div#results').append(result);
                    }
                   }
               });
          }
          else
          {
             alertify.alert('No value?', 'Fill all input fields.', function(){ alertify.success('Got it.'); });

          }
          
      });
   });
</script>