<div class ="col-xs-12">
<div class ="jumbotron">
<?
echo $this->Form->create('Login');
echo $this->Form->input('pwd',array('type'=>'password','class'=>'form-control','label'=>false));
echo $this->Form->end(__('Submit')); 
?>
</div>

</div>