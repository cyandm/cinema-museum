import { cynChangePopup } from '../utils/custom-events';
import { activateEl, deActivateEl } from '../utils/functions';
import { popupBackdrop, popupBackdropContent } from './popup';

function singleVideo() {
	const playBtnGroup = document.querySelectorAll('.single-video .playBtn');
	if (!playBtnGroup) return;

	playBtnGroup.forEach((playBtn) => {
		playBtn.addEventListener('click', () => {
			activateEl(popupBackdrop);

			jQuery(($) => {
				$.ajax({
					type: 'POST',
					url: restDetails.url + 'cyn-api/v1/popup-video',
					data: {
						id: playBtn.dataset.postId,
						acfField: playBtn.dataset.acfFiled,
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

singleVideo();
