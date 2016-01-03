<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>



<meta name="viewport" content="width=device-width,user-scalable=1, minimum-scale=1.0, maximum-scale=4.0">




<?php 

	echo $this->Html->charset(); 
	//echo $this->Html->meta('icon', $this->Html->url('http://collections.centerofthewest.org/img/truckerhat.ico'));
	

	echo $this->Html->script('jquery.min');
	echo $this->Html->script('bootstrap.min');
	echo $this->Html->css('bootstrap.min');
	

//	echo $this->Html->css('proctor_overrides.css');

	//echo $this->Html->script('sj_cookie1');	

	echo $this->Html->meta('icon');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	echo $this->Html->css('cfe');
	
?>

<?php 
	if(!empty($TheTitle))	
		echo '<title>'.$TheTitle.'</title>';
	else 
		echo '<title>CFE Test Site</title>';
		
	if(!empty($TheDescription))	
		echo '<meta name="description" content="'.$TheDescription.'" />';
	else
		echo '<meta name="description" content="CFE test website" />';

	

	
?>
<!-- PUT GA HERE
<script type="text/javascript">
var _gas = _gas || [];
_gas.push(['_setAccount', 'UA-***************']); 
_gas.push(['_setDomainName', '.centerofthewest.org']);
_gas.push(['_require', 'inpage_linkid','//www.google-analytics.com/plugins/ga/inpage_linkid.js']);
_gas.push(['_trackPageview']);
_gas.push(['_gasTrackForms']);
_gas.push(['_gasTrackOutboundLinks']);
_gas.push(['_gasTrackMaxScroll']);
_gas.push(['_gasTrackDownloads']);
_gas.push(['_gasTrackVideo']); _gas.push(['_gasTrackAudio']);
_gas.push(['_gasTrackYoutube', {force: true}]);
_gas.push(['_gasTrackMailto']);

(function() {
var ga = document.createElement('script');
ga.id = 'gas-script';
ga.setAttribute('data-use-dcjs', 'true'); // CHANGE TO TRUE FOR DC.JS SUPPORT
ga.type = 'text/javascript';
ga.async = true;
ga.src = '//cdnjs.cloudflare.com/ajax/libs/gas/1.11.0/gas.min.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(ga, s);
})();
</script>
-->

<?
	if(!empty($FeaturedImage))	echo '<meta property="og:image" content="'.$FeaturedImage.'=?v=2" />';
?>
</head>
<body>

<div class="container-fluid">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
</div><!-- /container -->
</body>
</html>