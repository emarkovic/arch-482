<?php require('navbar.php'); ?>

		<section>
			<div class="container">
				<div class="project-info" id="display-area">
					<h1 id="initial">Select a project for more information.</h1>	
					<?php 
						$info_file = file_get_contents('data/projects-info.txt');
						$info_lines = explode(PHP_EOL, $info_file);

						foreach($info_lines as $line) {
							list($id, $title, $date, $descr, $url) = explode('|', $line);
					?>
							<div class="info" id="<?= $id ?>-info">
								<h2><?= $title ?> <span class="small-caps"><?= $date ?></span></h2>
								<p><?= $descr ?></p>
					<?php if ($url != '') { ?>
							<p><a href="<?= $url ?>">Check out <?= $title ?></a></p>
					<?php }?>
							</div>
					<?php } ?>
				</div>				
			</div>
		</section>
		
		<section>
			<div class="container">
				<?php 
					$img_file = file_get_contents('data/projects-imgs.txt');
					$img_lines = explode(PHP_EOL, $img_file);

					foreach($img_lines as $line) {
						list($id, $img_url) = explode('|', $line);
				?>
						<img src="<?= $img_url ?>" id="<?= $id ?>" alt="<?= $id ?> app" class="project-img">
				<?php } ?>
			</div>
		</section>

		<script src="js/projects.js"></script>
	</body>
</html>