	 </div><!-- main -->

	 <?php //echo $_SERVER['PHP_SELF']; 
		$path='/wfe/';
	 ?>

		 <div data-role="footer" data-position="fixed">
		 <div data-role="navbar">
			<ul>
				<li><a href="index.php" <?php if($_SERVER['PHP_SELF']==$path.'index.php') echo 'class="ui-btn-active ui-state-persist"'; ?> data-icon="home">Home</a></li>
				<li><a href="details.php" <?php if($_SERVER['PHP_SELF']==$path.'details.php') echo 'class="ui-btn-active ui-state-persist"'; ?> data-icon="location">Details</a></li>
				<li><a href="packages.php" <?php if($_SERVER['PHP_SELF']==$path.'packages.php') echo 'class="ui-btn-active ui-state-persist"'; ?> data-icon="tag">Packages</a></li>
				<li><a href="notify.php" data-transition="pop" data-icon="heart">Notify Me</a></li>
			</ul>
		 </div><!-- navbar -->
		 </div><!-- /footer -->

	</div><!-- /page -->

</body>