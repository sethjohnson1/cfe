<?php
$title='Notify me';
$meta_desc='Sign up and we will email you when we are ready to start taking reservations.';
include('head.php');
?>

<body style="background-image: url('wood.jpg');">

<div data-role="page" data-dialog="true">

		<!-- div data-role="header" data-theme="b">
		<h1>Dialog</h1>
		</div -->
		<div role="main" class="ui-content" style="background-color: white;">
		<h1>A few details...</h1>
		<h3 style="color: red;">This is a test web site. We'll let you know when we start taking real reservations.</h3>
		<p>We'll let you know when we're ready to start taking reservations. E-mails are not sold or spammed.</p>
		<!-- label for="text-basic">Text input:</label -->
		<form name="contact">
		<input type="email" name="em" id="text-basic" required placeholder="Enter a valid e-mail address" value="">
		<label for="followup">If you would like someone to contact you ASAP, choose 'Yes'</label>
		<select name="followup" id="followup" data-role="slider">
			<option value="off">No</option>
			<option value="on">Yes</option>
		</select>
		<input type="submit" value="Submit" data-theme="c"	/>
		</form>
			<a href="index.php" data-rel="back" class="ui-btn ui-shadow ui-corner-all ui-btn-b" data-theme="b">Cancel</a>
		</div>
	</div>

</body>
</html>