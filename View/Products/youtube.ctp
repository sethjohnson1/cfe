<style>
.pad{
	margin:10px;
}
.row{
	margin-left:25px;
}
</style>
<div class="row">
<div class="col-xs-12">
<h3>
<?=$this->Html->link('Update_Product_DB',array('action'=>'update'))?> |

<?=$this->Html->link('Logout',array('action'=>'logout','controller'=>'firearms'))?> |

</h3>
<h1>Global settings</h1>
<?
echo $this->Form->create();

echo $this->Form->input('YouTube',array('class'=>'form-control','value'=>$youtube['Firearm']['setting_value']));

echo $this->Form->submit('Save', array('div' => false,'class'=>'pad btn btn-success btn-lg date-btns'));
echo $this->Form->end();
?>
</div>
</div>


<?
//for debugging
if (isset($request)) echo '<textarea>'.$request.'</textarea>';
?>