function mobileMenu() {
	const mobileMenuOpener = document.getElementById('mobileMenuOpener');
	const mobileMenu = document.getElementById('mobileMenu');
	const mobileMenuCloser = document.getElementById('mobileMenuCloser');

	if (!mobileMenuOpener || !mobileMenu || !mobileMenuCloser) return;

	mobileMenuOpener.addEventListener('click', () => {
		mobileMenu.classList.replace(
			'[clip-path:polygon(100%_0%_,100%_0_,100%_100%,_100%_100%)]',
			'[clip-path:polygon(0_0,_100%_0_,_100%_100%_,_0_100%)]'
		);
	});
	mobileMenuCloser.addEventListener('click', () => {
		mobileMenu.classList.replace(
			'[clip-path:polygon(0_0,_100%_0_,_100%_100%_,_0_100%)]',
			'[clip-path:polygon(100%_0%_,100%_0_,100%_100%,_100%_100%)]'
		);
	});
}

mobileMenu();
