<div class="row" style="padding-bottom:15px">
<div class="col-xs-12">
<h1 style="font-size:3.2em">Firearm Packages<small style="font-size:.55em"> Convenient, easy online booking</small></h1>
<h3>(All packages include instruction, lane rental fee, ammunition, target, and loaner hearing/eye protection)</h3>
<h3><small><strong>PRICES PER PERSON, NO SPLIT PACKAGES PLEASE</strong><br />
ALL PACKAGE FIREARMS ARE MODERN DAY REPRODUCTIONS</small></h3>
<h3>Call us for lane rental information. Memberships available! (307) 586-4287</h3>

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


