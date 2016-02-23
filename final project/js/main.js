document.addEventListener('DOMContentLoaded', function () {
	"use strict";

	var button = document.getElementById('button');
	var blueButton = document.getElementById('blueButton');
	var greenButton = document.getElementById('greenButton');
	var purpleButton = document.getElementById('purpleButton');

	button.addEventListener('click', myFunction);
	blueButton.addEventListener('click', function () {
		themeswap('blue');
	});
	greenButton.addEventListener('click', function () {
		themeswap('green');
	});
	purpleButton.addEventListener('click', function () {
		themeswap('purple');
	});

	function myFunction() {
    	document.getElementById("myDropdown").classList.toggle("show");
	}
	
	function themeswap(color) {
		document.getElementById("currentcss").href = 'css/' + color + ".css"
		$.ajax({
			type : 'POST',
			url : '../index.php',
			data : color,
			success : function () {
				console.log('yay');
			},
			datatype : 'text'
		})
	}
});