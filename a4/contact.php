<?php require('navbar.php'); ?>

		<section>
			<div class="container">	
				<?php
					$file = file_get_contents('data/contacts.txt');
					$lines = explode(PHP_EOL, $file);				
					foreach($lines as $line) {
						list($name, $img_url, $url) = explode('|', $line);
						$lower_name = strtolower($name);
				?>
						<div class="contact-img">
							<img src="<?= $img_url ?>" alt="<?= $name ?> thumbnail" class="thumbnail" id="<?= $lower_name ?>Img">
							<p class="link" id="<?= $lower_name ?>Link"><a href="<?= $url ?>">Check out my <?= $name ?> page!</a></p>
						</div>
				<?php } ?>

				<div class='contact-img'>
					<img src="../img/email.svg" alt="email thumbnail" class="thumbnail" id="emailImg">
					<p class="link" id="emailLink">Send me an email at em42@uw.edu</p>
				</div>
			</div>
		</section>
		<script src="js/contact.js"></script>
	</body>
</html>