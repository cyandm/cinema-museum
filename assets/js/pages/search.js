function searchPage() {
	const searchPageForm = document.getElementById('searchPageForm');
	if (!searchPageForm) return;

	const radioButtons = searchPageForm.querySelectorAll('input[type="radio"]');
	const searchBox = searchPageForm.querySelector('input[type="text"]');

	radioButtons.forEach((button) => {
		button.addEventListener('change', () => {
			searchPageForm.submit();
		});
	});

	searchBox.addEventListener('blur', () => {
		searchPageForm.submit();
	});
}

searchPage();
