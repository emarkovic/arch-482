document.addEventListener('DOMContentLoaded', function () {
	"use strict";

	var imgs = [
			document.getElementById('newsMeter'),
			document.getElementById('breadcrumbs'),
			document.getElementById('spent'),
			document.getElementById('cart'),
			document.getElementById('spotify'),
			document.getElementById('reviews'),
			document.getElementById('trafficCams'),
			document.getElementById('dawgCoffee'),
			document.getElementById('datacenter'),
			document.getElementById('15puzzle'),
			document.getElementById('speedReader'),
			document.getElementById('todo'),
			document.getElementById('draw'),
			document.getElementById('rapName'),
			document.getElementById('cursorTrail')			
		],
		info = [
			document.getElementById('newsMeter-info'),
			document.getElementById('breadcrumbs-info'),
			document.getElementById('spent-info'),
			document.getElementById('cart-info'),
			document.getElementById('spotify-info'),
			document.getElementById('reviews-info'),
			document.getElementById('trafficCams-info'),
			document.getElementById('dawgCoffee-info'),
			document.getElementById('datacenter-info'),
			document.getElementById('15puzzle-info'),
			document.getElementById('speedReader-info'),
			document.getElementById('todo-info'),
			document.getElementById('draw-info'),
			document.getElementById('rapName-info'),
			document.getElementById('cursorTrail-info')
		],
		initialDisplay = document.getElementById('initial'),
		displayArea = document.getElementById('display-area'),
		previousClick;

		imgs.forEach(function (img, i) {
			img.addEventListener('mouseenter', function () {
				this.style.cursor = 'pointer';
			});

			img.addEventListener('click', function () {
				if (previousClick) {
					previousClick.info.style.display = 'none';
					previousClick.img.style.border = 'none';
				} else {
					document.getElementById('initial').style.display = 'none';
				}
				
				this.style.border = '1px solid black';
				info[i].style.display = 'block';

				previousClick = {
					info: info[i],
					img: img
				}
			});
		});

});