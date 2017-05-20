<div id="fb-root"></div>
<script>
//FB script for embed
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=858456204199588";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

//
$(document).ready(function(){
$(".googlemap").colorbox({ html:'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2845.0468838832935!2d-109.10238068447407!3d44.514193079101126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x51574bd95329c1a3!2sCody+Firearms+Experience%2C+LLC!5e0!3m2!1sen!2sus!4v1484549633115" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>' });
});

</script>
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
<?$main_img=$this->Html->image('Home_page_Spring_2017_May.jpg',array('class'=>'img-responsive','alt'=>'Cody Firearms Experience'));echo $this->Html->link($main_img,array('action'=>'packages'),array('escape'=>false));?>
</div>

<div class="col-xs-12 col-md-4 no-pad">
<div class="video-container">
         <iframe src="https://www.youtube.com/embed/<?=$youtube['Firearm']['setting_value']?>?rel=0&modestbranding=1" frameborder="0" width="560" height="315"></iframe>
</div>
</div>
<div class="col-xs-12 col-md-4 hidden-sm hidden-xs no-pad" style="">
<?=$this->Html->image('shooters2.jpg',array('class'=>'img-responsive'))?>
</div>

</div><!-- carousel row -->
	<script>
	//example to  customize carousel, set to zero for testing
	$('.carousel').carousel({
		interval: 0
	});
	</script>

<div class="row top-pad">
<!-- social media for mobile only -->
<div class="col-sm-12 hidden-md hidden-lg hidden-xl" style="padding-bottom:15px">
<div id="TA_socialButtonBubbles387" class="TA_socialButtonBubbles">
<ul id="jvC6inAnL" class="TA_links 26uTYuEad4">
<li id="hGZUXFQkN" class="uhCNilbe">
<a target="_blank" href="https://www.tripadvisor.com/Attraction_Review-g60442-d10256849-Reviews-Cody_Firearms_Experience_LLC-Cody_Wyoming.html"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/socialWidget/20x28_green-21693-2.png"/></a>
</li>
</ul>
</div>
<script src="https://www.jscache.com/wejs?wtype=socialButtonBubbles&amp;uniq=387&amp;locationId=10256849&amp;color=green&amp;size=rect&amp;lang=en_US&amp;display_version=2"></script>
</div>
<!-- end social media mobile only -->
<div class="col-xs-3 hidden-sm hidden-xs">
<!-- TripAdvisor widget -->
<div id="TA_selfserveprop224" class="TA_selfserveprop" style="padding-left:20px;">
<ul id="xPDeGgO" class="TA_links s3rRivG7">
<li id="C2oiZr0ww2IP" class="tvAKg1">
<a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
</li>
</ul>
</div>
<script src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=224&amp;locationId=10256849&amp;lang=en_US&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=false&amp;border=true&amp;display_version=2"></script>
<!-- /TripAdvisor widget -->
</div>
<div class="col-md-9 col-sm-12">
<!-- h3 align="center" style="border: 2px dashed red; width:90%; margin:0 auto">Don't miss our Mixed Winter League kick-off on January 20th!<br/ ><em>Couples Date Night & Wine Tasting</em><br/>
<a href="<?=$this->base?>/files/CFE_mixed_league.pdf" class="">Click Here for More Information</a></h3 -->

<div class="top-pad">
<a target="_blank" href="<?=$this->base?>/files/CFE_Package_Prices.pdf" class="btn btn-lg date-btns">Package Prices</a>
</div>

<div class="top-pad">
<?=$this->Html->link('Our Firearms',['action'=>'selection','controller'=>'firearms'],['class'=>'btn btn-lg date-btns'])?>
</div>

<div class="top-pad">
<?=$this->Html->link('Book Online Now!',array('controller'=>'firearms','action'=>'packages'),array('class'=>'btn btn-lg date-btns'))?>
</div>






</div>
</div>


<div class="row top-pad">
<div class="col-xs-12">
<h1>State-of-the-Art Gun Range <small>with an Old West feel</small></h1>
</div>
</div>


<div class="row">
<div class="col-md-8 col-sm-12">
<div class="row">
<div class="col-xs-12 no-pad">
<?=$this->Html->image('cody_firearms_experience_range.jpg',array('class'=>'img-responsive'))?>
</div>
<div class="col-xs-6"  style="padding-left:5px">
<section>
<h3>State-of-the-Art <small></small></h3>
<ul class="">
<li><strong>No experience required!</strong> Our packages includes everything you need to shoot live ammunition</li>
<li><strong>Huge selection of guns</strong> including modern tactical and historic replicas</li>
<li>...including the 1865 Gatling Gun, P90 Tactical, and SCAR 16 CQC machine guns</li>
<li>All packages include <strong>one-on-one expert instruction</strong> for uncompromising safety and fascinating facts</li>
<li><strong>Unique retail items</strong>, <strong>Cowboy-Western Arcade</strong>, and <strong>North American Wildlife Display</strong> ensure fun for the whole family</li>
</ul>
</section>
</div>
<div class="col-xs-6">
<section>
<h3>Awesome Location <small><a href="http://google.com" class="googlemap">Click for Map</a></small></h3>
<ul class="">
<li><strong>Cody, Wyoming</strong> East gate to Yellowstone National Park</li>

<li><strong>Consistent five-star ratings</strong> on <a target="_blank" href="https://www.tripadvisor.com/Attraction_Review-g60442-d10256849-Reviews-Cody_Firearms_Experience_LLC-Cody_Wyoming.html">TripAdvisor</a>, <a target="_blank" href="https://www.facebook.com/Codyfirearmexperience/">Facebook</a>, Google, and <a target="_blank" href="">Yelp</a></li>
<li><strong>Climate-controlled</strong> facility for comfort in heat or cold</li>

<li>Learn about the guns of <strong>Buffalo Bill, Annie Oakley, Lewis and Clark</strong> in the heart of Yellowstone Country</li>
<li>Across the street from the <strong><a href="http://www.codystampederodeo.com/">Cody Nite Rodeo</a></strong> and much more</li>

<li>Call us for group rates and special event hosting!</li>

</ul>
</section>
</div>

</div><!-- /inner row -->
</div>

<div class="col-md-4 hidden-sm hidden-xs">
<div class="fb-page" data-href="https://www.facebook.com/Codyfirearmexperience/" data-tabs="timeline, events, messages" data-height="660" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Codyfirearmexperience/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Codyfirearmexperience/">Cody Firearms Experience</a></blockquote></div>
</div>

</div>

<!-- begin FB and Google Map -->
<div class="row">
<div class="col-xs-12 col-md-6 top-pad">
<div class="fb-page" data-href="https://www.facebook.com/codyfirearmexperience" data-tabs="timeline, events, messages" data-width="600" data-height="660" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/codyfirearmexperience" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/codyfirearmexperience">Cody Firearms Experience</a></blockquote></div>
</div>

<div class="col-xs-12 col-md-6 top-pad">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2845.0468838832935!2d-109.10238068447407!3d44.514193079101126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x51574bd95329c1a3!2sCody+Firearms+Experience%2C+LLC!5e0!3m2!1sen!2sus!4v1484550435362" width="550" height="660" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

</div><!-- /FB and Google Map -->

<div class="row jumbotron firearm" style="margin-top:17px;">
<div class="col-xs-12">

<h1 align=center>Book Online<small> Hassle-free</small></h1>
<div class="square-booking-container">
<!-- Start Square Appointments Embed Code --><script src='https://squareup.com/appointments/buyer/widget/8cffcc35-5f18-41a0-b1a4-5ae0c7f67f5a/BQFGWD6C7SMVJ.js'></script><!-- End Square Appointments EmbedCode -->
</div>
<h3 align=center>Call us for lane rental information. <a target="_blank" href="<?=$this->base?>/files/CFE_2017_winter_spring_membership_flyer.pdf" class="">Memberships available!</a> (307) 586-4287</h3>
</div>
</div>

<div class="row">
<div class="col-xs-12 top-pad">
<h1>Western-Themed Arcade <small>Fun for the entire family</small></h1>
</div>

<div class="col-xs-12 no-pad">
<?=$this->Html->image('cody_firearms_experience_arcade.jpg',array('class'=>'img-responsive','style'=>'width:100%'))?>
</div>
</div>

<div class="row">
<div class="col-xs-12 top-pad">
<h1>Full Retail Store <small>Unique gifts, firearms, and much more</small></h1>
</div>

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
<?endforeach?><h3 align=center>Call us for lane rental information. <a target="_blank" href="<?=$this->base?>/files/CFE_2017_winter_spring_membership_flyer.pdf" class="">Memberships available!</a> (307) 586-4287</h3>
</div>
</div>