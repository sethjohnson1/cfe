<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>



<meta name="viewport" content="width=device-width,user-scalable=1, minimum-scale=1.0, maximum-scale=4.0">




<?php 

	echo $this->Html->charset(); 
	//echo $this->Html->meta('icon', $this->Html->url('http://collections.centerofthewest.org/img/truckerhat.ico'));
	

	echo $this->Html->script('jquery.min');
	echo $this->Html->script('jquery.blockUI');
	//used by datepicker
	echo $this->Html->script('moment.min');
	echo $this->Html->script('bootstrap.min');
	echo $this->Html->css('bootstrap.min');
	echo $this->Html->script('bootstrap-datepicker.min');
	echo $this->Html->css('bootstrap-datepicker.min');
	

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
		echo '<title>'.$TheTitle.': Cody Firearms Experience</title>';
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
<div class="container sitewide">
<?//the menu array is set on the AppController?>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Cody Firearms Experience</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
             <?
		 //draw menu, first do some housekeeping
		foreach ($menu_array as $key=>$val):

		if (isset($val['action']) && $this->request['action']==$val['action']) $active='active';
		else $active='';
		if (!isset($menu_array[$key]['dropdown'])):
			?>
		  
		  <li class="<?=$active?>">
		  <?=$this->Html->link($key,$val)?>
		  </li>

		<?else:?>
              <!-- left this here as it may be useful later -->
			  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				<?=ucfirst($key)?>
				<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
				<?foreach ($menu_array[$key]['dropdown'] as $k=>$v):?>
                  <li>
				  <?=$this->Html->link($k,$v)?>
				  </li>
				 <?endforeach?>
                </ul>
              </li>
           <?
		   endif;
		   endforeach;
		   ?>
		   <li>
			  <!-- button type="button" class="btn btn-success navbar-btn" data-toggle="modal" data-target="#contactModal">Get Notified</button -->
		  </li>
		   </ul>
            <!--ul class="nav navbar-nav navbar-right">

            </ul -->
          </div><!--/.nav-collapse -->
        </div><!--/container menu -->
      </nav> 

 <script>
/* hides menu toggle on outside click */
$(document).on('click',function(){
	$('.collapse').collapse('hide');
})

</script>

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
			<p align="center"><?='&copy; '.date('Y').' Cody Firearms Experience, LLC. Credit card processing and online booking are Powered by <a href="http://www.mindbody.com">MINDBODY</a>.'?></p>
</div><!-- /container -->
</body>
</html>