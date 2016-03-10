<?php
	include('header.php');
?>
		<section>
			<div class="container">
			<?php 
				if (!empty($_GET['error'])) {
					?> <p class="error"><?=$_GET['error']?></p> <?php
					$_GET = array();
				}
			?>				
				<form action="signup.php" method="post">
					User name:
					<input type="text" name="userName">
					<br>
					Email: 
					<input type="text" name="email">
					<br>
					Password:
					<input type="password" name="password">
					<br>
					<input type="submit">				
				</form>				
			</div>
		</section>
	</body>	
</html>