<div class="row">
<div class="col-xs-12">
<h1>Pick a Package</h1>
</div>
<?foreach ($pickpkg as $id=>$pkg):?>
<div class="col-xs-12" style="padding:10px;">
<?=$this->Html->link($pkg['name'],array('action'=>'pickdate',$id),array('class'=>'btn btn-lg btn-danger date-btns','style'=>''))?>

</div>
<?endforeach?>
<br />

</div>
