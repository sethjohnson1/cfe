<?
// this is for the Session flash messages, I have modified UsersPlugin and Templates Controller to use it
//$type is for bootstrap selector
if (empty($type)) $type='danger';
?>
<div id="sessionFlash" class="alert alert-dismissible fade in alert-<?=$type?> session-flash">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<?=$message?>
</div>