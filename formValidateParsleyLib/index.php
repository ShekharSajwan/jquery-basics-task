<!DOCTYPE html>
<html>
<head>
	<title>jquery</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="parsley.css">
</head>
<body>
<h4>Correctly fill at least one of these blocks</h4>
<form class="demo-form" data-parsley-validate="">
  <div class="first">
    <label for="firstname">Firstname:</label>
    <input type="text" class="form-control" name="firstname" data-parsley-length="[4, 20]" data-parsley-group="block1">

    <label for="lastname">Lastname:</label>
    <input type="text" class="form-control" name="lastname" data-parsley-length="[4, 20]" data-parsley-group="block1">
  </div>
  <hr>
  <div class="second">
    <label for="fullname">Fullname:</label>
    <input type="text" class="form-control" name="fullname" data-parsley-length="[8, 40]" data-parsley-group="block2" >
  </div>

  <div class="invalid-form-error-message"></div>
  <input type="submit" class="btn btn-default validate">
</form>

</body>
</html>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="parsley.min.js"></script>

<script type="text/javascript">
$(function () {
  $('.demo-form').parsley().on('form:validate', function (formInstance) {
    var ok = formInstance.isValid({group: 'block1', force: true}) || formInstance.isValid({group: 'block2', force: true});
    $('.invalid-form-error-message')
      .html(ok ? '' : 'You must correctly fill *at least one of these two blocks!')
      .toggleClass('filled', !ok);
    if (!ok)
      formInstance.validationResult = false;
  });
});
</script>