document.addEventListener('DOMContentLoaded', function () {
	var changeTheme = document.getElementById('theme'),
		styleSheet = document.getElementById('currentCss');


	changeTheme.addEventListener('change', function () {
		var color = this.value;

		styleSheet.href = 'css/' + color + '.css';
		window.location.replace('http://localhost/final/updateTheme.php?themeName=' + color);
	})
});