'use strict';

var hours = document.getElementById('hours'),
    mins = document.getElementById('mins'),
    secs = document.getElementById('secs'),
    day = document.getElementById('day');

var time = undefined;
function getTime() {
	time = new Date(Date.now());
	return {
		hours: convertToDeg(time.getHours(), 12),
		mins: convertToDeg(time.getMinutes(), 60),
		secs: convertToDeg(time.getSeconds(), 60),
		day: time.getDate() < 10 ? '0' + time.getDate() : '' + time.getDate()
	};
}
function convertToDeg(time, factor) {
	return time * (360 / factor);
}
function setClock(time) {
	hours.style.transform = 'rotate(' + time.hours + 'deg)';
	mins.style.transform = 'rotate(' + time.mins + 'deg)';
	secs.style.transform = 'rotate(' + time.secs + 'deg)';
	day.innerHTML = '' + time.day;
}

setClock(getTime());
setInterval(function () {
	setClock(getTime());
}, 1000);