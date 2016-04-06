<div class="row">
<div class="col-xs-12">
<h1>Firearm Packages<small> Convenient, easy online booking</small></h1>
</div>
</div>

<?//debug($packages);?>
<?foreach ($packages as $id=>$pkg):?>
<a name=<?=$pkg['Description']['description']?>></a>
<div class="row" style="border-top:#666 1px solid">
<?=$this->element('Guns/'.$pkg['Description']['description'],array('pkg'=>$pkg))?>

</div>
<?endforeach?>
<br />


