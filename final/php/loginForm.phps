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
				<form action="login.php" method="post">
					Email: 
					<input type="text" name="email">
					<br>
					Password:
					<input type="password" name="password">
					<br>
					<input type="submit">				
				</form>
				<p>Don't have an account? <a href="signupForm.php">Sign up!</a></p>
			</div>
		</section>
	</body>	
</html>