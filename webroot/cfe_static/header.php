<?
require_once('private.php'); 
//make menu array, the key is the name of the php file
$menu=array(
'index'=>array(
	'title'=>'Cody Firearms Experience',
	'desc'=>'Providing cutting edge use of technology to gain awareness and develop inspiration.'
),

'Packages'=>array(
	'dropdown'=>array(
		'-cowboy_shooters'=>array(
			'title'=>'Cowboy shooting package',
			'desc'=>''
		),
		'-rifle_package'=>array(
			'title'=>'Rifle package',
			'desc'=>''
		),
		'-gatling_gun'=>array(
			'title'=>'The weapon to end all wars!',
			'desc'=>''
		)
		
	)
),
/*
'projects'=>array(
	'title'=>'',
	'desc'=>''
),
'about'=>array(
	'title'=>'',
	'desc'=>''
),
*/
'All Guns'=>array(
	'dropdown'=>array(
		'-gatling_gun'=>array(
			'title'=>'Gatling Gun: The gun to end all wars',
			'desc'=>'Shoot the gatling gun at the Cody Firearms Experience in Cody, WY.'
		),
		'-gatling_gun2'=>array(
			'title'=>'Gatling Gun: The gun to end all wars',
			'desc'=>'Shoot the gatling gun at the Cody Firearms Experience in Cody, WY.'
		),
		'-gatling_gun3'=>array(
			'title'=>'Gatling Gun: The gun to end all wars',
			'desc'=>'Shoot the gatling gun at the Cody Firearms Experience in Cody, WY.'
		)
	)
)

);

$here=preg_replace("/(.+)\.php$/", "$1", basename($_SERVER['PHP_SELF']));
//make the meta variables - easiest to do it here in one loop I think
foreach ($menu as $k=>$m){
	if (isset($m['dropdown'])){
		foreach ($m['dropdown'] as $t=>$v){
			if ($t==$here){
				$meta_title=$v['title'];
				$meta_desc=$v['desc'];
			}
		}
	}
	else {
		if ($k==$here){
			$meta_title=$m['title'];
			$meta_desc=$m['desc'];
		}
	}
}

//all the basic scripts, DOCTYPE, container, etc
require_once('header_basic.php');
?>

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
	  
	        <!-- Static navbar -->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Cody Firearms Experience</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
             <?
				 //draw menu, first do some housekeeping
				foreach ($menu as $key=>$val):
				if (basename($_SERVER['PHP_SELF'])==$key.'.php') $active='active';
				else $active='';
				if ($key=='index') $title='home';
				else $title=$key;
				//print_r($menu[$key]);
				if (!isset($menu[$key]['dropdown'])):
			?>
		  
		  <li class="<?=$active?>">
		  <a href="<?=$key.'.php'?>"><?=ucfirst($title)?></a>
		  </li>

			<?else:?>
              <!-- left this here as it may be useful later -->
			  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				<?=ucfirst($key)?>
				<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
				<?foreach ($menu[$key]['dropdown'] as $k=>$v):?>
                  <li><a href="<?=$k.'.php'?>"><?=ucfirst(str_replace('-','',str_replace('_',' ',$k)))?></a></li>
				 <?endforeach?>
                </ul>
              </li>
           <?
		   endif;
		   endforeach;
		   ?>
		   <li>
			  <button type="button" class="btn btn-success navbar-btn" data-toggle="modal" data-target="#contactModal">Get Notified</button>
		  </li>
		   </ul>
            <!--ul class="nav navbar-nav navbar-right">

            </ul -->
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
 <script>
/* hides menu toggle on outside click */
$(document).on('click',function(){
	$('.collapse').collapse('hide');
})

</script>
	  
        <!--h3 class="text-muted">Project name</h3-->
        <!--nav class="navbar-fixed-top">
		
		<!--ul class="smallnav nav">
		  <li>
		  	  <button type="button" class="menu-button btn btn-lg btn-info" data-toggle="collapse" data-target="#topnav" aria-expanded="false" aria-controls="topnav"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu</button>
		  </li>
		</ul -->
		
      </div><!-- /masthead -->

<?require_once('contact_modal.php')?>