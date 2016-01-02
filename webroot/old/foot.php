	 </div><!-- main -->

	 <?php //echo $_SERVER['PHP_SELF']; 
		$path='/';
	 ?>

		 <div data-role="footer" data-position="fixed">
		 <div data-role="navbar">
			<ul>
				<li><a href="index.php" <?php if($_SERVER['PHP_SELF']==$path.'index.php') echo 'class="ui-btn-active ui-state-persist"'; ?> data-icon="home" data-prefetch>Home</a></li>
				<li><a href="details.php" <?php if($_SERVER['PHP_SELF']==$path.'details.php') echo 'class="ui-btn-active ui-state-persist"'; ?> data-icon="location" data-prefetch>Details</a></li>
				<li><a href="packages.php" <?php if($_SERVER['PHP_SELF']==$path.'packages.php') echo 'class="ui-btn-active ui-state-persist"'; ?> data-icon="tag" data-prefetch>Packages</a></li>
				<li><a href="notify.php" <?php if($_SERVER['PHP_SELF']==$path.'notify.php') echo 'class="ui-btn-active ui-state-persist"'; ?> data-icon="tag" data-prefetch>Notify Me</a></li>
				<!-- li><a href="notify.php" data-transition="pop" data-icon="heart">Notify Me</a></li -->
			</ul>
		 </div><!-- navbar -->
		 </div><!-- /footer -->

	</div><!-- /page -->

</body>