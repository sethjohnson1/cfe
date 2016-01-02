<?
/* include everything */
require_once('header.php'); 
//the images are simply named after the key (see loop below)
$carousel=array(
0=>array(
	'h'=>'These header images have text like this',
	'p'=>'The trick here is we need narrow 1082x1443 for small devices and 1175x500 for wide-screen. The larger res for small devices makes high-quality mobile screens (i.e. retina display) look really good. We can mess with the dimensions if you feel it necessary.',
	'btn'=>'Reserve Now',
	'link'=>'#'
),
1=>array(
	'h'=>'These header images have text like this',
	'p'=>'The trick here is we need narrow 1082x1443 for small devices and 1175x500 for wide-screen. The larger res for small devices makes high-quality mobile screens (i.e. retina display) look really good. We can mess with the dimensions if you feel it necessary.',
	'btn'=>'Reserve Now',
	'link'=>'#'
),
2=>array(
	'h'=>'These header images have text like this',
	'p'=>'The trick here is we need narrow 1082x1443 for small devices and 1175x500 for wide-screen. The larger res for small devices makes high-quality mobile screens (i.e. retina display) look really good. We can mess with the dimensions if you feel it necessary.',
	'btn'=>'Reserve Now',
	'link'=>'#'
)
/*,
3=>array(
	'h'=>'Pay for a person, not an Agency',
	'p'=>'Get practical, personal help with your Internet project without the costly commitmen ,. . .sd',
	'btn'=>'Meet Seth',
	'link'=>'#'
)
*/
);
?>

<div id="index">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
	  <?
	  foreach($carousel as $key=>$val):
	  if ($key==0) $active='active';
	  else $active='';
	  ?>
        <li data-target="#myCarousel" data-slide-to="<?=$key?>" class="<?=$active?>"></li>
     <?endforeach?>
	 </ol>
	 
      <div class="carousel-inner" role="listbox">
        <?foreach($carousel as $key=>$val):
			if ($key==0) $active='active';
			else $active='';
		?>
		<div class="item <?=$active?>">
		<img class="hidden-xs hidden-sm" src="img/carousel_<?=$key?>.jpg" alt="Carousel slide">
		<img class="hidden-md hidden-lg" src="img/carousel_sm_<?=$key?>.jpg" alt="Mobile carousel slide">
           <div class="container">
            <div class="carousel-caption">
              <h1><?=$val['h']?></h1>
              <p class="hidden-xs"><?=$val['p']?></p>
              <p><a class="btn btn-lg btn-primary" href="<?=$val['link']?>" role="button"><?=$val['btn']?></a></p>
            </div>
          </div>
        </div>
		<?endforeach?>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
</div><!-- /myCarousel -->
</div><!-- /home -->
	<script>
	//example to  customize carousel, set to zero for testing
	$('.carousel').carousel({
		interval: 5000
	});
	</script>

    <div class="jumbotron row">
        <h1>
		Opening soon in Cody, WY
		</h1>
        <p class="lead">
		On the way to Yellowstone!
		</p>
        <p><a class="btn btn-lg btn-success" role="button" data-toggle="modal" href="#contactModal">Notify Me</a></p>
    </div>
<?
//require_once('body.php'); 
require_once('footer.php'); 
?>

