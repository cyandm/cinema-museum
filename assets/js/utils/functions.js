import { cynActivate, cynChangePopup } from './custom-events';

export const deActivateEl = (nodeEl) => {
	nodeEl.setAttribute('data-active', 'false');
	nodeEl.dispatchEvent(cynActivate);
};

export const activateEl = (nodeEl) => {
	nodeEl.setAttribute('data-active', 'true');
	nodeEl.dispatchEvent(cynActivate);
};

export const toggleActivateEl = (nodeEl) => {
	const current = nodeEl.getAttribute('data-active');

	if (current === 'false' || !current) {
		activateEl(nodeEl);
		return;
	}

	deActivateEl(nodeEl);
};

export const definePopUp = (nodeEl) => {
	const content = nodeEl.querySelector('#popupBackdropContent');

	nodeEl.addEventListener('cynActivate', (e) => {
		if (nodeEl.dataset.active === 'false') {
			content.innerHTML = '';
		}

		if (e.target != nodeEl) return;

		document.body.setAttribute('data-popup', e.target.dataset.active);
	});

	nodeEl.addEventListener('click', (e) => {
		if (e.target != nodeEl) return;
		deActivateEl(nodeEl);
	});
};

export const setCookie = (cookieName, cookieValue, expireDays) => {
	const d = new Date();
	d.setTime(d.getTime() + expireDays * 24 * 60 * 60 * 1000);
	let expires = 'expires=' + d.toUTCString();
	document.cookie =
		cookieName + '=' + JSON.stringify(cookieValue) + ';' + expires + ';path=/';
};
