
$(document).ready(function(){

	$("div.text").each(function() {Blocks.init(this)});

});

var Blocks = {

	options: {
		height_naw: 30,
		width_scroll: 30,
		width_content: 765,
		height_content: 400
	},

	init: function (text)
	{
		this.text = $(text);

		if (this.text.height() > this.options.height_content) {

			this.buildElements();

			this.calcSize();

			this.initScroll();
		}

	},

	buildElements: function ()
	{
		this.content = $('<div class="content" style="float:left;overflow-y:hidden;"/>');
		this.block = $('<div class="block"/>');
		this.block.append(this.content);
		this.text.before(this.block);
		this.content.append(this.text);

		this.naw = $('<div class="naw"/>')
		this.naw_next = $('<div class="next" style="float:right;">читать далее...</div>');
		this.naw_back =  $('<div class="back" style="float:left;display: none;">вернуться назад</div>');
		this.naw.append(this.naw_next, this.naw_back);

		this.scroll = $('<div class="scroll" style="float:right;"/>');
		this.slider = $('<div class="slider-vertical" style="margin-left:10px;margin-top:15px" />');
		this.scroll.append(this.slider);
	},

	calcSize: function ()
	{
		this.content.width(this.options.width_content < this.text.width()
			? this.options.width_content
			: this.text.width()
		);
		this.content.height(this.options.height_content < this.text.height()
			? this.options.height_content
			: this.text.height()
		);

		this.naw.width(this.content.width());
		this.naw.height(this.options.height_naw);

		this.scroll.width(this.options.width_scroll);
		this.scroll.height(this.content.height());
		this.slider.height(this.scroll.height() - this.options.height_naw);

		this.block.width(this.content.width());
		this.block.height(this.content.height());
	},

	initScroll: function ()
	{
		var controller = this;

		this.block.height(this.block.height() + this.naw.height());
		this.block.width(this.block.width() + this.scroll.width());
		this.naw.width(this.block.width());
		this.block.append(this.scroll, this.naw);

		this.naw_next.click(function() {controller.scrollFn(-controller.options.height_content);});

		this.naw_back.click(function() {controller.scrollFn(controller.options.height_content);});

		this.block.on('mousewheel',function(e) {
			controller.scrollFn(e.originalEvent.wheelDeltaY) && e.preventDefault();
		});

		this.initSlider();
	},

	initSlider: function ()
	{
		var controller = this;

		this.slider.slider({
			orientation: "vertical",
			min: 0,
			max: 100,
			value: 100,
			slide: function( event, ui ) {
				var scroll_percent = (ui.value - 100) / 100 * (controller.text.height() - controller.options.height_content);
				controller.text.css({'marginTop': Math.round(scroll_percent)});
				controller.scrollFn(0);
			}
		});
	},

	scrollFn: function (step)
	{
		var sub = 0,
			margin_top = parseInt(this.text.css('marginTop').substring(0, this.text.css('marginTop').indexOf("px")));
		var process_margin = margin_top + step;

		if (step > 0) {

			if ((- margin_top) > step){
				sub = step;
			} else {
				sub = (- margin_top);
			}

		} else if (step < 0) {

			if ((this.text.height() + process_margin) > this.options.height_content) {
				sub = step;
			} else {
				sub = -(this.text.height() - this.options.height_content + margin_top);
			}

		}

		process_margin >= 0
			? this.naw_back.is(":hidden") || this.naw_back.fadeOut('slow')
			: this.naw_back.is(":hidden") && this.naw_back.fadeIn('slow');

		this.options.height_content - process_margin - this.text.height() >= 0
			? this.naw_next.is(":hidden") || this.naw_next.fadeOut('slow')
			: this.naw_next.is(":hidden") && this.naw_next.fadeIn('slow');

		sub && this.doScroll(margin_top + sub);

		return sub;
	},

	doScroll: function (value)
	{
		var scroll_percent = value * 100 / (this.text.height() - this.options.height_content) + 100;
		this.slider.slider({
			value: Math.round(scroll_percent)
		});
		this.text.stop(false,true).animate({'marginTop': value});
	}

};

/*
function run(text){

	text = $(text);
	var content = $('<div class="content" style="float:left;overflow-y:hidden;"/>');
	var block = $('<div class="block"/>');
	block.append(content);
	text.before(block);
	content.append(text);

	var naw = $('<div class="naw"/>')
	var naw_next = $('<div class="next" style="float:right;">читать далее...</div>');
	var naw_back = $('<div class="back" style="float:left;display: none;">вернуться назад</div>');
	naw.append(naw_next, naw_back);

	var scroll = $('<div class="scroll" style="float:right;"/>');
	var slider = $('<div class="slider-vertical" style="margin-left:10px;margin-top:15px" />');
	scroll.append(slider);


	var height_naw = 30;
	var width_scroll = 30;
	var width_content = 765;
	var height_content = 400;

	content.width(width_content < text.width() ? width_content : text.width());
	content.height(height_content < text.height() ? height_content : text.height());
	var height_text = text.height();

	naw.width(content.width());
	naw.height(height_naw);

	scroll.width(width_scroll);
	scroll.height(content.height());
	slider.height(scroll.height()-30);

	block.width(content.width());
	block.height(content.height());

	if(height_text > height_content){
		block.height(block.height() + naw.height());
		block.width(block.width() + scroll.width());
		naw.width(block.width());
		block.append(scroll, naw);

	}

	slider.slider({
		orientation: "vertical",
		min: 0,
		max: 100,
		value: 100,
		slide: function( event, ui ) {
			$( "#amount" ).val( Math.round((ui.value-100)/100*(height_text-height_content)) );
			text.css({'marginTop': Math.round((ui.value-100)/100*(height_text-height_content))});
		}
	});
	$( "#amount" ).val( $( "#slider-vertical" ).slider( "value" ) );

	var scrollFn = function(step){
		var sub,
			margin_top = parseInt(text.css('marginTop').substring(0,text.css('marginTop').indexOf("px")));

		if (step > 0) {

			if ((- margin_top) > step){
				sub = step;
			} else {
				sub = (- margin_top);
				naw_back.fadeOut('slow');
			}
			if (naw_next.is(":hidden")){naw_next.fadeIn('slow');}

		} else if (step < 0) {

			if ((height_text + step + margin_top) > height_content) {
				sub = step;
			} else {
				sub = -(height_text - height_content + margin_top);
				naw_next.fadeOut('slow');
			}
			if (naw_back.is(":hidden")){naw_back.fadeIn('slow');}
		}

		text.stop(false,true).animate({'marginTop':margin_top + sub});
		slider.slider({ value: Math.round((margin_top + sub) * 100 / (height_text - height_content) + 100) });

	};

	naw_next.click(function(){scrollFn(-height_content);});

	naw_back.click(function(){scrollFn(height_content);});

	block.on('mousewheel',function(e){
		e.preventDefault();
		scrollFn(e.originalEvent.wheelDeltaY);
	});

}
*/