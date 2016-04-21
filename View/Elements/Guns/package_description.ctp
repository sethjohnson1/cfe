<div class="col-xs-12 col-md-6">
<h2 class="package-title"><?=$pkg['Description']['name']?></h2>
<?//debug($pkg)?>


<?
	//first extract the image based on naming parameters
	$img_file_name='00_image_coming_soon.jpg';
	$file_search=array();
	$file_id=$pkg['Product']['SessionTypeID'];
	$file_search=glob(WWW_ROOT.'/img/packages/'.$file_id.'_*.jpg');
	if (isset($file_search[0])){
		$file_path=explode('/',$file_search[0]);
		$img_file_name= end($file_path);
		$main_img=$this->Html->image('packages/'.$img_file_name,array('alt'=>'','class'=>'img-responsive'));
		
		echo $main_img;
	}
	
	else {
		echo $this->Html->image('packages/'.$img_file_name,array('alt'=>'Package image coming soon','class'=>'img-responsive'));
	}
//echo $this->Html->image('packages/2guns_gatling.jpg',array('class'=>'img-responsive img-center'))?>



</div>
<div class="col-xs-12 col-md-6" style="padding-top:69px">

<table class="table table-striped casting-link">
<tbody>



  <tr><th scope="row">Description</th>
 <td><?=$pkg['Description']['description']?></td></tr>


 <tr><th scope="row">Price
 </th>
 <td>
 <?if ($pkg['Product']['Price']==49) echo '<span style="color:red; font-weight: bold">ONLY '.money_format('$%i',$pkg['Product']['Price']).'</span>';
 else echo money_format('$%i',$pkg['Product']['Price'])?>
 
 
 </td></tr>
 </tbody>
 </table>

<?=$this->Html->link('Book Now',array('action'=>'pickdate',$pkg['Product']['CategoryID'],$pkg['Product']['SessionTypeID']),array('class'=>'btn btn-lg btn-danger date-btns','style'=>'','onclick'=>$this->element('blockui',array('msg'=>'Checking dates...'))))?>
</div>