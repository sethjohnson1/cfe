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
echo '<h3 style="color: green; background">Thank you, your email has been submitted</h3>';
}
?>

<img class="banner" src="img/banner_72dpi.jpg" alt="Wyoming Firearms Experience"/>

<div class="ui-body ui-body-a ui-corner-all">
<h1>Coming Soon...</h1>
<img class="banner" src="img/concept.jpg" alt="Wyoming Firearms Experience concept photo"/>
<ul>
<li>We are ready to build the "Next Generation Indoor Range."</li>
<li>The photo above is a concept photo of our new location at the Tecumseh's Trading Post.</li>
<li>Please keep in mind this web site is also under construction.</li>
<li>Use the "Notify Me" button below and we'll let you know when we're ready to start
taking reservations.</li>
</ul>
</div>
<br />
<div class="ui-body ui-body-a ui-corner-all">
<img class="banner" src="img/interior1.jpg" alt="Interior concept rendering" />
<h3>Yes, we're still working on the Range</h3>
<ul>
<li>New location is perfect</li>
<li>Promotional partnerships</li>
<li>Locals gain indoor practice, classes, annual memberships</li>
<li>Historical focus, State-of-the-Art design</li>
</ul>
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
