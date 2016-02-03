document.addEventListener('DOMContentLoaded', function () {
	"use strict";
	var imgs = [
			document.getElementById('githubImg'),
			document.getElementById('linkedinImg'),
			document.getElementById('emailImg')
		],
		links = [
			document.getElementById('githubLink'),
			document.getElementById('linkedinLink'),
			document.getElementById('emailLink')
		],
		clicked = [false, false, false];

	imgs.forEach(function (img, i) {
		img.addEventListener('mouseenter', function () {
			this.style.cursor = 'pointer';
		});

		img.addEventListener('click', function () {
			var imgClicked = clicked[i];
			
			toggle(links[i], imgClicked);
			clicked[i] = !imgClicked;
		});
	});

	function toggle(link, clicked) {
		if(clicked) {
			link.style.display = 'none';
		} else {
			link.style.display = 'block';
		}
	}	
});