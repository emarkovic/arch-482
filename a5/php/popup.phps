<?php
	include_once('db.php');

	if (!empty($_GET['id'])) {
		$id = $_GET['id'];	
	} else {
		header('Location: http://students.washington.edu/em42/arch482/a5/calendar.php');
		exit();
	}

	$idQ = $db->quote($id);

	$results = $db->query("SELECT eventid, title, description, eventtime, eventendtime, location, event_type 
		FROM calendarevents
		WHERE eventid = $idQ
		order by eventid")->fetchAll(PDO::FETCH_ASSOC)[0];

	$startTime = new DateTime($results['eventtime']); 
	$startTime = $startTime->format('M j, Y g:i A');

	$endTime = new DateTime($results['eventendtime']);
	$endTime = $endTime->format('M j, Y g:i A');	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<section>
			<div class="container">
				<div class="content">
					<h1><?=$results['title']?></h1>										
					<ul>
						<li><strong>Start time :</strong> <?=$startTime?> </li>
						<?php 							
							if (!empty($endTime)) {
						?>
								<li><strong>End time :</strong> <?= $endTime?></li>
						<?php } ?>
						
						<li><strong>Location : </strong><?=$results['location']?></li>
						<li><strong>Event type : </strong><?=$results['event_type']?></li>
					</ul>
					<p><?=$results['description']?></p>
				</div>
			</div>
		</section>
	</body>
</html>