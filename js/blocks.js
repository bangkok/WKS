
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
		this.naw = $('<div class="naw"/>');
		this.naw_next = $('<div class="next" style="float:right;">читать далее...</div>');
		this.naw_back =  $('<div class="back" style="float:left;display: none;">вернуться назад</div>');
		this.scroll = $('<div class="scroll" style="float:right;"/>');
		this.slider = $('<div class="slider-vertical" style="margin-left:10px;margin-top:15px" />');

		this.scroll.append(this.slider);
		this.naw.append(this.naw_next, this.naw_back);
		this.block.append(this.content, this.scroll, this.naw);

		this.text.before(this.block);
		this.content.append(this.text);
		this.text.css('overflow', 'hidden');

	},

	calcSize: function ()
	{
		this.content.width(this.options.width_content);
		this.content.height(this.options.height_content);

		this.scroll.width(this.options.width_scroll);
		this.slider.height(this.content.height() - this.options.height_naw);

		this.block.height(this.content.height() + this.options.height_naw);
		this.block.width(this.content.width() + this.scroll.width());

		this.naw.width(this.content.width());
		this.naw.width(this.block.width());

	},

	initScroll: function ()
	{
		var controller = this;

		this.naw_next.click(function() {controller.scrollFn(-controller.options.height_content);});
		this.naw_back.click(function() {controller.scrollFn(controller.options.height_content);});

		this.block.on('mousewheel DOMMouseScroll',function(e) {
			var delta = e.originalEvent.wheelDeltaY || -e.originalEvent.detail*40;
			controller.scrollFn(delta) && e.preventDefault();
		});

		/* touch */
		var initialY  = null;

		this.content.on('touchstart', function(event) {
			var touch = event.originalEvent.targetTouches[0];
			initialY = touch.pageY;
		});
		this.content.on('touchend touchcancel', function(event) {
			initialY = null;
		});
		this.content.on('touchmove', function(event) {
			if (initialY == null) return false;
			var touch = event.originalEvent.targetTouches[0],
				direction = touch.pageY - initialY;
			controller.scrollFn(direction) && event.preventDefault();
		});

		this.scroll.on('touchmove', function(event) {

			var touch = event.originalEvent.targetTouches[0],
				scroll_height = controller.scroll.height(),
				text_height = controller.text.height()- controller.content.height(),
				direction = touch.pageY - this.offset().top,
				value = direction / scroll_height * text_height;

			if (direction < 0 || direction > scroll_height) return false;

			controller.doScroll(-value);
			controller.scrollFn(0);
			event.preventDefault();

		});

		this.initSlider();
	},

	initSlider: function ()
	{

		this.slider.slider({
			orientation: "vertical",
			min: 0,
			max: 100,
			value: 100,
			slide: function( event, ui ) {onSliderMove(ui.value);}
		});

		var onSliderMove = function(value)
		{
			var scroll_percent = (value - 100) / 100 * (this.text.height() - this.options.height_content);
			this.text.css({'marginTop': Math.round(scroll_percent)});
			this.scrollFn(0);
		}.bind(this);
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