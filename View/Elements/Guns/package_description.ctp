<div class="col-xs-12 col-md-6">
<h2 class="package-title"><?=$pkg['Description']['name']?></h2>
<?//debug($pkg)?>
<?=$this->Html->image('packages/2guns_gatling.jpg',array('class'=>'img-responsive img-center'))?>
</div>
<div class="col-xs-12 col-md-6" style="padding-top:69px">

<table class="table table-striped casting-link">
<tbody>



  <tr><th scope="row">Description</th>
 <td><?=$pkg['Description']['description']?></td></tr>


 <tr><th scope="row">Price
 </th>
 <td><?=money_format('$%i',$pkg['Product']['Price'])?>
 </td></tr>
 </tbody>
 </table>

<?=$this->Html->link('Book Now',array('action'=>'pickdate',$pkg['Product']['CategoryID'],$pkg['Product']['SessionTypeID']),array('class'=>'btn btn-lg btn-danger date-btns','style'=>'','onclick'=>$this->element('blockui',array('msg'=>'Checking dates...'))))?>
</div>