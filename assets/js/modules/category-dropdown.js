function categoryDropdown() {
	const dropDownGroup = document.querySelectorAll('#categoryDropDown');
	if (!dropDownGroup) return;

	dropDownGroup.forEach((categoryDropDown) => {
		const select = categoryDropDown.querySelector('select');
		const baseUrl = categoryDropDown.querySelector('input[name="baseUrl"]');
		const categoryBase = categoryDropDown.querySelector(
			'input[name="categoryBase"]'
		);

		const baseArchive = categoryDropDown.querySelector(
			'input[name="baseArchive"]'
		);

		const pathArray = window.location.pathname.split('/');
		const currentSlug = pathArray[pathArray.indexOf(categoryBase.value) + 1];

		if (currentSlug) {
			select.value = currentSlug;
		}

		select.addEventListener('change', (event) => {
			if (event.target.value === baseArchive.value) {
				window.location.href = '/' + baseArchive.value;
			} else {
				window.location.href = baseUrl.value + '/' + event.target.value;
			}
		});
	});
}

categoryDropdown();
