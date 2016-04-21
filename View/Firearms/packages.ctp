<div class="row" style="padding-bottom:15px">
<div class="col-xs-12">
<h1 style="font-size:3.2em">Firearm Packages<small style="font-size:.55em"> Convenient, easy online booking</small></h1>
</div>
</div>

<?//debug($packages);?>
<?foreach ($packages as $id=>$pkg):?>
<a name=<?=$pkg['Description']['slug']?>></a>
<div class="row package">
<?=$this->element('Guns/package_description',array('pkg'=>$pkg))?>

<?
/* THIS IS DISABLED, JUST USING DESCRIPTION FOR NOW, OLD WAY OF ECHO ELEMENT
echo $this->element('Guns/'.$pkg['Description']['description'],array('pkg'=>$pkg))

******/
?>

</div>
<?endforeach?>
<br />


