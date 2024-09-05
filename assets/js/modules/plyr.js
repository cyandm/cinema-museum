import Plyr from 'plyr';

function plyr() {
	document.querySelectorAll('.plyr-js')?.forEach((el) => {
		const player = new Plyr(el);
	});
}

plyr();
