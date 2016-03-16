<div class="row">
<div class="col-xs-12">
<h2><?=$description['Description']['name']?></h2>
<p><?=$description['Description']['description']?>
<br />
<?=$this->Html->link('Book Now',array('controller'=>'firearms','action'=>'pickdate',$description['Product']['barcodeID'],$description['Product']['SessionTypeID']),array('class'=>'btn btn-lg btn-danger date-btns','style'=>'','onclick'=>$this->element('blockui',array('msg'=>'Checking dates...'))))?>

</p>

<?//debug($description)?>
</div>
<div class="col-xs-12">
<? //debug($others)?>
<h2>More Packages</h2>
<ul>
<?foreach ($others as $k=>$v):?>
<li><?=$this->Html->link($v['Description']['name'],array('action'=>'frontview',$v['Description']['id']))?></li>
<?endforeach;?>
</ul>
</div>
</div>