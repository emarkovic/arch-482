document.addEventListener('DOMContentLoaded', function () {
	var events = document.querySelectorAll('.more-info');	
	var filter = document.getElementById('selectFilter');

	filter.addEventListener('change', function () {
		var filter = this.value,
			month = this.dataset.month,
			year = this.dataset.year;
		window.location.replace('http://students.washington.edu/em42/arch482/a5/calendar.php?month=' + month +'&year=' + year + '&filter=' + filter);
	})

	for (var i = 0; i < events.length; i++) {
		var event = events[i];
		event.addEventListener('click', function () {
			var id = this.dataset.id;
			window.open('popup.php?id=' + id);
		});
	}
});