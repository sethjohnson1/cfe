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
<div class="col-xs-12 col-md-8 no-pad">
<?$main_img=$this->Html->image('cfe_new_homepage.jpg',array('class'=>'img-responsive','alt'=>'Cody Firearms Experience'));echo $this->Html->link($main_img,array('action'=>'packages'),array('escape'=>false));?>
</div>

<div class="col-xs-12 col-md-4 no-pad">
<div class="video-container">
         <iframe src="https://www.youtube.com/embed/<?=$youtube['Firearm']['setting_value']?>" frameborder="0" width="560" height="315"></iframe>
</div>
</div>
<div class="col-xs-12 col-md-4 no-pad" style="">
<?=$this->Html->image('shooters.jpg',array('class'=>'img-responsive'))?>
</div>

</div><!-- carousel row -->
	<script>
	//example to  customize carousel, set to zero for testing
	$('.carousel').carousel({
		interval: 0
	});
	</script>
<div class="row top-pad">
<div class="col-xs-12">
<?=$this->Html->link('Book Online Now!',array('controller'=>'firearms','action'=>'packages'),array('class'=>'btn btn-lg date-btns'))?>
</div>
</div>
<div class="row top-pad">
<div class="col-xs-12">
<h1>Western-Themed Arcade <small>Fun for the entire family</small></h1>
</div>
</div>


<div class="row">
<div class="col-xs-12 no-pad">
<?=$this->Html->image('examples/arcade.jpg',array('class'=>'img-responsive'))?>
</div>
<div class="col-xs-12 top-pad">
<h1>State-of-the-Art Range <small>Modern Facility with Western feel</small></h1>
</div>
</div>

<div class="row">
<div class="col-xs-12 no-pad">
<?=$this->Html->image('examples/range.jpg',array('class'=>'img-responsive'))?>
</div>

<div class="col-xs-12 top-pad">
<h1>North American Widlife Display <small>Now Open! Photos Coming soon</small></h1>
</div>
</div>

<div class="row">
<div class="col-xs-12 no-pad">
<?=$this->Html->image('examples/front_photo.jpg',array('class'=>'img-responsive'))?>
</div>
<div class="col-xs-12 top-pad">
<h1 align="center">142 W. Yellowstone Ave.<br /><small>Cody, Wyoming, USA 82414<br/>(307)586-4287</small></h1>
</div>
</div>

<div class="row">
<div class="col-sm-4 top-pad">
<?=$this->Html->link('Packages',array('controller'=>'firearms','action'=>'packages'),array('class'=>'btn btn-lg date-btns'))?>
</div>
<div class="col-sm-4 top-pad">
<?=$this->Html->link('Firearms History',array('action'=>'learn','history','horses_and_firearms'),array('class'=>'btn btn-lg date-btns'))?>
</div>
<div class="col-sm-4 top-pad">
<?=$this->Html->link('Our Firearms',array('action'=>'learn','firearm','indian_trade_musket'),array('class'=>'btn btn-lg date-btns'))?>
</div>
</div>
<div class="row jumbotron firearm" style="margin-top:17px;">
<div class="col-xs-12">

<h1 align=center>Book Online<small> Hassle-free</small></h1>
<?foreach ($pickpkg as $id=>$pkg):?>
<div class="col-xs-12" style="padding:10px;">
<?=$this->Html->link($pkg['Name'],array('action'=>'pickdate',$id,$pkg['SessionTypeID']),array('class'=>'btn btn-lg btn-success date-btns','style'=>'','onclick'=>$this->element('blockui',array('msg'=>'Checking dates...'))))?>

</div>
<?endforeach?><h3 align=center>Call us for lane rental information. Memberships available! (307) 586-4287</h3>
</div>
</div>