<script>
$(document).ready(function(){
 
$('#contact_submit').click(function(){
 
$.post("send_contact_mail.php", $("#mycontactform").serialize(),  function(response) {

if (response=="true"){
$('#message').fadeOut();
$('#message').removeClass('alert-danger');
$('#message').addClass('alert-success');
$('#message').html('<strong>Thank you!</strong> We appreciate the inquiry. <button type="button" class="btn-sm btn-info" data-dismiss="modal">Ok, Great!</button>');
$('#message').fadeIn();
}
else {
	$('#emailGroup').addClass('has-error');
	$('#message').addClass('alert-danger');
	$('#message').html(response);
	$('#message').fadeIn();
}
//$('#success').hide('slow');
});
return false;
 
});
 
});
</script>
<!-- Contact Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="Contact Modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Ready, Aim, Email</h2>
      </div>
      <div class="modal-body">

 
<form action="" method="post" id="mycontactform" >

<div style="display:none;" class="alert alert-danger" role="alert" id="message"></div>

<div class="form-group">
  <label class="control-label" for="name">Name</label>
  <input type="text" class="form-control" id="name">
</div>

  <div class="form-group" id="emailGroup">
    <label class="control-label" for="email">Email address</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
  </div>
  
<div class="form-group">
<label for="message">Message:</label>
<textarea class="form-control" rows="3" id="message"></textarea>
</div>

  <button type="submit" class="btn-lg btn-success" id="contact_submit">Send Message</button>
</form>
	   
	   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-xs btn-danger" data-dismiss="modal">[X] Close</button>
      </div>
    </div>
  </div>
</div>