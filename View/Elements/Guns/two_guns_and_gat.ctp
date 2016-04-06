<div class="col-xs-12 col-md-6">
<h1><?=$pkg['Description']['name']?></h1>
<?//debug($pkg)?>
<?=$this->Html->image('http://placehold.it/550x300',array('class'=>'img-responsive'))?>
</div>
<div class="col-xs-12 col-md-6" style="padding-top:69px">

<table class="table table-striped casting-link">
<tbody>



  <tr><th scope="row">Description</th>
 <td>Pick any two and the Gatling</td></tr>
 <tr><th scope="row">Historic Timeframe
 </th>
 <td>1760-1830 
 </td></tr>
 


 <tr><th scope="row">Action
 </th>
 <td>Depends, Handcrank
 </td></tr>

 <tr><th scope="row">Ammunition
 </th>
 <td>.62 Caliber Round, Musket Ball 
 </td></tr>

 <tr><th scope="row">Price
 </th>
 <td><?=money_format('$%i',$pkg['Product']['Price'])?>
 </td></tr>
 </tbody>
 </table>

<?=$this->Html->link('Book Now',array('action'=>'pickdate',$pkg['Product']['CategoryID'],$pkg['Product']['SessionTypeID']),array('class'=>'btn btn-lg btn-danger date-btns','style'=>'','onclick'=>$this->element('blockui',array('msg'=>'Checking dates...'))))?>
</div>