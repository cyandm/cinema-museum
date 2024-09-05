import { cynChangePopup } from '../utils/custom-events';
import { activateEl, deActivateEl } from '../utils/functions';
import { popupBackdrop, popupBackdropContent } from './popup';

function imageCardPopUp() {
	const imageCards = document.querySelectorAll('.image-card');
	if (!imageCards) return;

	imageCards.forEach((card) => {
		card.addEventListener('click', () => {
			activateEl(popupBackdrop);

			jQuery(($) => {
				$.ajax({
					type: 'POST',
					url: restDetails.url + 'cyn-api/v1/popup-image',
					data: {
						id: card.dataset.postId,
					},

					success: (res) => {
						popupBackdrop.dataset.status = 'done';
						popupBackdropContent.innerHTML = res.innerHTML;

						popupBackdrop.dispatchEvent(cynChangePopup);
					},

					error: (err) => {
						popupBackdrop.dataset.status = 'done';
						popupBackdropContent.innerHTML = err.innerHTML;
					},
				});
			});
		});
	});
}

imageCardPopUp();
