jQuery(document).ready(function($){
//toggle nav menu
	var $root =$('html','body'),
	menu_toggle =$('.menu-toggle');
	menu_toggle.on('click',function(){
	var $this = $(this);
		$this.toggleClass('close');
		$('.menu, .menu-nav, .menu-nav-item').toggleClass('show');
	});
});  