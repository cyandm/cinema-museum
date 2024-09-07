import gsap from 'gsap';
import { setCookie } from '../utils/functions';

function preloaderAnimation() {
	const preloaderTimeline = gsap.timeline();

	preloaderTimeline.fromTo(
		'.preloader .logo',
		{ scale: 0.5 },
		{ scale: 1.5, duration: 1.5 }
	);
	preloaderTimeline.to('.preloader .logo', { opacity: 0, duration: 1 });
	preloaderTimeline.to('.preloader .preloader_image', {
		opacity: 1,
		duration: 1,
	});
	preloaderTimeline.to('.preloader .preloader_image', {
		opacity: 0,
		duration: 1,
	});
	preloaderTimeline.to('.preloader', { opacity: 0, pointerEvents: 'none' });
}
preloaderAnimation();

function preloaderShowOncePerDay() {
	setCookie('isVisitToday', true, 1);
}
window.addEventListener('load', () => {
	preloaderShowOncePerDay();
});
