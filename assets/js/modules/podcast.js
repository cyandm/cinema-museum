import { cynChangePopup } from '../utils/custom-events';
import { activateEl, deActivateEl } from '../utils/functions';
import { popupBackdrop, popupBackdropContent } from './popup';

function singlePodcast() {
	const playBtn = document.querySelector('.single-podcast #playBtn');
	if (!playBtn) return;

	playBtn.addEventListener('click', () => {
		activateEl(popupBackdrop);

		jQuery(($) => {
			$.ajax({
				type: 'POST',
				url: restDetails.url + 'cyn-api/v1/popup-audio',
				data: {
					id: playBtn.dataset.postId,
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
}

singlePodcast();
