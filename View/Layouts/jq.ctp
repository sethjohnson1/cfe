<?php

$cakeDescription = __d('cake_dev', 'WFE');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		//eventually wean myself off the generic
		echo $this->Html->css('wfe');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
		//now all the jQuery stuff
		echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
		echo $this->Html->css('themes/custom1.css');
		echo $this->Html->css('themes/jquery.mobile.icons.min.css');
		echo $this->Html->css('http://code.jquery.com/mobile/1.4.3/jquery.mobile.structure-1.4.3.min.css');
		echo $this->Html->script('http://code.jquery.com/jquery-1.11.1.min.js');
		echo $this->Html->script('http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js');
		echo $this->Html->script('wfe');
		echo "<link href='http://fonts.googleapis.com/css?family=Rye' rel='stylesheet' type='text/css'>";
		
	?>
</head>
<body>

<?php 

 echo $this->fetch('content'); ?>

</body>
</html>