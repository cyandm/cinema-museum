import { deActivateEl, definePopUp } from '../utils/functions';

export const popupBackdrop = document.getElementById('popupBackdrop');
export const popupBackdropContent = document.getElementById(
	'popupBackdropContent'
);

definePopUp(popupBackdrop);

popupBackdrop.addEventListener('cynChangePopup', () => {
	const close = popupBackdropContent.querySelector('#closePopUp');
	if (!close) return;

	close.addEventListener('click', () => {
		deActivateEl(popupBackdrop);
	});
});
