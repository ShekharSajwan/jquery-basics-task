<!DOCTYPE html>
<html>
<head>
	<title>jquery</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
<link rel="stylesheet" type="text/css" href="css/alertify.css">
</head>
<body>

<button class="btn btn-danger" type="button" id="alertify_button">alert box</button>

<button class="btn btn-primary" type="button" id="alertify_button1">confirm message</button>
<button class="btn btn-success" type="button" id="alertify_button2">prompt alert</button>
<button class="btn btn-warning" type="button" id="alertify_button3">Nagging message</button>
</body>
</html>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="alertify.js"></script>
<script src="alrertify.min.js"></script>
<script>
	$('#alertify_button').on('click' , function(){
      
if(!alertify.myAlert){
  //define a new dialog
  alertify.dialog('myAlert',function factory(){
    return{
      main:function(message){
        this.message = 'this is alertify alert box';
      },
      setup:function(){
          return { 
            buttons:[{text: "cool!", key:27/*Esc*/}],
            focus: { element:0 }
          };
      },
      prepare:function(){
        this.setContent(this.message);
      }
  }});
}
//launch it.
alertify.myAlert("Browser dialogs made easy!");
	});

  $('#alertify_button1').on('click' , function(){
    alertify.confirm('Confirm Title', 'Confirm Message', function(){ alertify.success('Ok') }
                , function(){ alertify.error('Cancel')});
  });


  $('#alertify_button2').on('mouseenter' , function(){
    alertify.prompt( 'Prompt Title', 'Prompt Message', 'Prompt Value'
               , function(evt, value) { alertify.success('You entered: ' + value) }
               , function() { alertify.error('Cancel') });
  });
  
  $('#alertify_button3').on('mouseenter' , function(){
   var nagCount = 2;
 var msg = alertify.message('Nagging message!',0, function(){
                if(--nagCount > 0){
                   setTimeout(function(){msg.push("I'm back :P ");}, 500);
                }else{
                   setTimeout(function(){msg.push("Ok! last time :)");}, 500);
                   msg.callback = null;
                }
           });
  });
</script>