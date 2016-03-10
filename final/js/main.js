document.addEventListener('DOMContentLoaded', function () {
	var changeTheme = document.getElementById('theme'),
		styleSheet = document.getElementById('currentCss');


	changeTheme.addEventListener('change', function () {
		var color = this.value;

		styleSheet.href = 'css/' + color + '.css';
		window.location.replace('http://students.washington.edu/em42/arch482/final/updateTheme.php?themeName=' + color);
	})
});