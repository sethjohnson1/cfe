<div class="row">

	<div class="col-md-6">
	<h1>Gatling Gun</h1>
	<?=$this->Html->image('guns/GatingGun2.jpg',array('class'=>'img-responsive', 'style'=>'margin:auto','alt'=>'Gatling gun'))?>

	</div>
	<div class="col-md-6">
		<div class="jumbotron">
		<h1><?=$description['Description']['name']?><small> Shoot "the gun to end all wars"!</small></h1>
		<p>This is a little blurb about each gun</p>
		<p align="center">
		<?=$this->Html->link('Browse Packages',array('action'=>'pickpkg','controller'=>'firearms'),array('style'=>'margin:auto', 'class'=>'btn btn-lg btn-success','onclick'=>$this->element('blockui',array('msg'=>'Checking...'))))?>
		
		</p>
	</div>
	</div>
	

	
</div>