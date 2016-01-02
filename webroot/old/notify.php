<?php
//this occurs if form has been submitted
if (isset($_GET['em'])){
if (filter_var($_GET['em'], FILTER_VALIDATE_EMAIL)) {
//otherwise the form was tampered with
	$fu='';
	if ($_GET['followup']=='on') $fu=' Requested immediate followup';
	mail('seth@sethjohnson.net','Email submitted',$_GET['em']."\n".$_GET['ex']);
	//$submitted='true';
	}
session_start();
$_SESSION['sent']=1;
header('Location: index.php');
}
$title='Notify me';
$meta_desc='Sign up and we will email you when we are ready to start taking reservations.';
include('head.php');
include 'page.php';
?>
<img class="banner" src="img/logo_72.png" alt="Wyoming Firearms Experience"/>
<div class="ui-body ui-body-a ui-corner-all">
	<h1>Opening Summer 2015</h1>
</div>
<br />
<div class="ui-body ui-body-a ui-corner-all">
	<!-- h3 style="color: red;">We'll let you know.</h3 -->
	<!-- label for="text-basic">Text input:</label -->
	<h3>Get a Special Coupon when we open</h3>
	<form name="contact">
	<input type="email" name="em" id="text-basic" required placeholder="E-mail address" value="">
	<label for="slider-2">Show your Enthusiasm (optional):</label>
	<input type="range" name="ex" id="slider-2" value="50" min="0" max="100" data-highlight="true">
	<?php /*
	<label for="followup">If you would like someone to contact you ASAP, choose 'Yes'</label>
	<select name="followup" id="followup" data-role="slider">
		<option value="off">Patient</option>
		<option value="on">Impatient</option>
	</select>
	*/
	?>
	<input type="submit" value="Submit" data-theme="c"	/>
	</form>
		<!--a href="index.php" data-rel="back" class="ui-btn ui-shadow ui-corner-all ui-btn-b" data-theme="b">Cancel</a -->
</div>

<!-- a href="notify.php" class="ui-btn ui-shadow ui-corner-all ui-icon-arrow-r ui-btn-icon-right" id="sj_button" data-transition="slide">Notify Me</a -->
	
<?php
include 'foot.php';
?>