
$(document).ready(function(){
	var text = $("div.text");

	text.each(function(){run(this)});

});

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

	naw_next.click(function(){
		margin_top = parseInt(text.css('marginTop').substring(0,text.css('marginTop').indexOf("px")));
		if((height_text - height_content + margin_top) > height_content){
			sub = height_content;
		}else{
			sub = height_text - height_content + margin_top;
			naw_next.fadeOut('slow');
		}
		if(naw_back.is(":hidden")){naw_back.fadeIn('slow');}
		text.stop(false,true).animate({'marginTop':margin_top - sub});
		slider.slider({ value: Math.round((margin_top - sub)*100/(height_text-height_content)+100) });
		//console.log(margin_top + ' ' + sub + ' ' + Math.round(100+(margin_top - sub)*100/(height_text-height_content)) );
	});
	naw_back.click(function(){
		margin_top = parseInt(text.css('marginTop').substring(0,text.css('marginTop').indexOf("px")));
		if((- margin_top) > height_content){
			sub = height_content;
		}else{
			sub = (- margin_top);
			naw_back.fadeOut('slow');
		}
		if(naw_next.is(":hidden")){naw_next.fadeIn('slow');}
		text.stop(false,true).animate({'marginTop':margin_top + sub});
		slider.slider({ value: Math.round(100+(margin_top + sub)*100/(height_text-height_content)) });
		//console.log(margin_top + ' ' + sub + ' ' + Math.round(100+(margin_top + sub)*100/(height_text-height_content)));
	});
}


/*
var Blocks = new Blocks_Class({

	options:{
		height_naw: 20,
		width_scroll: 30,
		width_content: 500,
		height_content: 300
	},
	init: function(text){

		this.text = $(text);
		this.content = $('<div class="content" style="float:left;overflow-y:hidden;"/>');
		this.block = $('<div class="block" style="border: 1px #000 solid;" id="bl"/>');
		this.block.append(content);
		this.text.before(this.block);
		this.content.append(this.text);

		this.naw = $('<div class="naw"/>')
		this.naw_next = $('<div class="next" style="float:right;">next</div>');
		this.naw_back = $('<div class="back" style="float:left;display: none;">back</div>');
		this.naw.append(this.naw_next, this.naw_back);

		this.scroll = $('<div class="scroll" style="float:right;"/>');
		this.slider = $('<div class="slider-vertical" style="margin-left:10px;margin-top:15px" />');
		this.scroll.append(this.slider);

	},
	calcSize: function(){

		this.height_text = this.text.height();

		this.content.width(this.width_content<this.text.width()?this.width_content:this.text.width());
		this.content.height(this.height_content<this.height_text?this.height_content:this.height_text);

		this.naw.width(this.content.width());
		this.naw.height(this.height_naw);

		this.scroll.width(this.width_scroll);
		this.scroll.height(this.content.height());
		this.slider.height(this.scroll.height()-30);

		this.block.width(this.content.width());
		this.block.height(this.content.height());

	},
	run: function(){}

});

*/