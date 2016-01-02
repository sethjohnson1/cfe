<?
//find active page
$a='ui-btn-active ui-state-persist';
$home=null;
$details=null;
if ($this->params['action']=='mobile') $home=$a;
if ($this->params['action']=='details') $details=$a;
?> 
	</div><!-- main -->
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar" class="ui-state-persist">
			<ul>
				<li>
				<? echo $this->Html->link('Home',array('action'=>'mobile'),array('class'=>$home,'data-icon'=>'home','data-prefetch')); ?>
				</li>
				<li><? echo $this->Html->link('Details',array('action'=>'details'),array('class'=>$details,'data-icon'=>'tag','data-prefetch')); ?></li>
				<!-- li><a href="notify.php" data-transition="pop" data-icon="heart">Notify Me</a></li -->
			</ul>
		</div><!-- navbar -->
	</div><!-- /footer -->

</div><!-- /page -->