<!DOCTYPE html>
<html>
<head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$(document).ready(function(){
 
$('#submit').click(function(){
 
$.post("send_contact_mail.php", $("#mycontactform").serialize(),  function(response) {
$('#success').html(response);
//$('#success').hide('slow');
});
return false;
 
});
 
});
</script>
</head>
<body>
 
<form action="" method="post" id="mycontactform" >
<label for="name">Name:</label><br />
<input type="text" name="name" id="name" /><br />
<label for="email">Email:</label><br />
<input type="text" name="email" id="email" /><br />
<label for="message">Message:</label><br />
<textarea name="message" id="message"></textarea><br />
<input type="button" value="send" id="submit" /><div id="success" style="color:red;"></div>
</form>
</body>
</html>