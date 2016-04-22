<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>


<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width,user-scalable=1, minimum-scale=1.0, maximum-scale=4.0">




<?php 

	//echo $this->Html->charset(); 
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
		echo '<title>Cody Firearms Experience</title>';
		
	if(!empty($TheDescription))	
		echo '<meta name="description" content="'.$TheDescription.'" />';
	else
		echo '<meta name="description" content="Featuring a family-friendly western arcade, and guided experiences with authentic western firearms in a modern facility. Full retail with unique and interesting items." />';

	

	
?>
  <script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-56377926-1', 'auto');

  ga('send', 'pageview');



</script>

<?
	if(!empty($FeaturedImage))	echo '<meta property="og:image" content="'.$FeaturedImage.'=?v=2" />';
?>
</head>
<body>
<style>

</style>
<div class="container sitewide entire" style="padding-bottom:50px">
<?//the menu array is set on the AppController?>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container sitewide navbar-only">
          <div class="navbar-header">
            <?=$this->Html->image('45_long_colt.png',array('style'=>'float:left;width:13%;padding:6px','class'=>'hidden-sm hidden-xs'))?>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
			
            <?=$this->Html->link('Cody Firearms Experience','/',array('class'=>'navbar-brand hidden-xs'))?>
			<?=$this->Html->link('Cody Firearms Experience','/',array('style'=>'font-size:.8em','class'=>'navbar-brand hidden-xl hidden-lg hidden-md hidden-sm'))?>
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
<div style="padding-top: 50px">
			<?php echo $this->fetch('content'); ?>
</div>

<footer class="footer row" style="margin: 0 10px 0 10px;">


		<div class="col-sm-8">
		<h4>Mission Statement</h4>
		<p>To provide a quality environment that explains the historical significance and evolution of firearms in the old west that teaches firearms safety and use, and allows people to experience that history through the actual use of firearms.</p>
		</div>

		
		<div class="col-sm-4">
		<h4>Contact Us</h4>
		<ul>
		<li>142 W. Yellowstone Ave Cody, Wyoming, USA 82414</li>
		<li>(307)586-4287</li>
		<li><a href="#" class="" data-toggle="modal" data-target="#contactModal">Email</a></li>	
		</ul>
		</div>

      </footer>
			<p align="center"><?='&copy; '.date('Y').' Cody Firearms Experience, LLC. Credit card processing and online booking are Powered by <a href="http://www.mindbody.com">MINDBODY</a>.'?></p>
</div><!-- /container -->

<?
//load all the modals
echo $this->element('modal_contact');
?>
</body>
</html>