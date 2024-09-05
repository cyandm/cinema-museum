const separator = document.querySelectorAll('.separator');

separator?.forEach((el) => {
	el.innerHTML = '<svg class="icon "><use href="#icon-Left,-Arrow"/></svg>';
});
