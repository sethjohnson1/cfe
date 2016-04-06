<?
$carousel=array(
0=>array(
	'h'=>'These header images have text like this',
	'p'=>'The trick here is we need narrow 1082x1443 for small devices and 1175x500 for wide-screen. The larger res for small devices makes high-quality mobile screens (i.e. retina display) look really good. We can mess with the dimensions if you feel it necessary.',
	'btn'=>'Reserve Now',
	'link'=>'#'
),
0=>array(
	'h'=>'',
	'p'=>'',
	'btn'=>'',
	'link'=>'#'
),
2=>array(
	'h'=>'',
	'p'=>'',
	'btn'=>'',
	'link'=>'#'
),
1=>array(
	'h'=>'',
	'p'=>'',
	'btn'=>'',
	'link'=>'#'
)
);
?>
<div class="row">
<div class="col-xs-12 no-pad">
<div id="cfe_entry_Carousel" class="carousel slide" data-ride="carousel"  >
      <!-- Indicators -->
      <ol class="carousel-indicators">
	  <?
	  foreach($carousel as $key=>$val):
	  if ($key==0) $active='active';
	  else $active='';
	  ?>
        <li data-target="#cfe_entry_Carousel" data-slide-to="<?=$key?>" class="<?=$active?>"></li>
     <?endforeach?>
	 </ol>
	 
      <div class="carousel-inner" role="listbox">
        <?foreach($carousel as $key=>$val):
			if ($key==0) $active='active';
			else $active='';
		?>
		<div class="item <?=$active?>">
		<?=$this->Html->image('entry_carousel/carousel_'.$key.'.jpg',array('alt'=>'Cody Firearms Experience Welcome','class'=>'hidden-xs hidden-sm'))?>
		<?=$this->Html->image('entry_carousel/carousel_sm_'.$key.'.jpg',array('alt'=>'Cody Firearms Experience Welcome','class'=>'hidden-md hidden-lg'))?>

        </div>
		<?endforeach?>
      </div>
      <a class="left carousel-control" href="#cfe_entry_Carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#cfe_entry_Carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
</div><!-- /cfe_entry_Carousel -->
</div>
</div><!-- carousel row -->
	<script>
	//example to  customize carousel, set to zero for testing
	$('.carousel').carousel({
		interval: 0
	});
	</script>
<div class="row">

<div class="col-xs-12">
<h1>Western-Themed Arcade <small>Fun for the entire family</small></h1>
</div>
</div>

<div class="row">
<div class="col-xs-12 no-pad">
<img src="http://placehold.it/1170x293" class="img-responsive"/>
</div>
<div class="col-xs-12">
<h1>State-of-the-Art Range <small>Modern Facility with Western feel</small></h1>
<h2>heading two</h2>
<h3>heading three</h3>
</div>
</div>

<div class="row">
<div class="col-xs-12 no-pad">
<img src="http://placehold.it/1170x293" class="img-responsive"/>
</div>
<div class="col-xs-12">
<h1>North American Widlife Display <small>Coming soon!</small></h1>
</div>
</div>

<div class="row">
<div class="col-xs-12 no-pad">
<img src="http://placehold.it/1170x293" class="img-responsive"/>
</div>
</div>
<div class="row">
<div class="col-sm-4" style="padding-top:17px">
<?=$this->Html->link('Browse Packages',array('controller'=>'firearms','action'=>'packages'),array('class'=>'btn btn-success btn-lg date-btns'))?>
</div>
<div class="col-sm-4" style="padding-top:17px">
<?=$this->Html->link('Learn More',array('action'=>'learn','history','horses_and_firearms'),array('class'=>'btn btn-success btn-lg date-btns'))?>
</div>
<div class="col-sm-4" style="padding-top:17px">
<?=$this->Html->link('Key Firearms',array('action'=>'learn','firearm','gatling_gun'),array('class'=>'btn btn-success btn-lg date-btns'))?>
</div>
</div>
<div class="row jumbotron" style="background-color:#dccba9;margin-top:17px;">
<div class="col-xs-12">

<h1 align=center>Book Online<small> Hassle-free</small></h1>
<?foreach ($pickpkg as $id=>$pkg):?>
<div class="col-xs-12" style="padding:10px;">
<?=$this->Html->link($pkg['Name'],array('action'=>'pickdate',$id,$pkg['SessionTypeID']),array('class'=>'btn btn-lg btn-success date-btns','style'=>'','onclick'=>$this->element('blockui',array('msg'=>'Checking dates...'))))?>

</div>
<?endforeach?>
</div>
</div>