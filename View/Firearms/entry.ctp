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

<div id="cfe_entry_Carousel" class="carousel slide" data-ride="carousel">
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