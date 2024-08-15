$(document).ready(function() {
	
	$(window).scroll(function() {
		if ($(this).scrollTop() > 1){  
			$('.page-title').addClass("sticky");
		}
		else{
			$('.page-title').removeClass("sticky");
		}
	});

});


document.addEventListener('DOMContentLoaded', function() {
	const menuToggle = document.querySelector('.menu-toggle');
	const mainNavigation = document.querySelector('.main-navigation');

	if (menuToggle) {
		menuToggle.addEventListener('click', function() {
			mainNavigation.classList.toggle('active');
		});
	}
});