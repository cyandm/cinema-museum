function mouse() {
	const mouseCursor = document.querySelector('#mouseCursor');
	if (!mouseCursor) return;

	document.addEventListener('mousemove', (e) => {
		mouseCursor.style.setProperty('--x', e.clientX + 'px');
		mouseCursor.style.setProperty('--y', e.clientY + 'px');
	});
}

mouse();
