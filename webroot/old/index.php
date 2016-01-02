<?php
session_start();
$title='Wyoming Firearms Experience';
$meta_desc='The Wyoming Firearms Experience will provide a quality, safe, friendly indoor gun range for locals and tourists.';
include 'head.php';
include 'page.php';
?>

<?php
if (isset($_SESSION['sent'])){
unset($_SESSION['sent']);
echo '<div class="ui-body ui-body-a ui-corner-all">';
echo '<h3 style="color: green; background">Thank you, your email has been submitted</h3>';
echo '</div>';
}
?>

<img class="banner" src="img/logo_72.png" alt="Wyoming Firearms Experience"/>

<div class="ui-body ui-body-a ui-corner-all">
<h1>Opening Summer 2015</h1>
<img class="banner" src="img/concept.jpg" alt="Wyoming Firearms Experience concept photo"/>
<h3>Shoot the guns of the Old West!</h3>
<p>
<strong>Indoor firearms range</strong> – Relive the days of the Cowboy and the Mountain Men.  Colt 45 revolvers, Winchester rifles, Buffalo guns, and  even a Gatling Gun!!
</p>
</div>
<br />
<div class="ui-body ui-body-a ui-corner-all">
<div class="center">
<h3>State of the Art Experience</h3>
<ul>
<li class="center">Full range of services and ammunition sales</li>
<li>Online reservations and self-service kiosks</li>
<li>Practice with your own guns or rent ours</li>
<li>Tactical and standard target systems</li>
<li>Virtual range for inexpensive practice and real-like scenarios</li>
<li>Free North American wildlife display</li>
</ul>
</div>
<img class="banner" src="img/interior1.jpg" alt="Interior concept rendering" />

</div>
<br />
<div class="ui-body ui-body-a ui-corner-all">
<h3>Mission Statement</h3>
<p>
To provide a quality environment that explains the historical significance and evolution of firearms in the west, that teaches firearms safety and use,
and that allows people to experience that history through the use of reproduction historical and modern day firearms. 
</p>
</div>
<br />

<a href="details.php" class="ui-btn ui-shadow ui-corner-all ui-icon-arrow-r ui-btn-icon-right" id="sj_button" data-transition="slide">Details</a>

	
<?php
include 'foot.php';
?>
