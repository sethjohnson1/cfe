<div class="row">
<div class="col-xs-12">
<h1>Easy Online Booking for Rapid Fire<small> Your package will be ready when you arrive</small></h1>
</div>
<?//debug($pickpkg);?>
<?foreach ($pickpkg as $id=>$pkg):?>
<div class="col-xs-12" style="padding:10px;">
<?=$this->Html->link($pkg['Name'],array('action'=>'pickdate',$id,$pkg['SessionTypeID']),array('class'=>'btn btn-lg btn-danger date-btns','style'=>'','onclick'=>$this->element('blockui',array('msg'=>'Checking dates...'))))?>

</div>
<?endforeach?>
<br />

</div>
