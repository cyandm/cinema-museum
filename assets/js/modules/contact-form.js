function changeButtonStatus(button, status) {
	if (status === 'default') {
		button.classList.add('from-red-700');
		button.classList.add('to-red-950');
		button.innerHTML = `<div class="flex gap-1 items-center"><svg class="icon"><use href="#icon-Send"/></svg>پیام شما</div>`;
	}

	if (status === 'pending') {
		button.classList.add('from-orange-500');
		button.classList.add('to-orange-500');
		button.innerHTML = `<div class="flex gap-1 items-center"><svg class="icon animate-spin	"><use href="#icon-loading-waiting"/></svg>در حال ارسال</div>`;
	}

	if (status === 'completed') {
		button.classList.add('from-emerald-600');
		button.classList.add('to-emerald-600');
		button.innerHTML = `<div class="flex gap-1 items-center"><svg class="icon"><use href="#icon-checkmark-done-check-circle"/></svg> ارسال شد </div>`;
	}

	if (status === 'error') {
		button.classList.add('from-red-700');
		button.classList.add('to-red-700');
		button.innerHTML = `<div class="flex gap-1 items-center"><svg class="icon"><use href="#icon-xmark"/></svg> خطایی رخ داد! </div>`;
	}
}

function contactForm() {
	const formContactUs = document.getElementById('formContactUs');
	const formContactUsSubmit = document.getElementById('formContactUsSubmit');
	if (!formContactUs || !formContactUsSubmit) return;

	formContactUs.addEventListener('submit', (e) => {
		e.preventDefault();
		changeButtonStatus(formContactUsSubmit, 'pending');

		setTimeout(() => {
			const formData = new FormData(formContactUs);
			jQuery(($) => {
				$.ajax({
					type: 'POST',
					url: restDetails.url + 'cyn-api/v1/contact-form',
					data: formData,
					cache: false,
					processData: false,
					contentType: false,

					success: (res) => {
						formContactUs.reset();
						changeButtonStatus(formContactUsSubmit, 'completed');

						setTimeout(() => {
							changeButtonStatus(formContactUsSubmit, 'default');
						}, 1500);
					},

					error: (err) => {
						changeButtonStatus(formContactUsSubmit, 'error');
					},
				});
			});
		}, 700);
	});
}

contactForm();
