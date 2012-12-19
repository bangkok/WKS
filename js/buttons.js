cont = ".art ";
$(document).ready(function(){
//initializition
$('input[type="radio"], input[type="checkbox"]', cont).addClass('invisible')/*css({'opacity' : '0'})*/.wrap('<span></span>');
$('input[type="radio"], input[type="checkbox"]', cont).parent('span').addClass('checkboxOff');
$('input[type="radio"]:checked, input[type="checkbox"]:checked', cont).parent('span').removeClass('checkboxOff').addClass('checkboxOn');	
//radio
$('input[type="radio"]', cont).change(function(){
	if (this.checked) {
		$('input[type='+this.type+'][name='+this.name+']', cont).parent('span').removeClass('checkboxOn').addClass('checkboxOff');
		$(this).parent('span').removeClass('checkboxOff').addClass('checkboxOn');
	}else{
		$(this).parent('span').removeClass('checkboxOn').addClass('checkboxOff');
	}
});
//checkbox
$('input[type="checkbox"]', cont).change(function(){
	if (this.checked) {
		$(this).parent('span').removeClass('checkboxOff').addClass('checkboxOn');
	}else{
		$(this).parent('span').removeClass('checkboxOn').addClass('checkboxOff');
	}
});

});