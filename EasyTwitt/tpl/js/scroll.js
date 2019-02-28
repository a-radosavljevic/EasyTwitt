$(function () {
	$(document).scroll(function () {
		var $nav = $(".navbar-fixed-top");
		$nav.toggleClass('navbar-inverse', $(this).scrollTop() > $nav.height());
	});
});