<div class="row">
<?
//debug($description);
?>
	<div class="col-md-6">
	<?//be smart and use the slug here for image name when you get them?>
	<?=$this->Html->image('NO_IMAGE.jpg',array('class'=>'img-responsive', 'style'=>'margin:auto','alt'=>$description['Description']['name']))?>

	</div>
	<div class="col-md-6">
	<div class="jumbotron firearm">
		<h1><?=$description['Description']['name']?></h1>
		<p><?=$description['Description']['meta_desc']?></p>
	</div>


<table class="table table-striped casting-link">
<tbody>



  <tr><th scope="row">Ammunition</th>
 <td>.44 caliber, Round
Ball, Black Powder</td></tr>


 <tr><th scope="row">Manufacturer
 </th>
 <td>
Designed by Walker and
Colt; Manufactured by Eli
Whitney Jr., Springfield, MA.
 </td></tr>

 <tr><th scope="row">Weight
 </th>
 <td>
4.5 Pounds
 </td></tr>
 <tr><th scope="row">Year of Production
 </th>
 <td>
1847 (only 1,100 produced)
 </td></tr>

 <tr><th scope="row">Action
 </th>
 <td>
Single Action,
6-shot Repeater
 </td></tr>
 
 
 
 </tbody>
 </table>

<? //=$this->Html->link('Book Now',array('action'=>'pickdate',$pkg['Product']['CategoryID'],$pkg['Product']['SessionTypeID']),array('class'=>'btn btn-lg btn-danger date-btns','style'=>'','onclick'=>$this->element('blockui',array('msg'=>'Checking dates...'))))?>
</div>

	

	
</div>