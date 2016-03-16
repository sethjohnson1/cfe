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
<div class="col-xs-12">
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
		<?=$this->Html->image('entry_carousel/carousel_'.$key,array('alt'=>'Cody Firearms Experience Welcome','class'=>'hidden-xs hidden-sm'))?>
		<?=$this->Html->image('entry_carousel/carousel_sm_'.$key,array('alt'=>'Cody Firearms Experience Welcome','class'=>'hidden-md hidden-lg'))?>

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
<div class="row">
<div class="col-md-6">
<h3>Firearms and Stories of the West</h3>
<p>The West – A place big and bold – Plains, Prairie, Desert, Mountains. Enjoy Brilliant sunsets and dark star-studded nights that shroud rushing rivers, spouting geysers, and extensive forests.  This is home to people for more than 10,000 years who relish the wild places and live off the bounty of the land. They’ve revered, conquered, tamed, settled.  Some only visit, but they are part of the Western fabric, too. Firearms are integral to the story of this great landscape and its people.</p>
</div>
<div class="col-md-6">
<h3>Family enviro</h3>
<p>Bacon ipsum dolor amet ground round bresaola ham hock sirloin. Alcatra tri-tip leberkas ground round picanha tail filet mignon doner capicola jerky porchetta bresaola. Doner pork loin kielbasa meatball chuck drumstick rump hamburger bacon porchetta tail chicken sirloin. Jowl meatball frankfurter shank, venison doner sirloin filet mignon leberkas pork belly kevin brisket.</p>
</div>
</div>
<div class="row jumbotron" style="background-color:#dccba9">
<div class="col-xs-12">

<h1 align=center>Book Online<small> Show up and shoot</small></h1>
<?foreach ($pickpkg as $id=>$pkg):?>
<div class="col-xs-12" style="padding:10px;">
<?=$this->Html->link($pkg['Name'],array('action'=>'pickdate',$id,$pkg['SessionTypeID']),array('class'=>'btn btn-lg btn-success date-btns','style'=>'','onclick'=>$this->element('blockui',array('msg'=>'Checking dates...'))))?>

</div>
<?endforeach?>
</div>
</div>