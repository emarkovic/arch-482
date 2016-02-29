<?php
	// Recommended iframe width = 505px
	include_once('db.php');

	$timestamp = time();

	if (!empty($_GET['month'])) {
		$month = $_GET['month'];
	} else {
		$month = date('n', $timestamp);	
	}

	if (!empty($_GET['year'])) {
		$year = $_GET['year'];
	} else {
		$year = date('Y', $timestamp);		
	}

	if (!empty($_GET['filter'])) {
		$filter = $_GET['filter'];
	} else {
		$filter = 'All';
	}

	
	if ($month == 12) {
		$next_month = 1;
		$next_year = $year + 1;

		$prev_month = 11;
		$prev_year = $year;
	} else if ($month == 1) {
		$next_month = 2;
		$next_year = $year;

		$prev_month = 12;
		$prev_year = $year - 1;
	} else {
		$next_month = $month + 1;
		$next_year = $year;

		$prev_month = $month - 1;
		$prev_year = $year;
	}

	$months = [
		'January',
		'February',
		'March',
		'April',
		'May',
		'June',
		'July',
		'August',
		'September',
		'October',
		'November',
		'December'
	];

	$yearQ = $db->quote($year);
	$monthQ = $db->quote($month);
	$filterQ = $db->quote($filter);
	
	if ($filter === 'All') {
		$query = "SELECT eventid, title, eventtime, event_type 
			FROM calendarevents 
			WHERE year(eventtime) = $yearQ 
			AND month(eventtime) = $monthQ
			ORDER BY eventtime";	
	} else {
		$query = "SELECT eventid, title, eventtime, event_type 
		FROM calendarevents 
		WHERE year(eventtime) = $yearQ 
		AND month(eventtime) = $monthQ 
		AND event_type = $filterQ
		ORDER BY eventtime";	
	}	
	
	$results = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

	$types = getTypes($db);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Assignment 5</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<section>
			<div class="container">
				<div class="content">
					<h2>
						<span>
							<a href="calendar.php?month=<?=$prev_month?>&year=<?=$prev_year?>&filter=<?=$filter?>">
								<i class="fa fa-chevron-left"></i>
							</a>
						</span>
						<span id="date"><?=$months[$month - 1] . ' ' . $year?></span>
						<span>
							<a href="calendar.php?month=<?=$next_month?>&year=<?=$next_year?>&filter=<?=$filter?>">
								<i class="fa fa-chevron-right"></i>
							</a>
						</span>	
					</h2>
					<div id="filter">
						<p>
							Filter type : 
							<select name="filter" id="selectFilter" data-month="<?=$month?>" data-year="<?=$year?>">								
							<?php 
								foreach($types as $type) {
									if (!empty($type)) {
										if ($filter === $type) { 
									?>
											<option value="<?=$type?>" selected><?=$type?></option>
									<?php } else { ?>
											<option value="<?=$type?>"><?=$type?></option>
									<?php	}							
									}
								} 
							?>									
							</select>
						</p>
					</div>
					<div id="table">
						<?=make_table($results)?>			
					</div>
				</div>
			</div>
		</section>
		<script src="js/main.js"></script>
	</body>
</html>

<?php
	function make_table($results) {
		if (!empty($results)) {
			?>
			<table>
				<tr>					
					<th>Title</th>
					<th>Date & Time</th>
					<th>Event Type</th>
				</tr>
			<?php 
				foreach($results as $result) {
					$startTime = new DateTime($result['eventtime']);
					$startTime = $startTime->format('M j, Y g:i A');
			?>
					<tr>						
						<td class="more-info" data-id="<?=$result['eventid']?>"><?=$result['title']?></td>
						<td><?=$startTime?></td>
						<td><?=$result['event_type']?></td>
					</tr>
			<?php
				}			
			?>
			</table>
			<?php
		} else {
			?>
			<h3>No data found.</h3>
			<?php
		}
	}

	function getTypes($db) {
		$results = $db->query('SELECT DISTINCT event_type
			FROM calendarevents')->fetchAll(PDO::FETCH_ASSOC);
		$types = ['All'];

		foreach ($results as $result) {
			array_push($types, $result['event_type']);
		}
		return $types;
	}
?>