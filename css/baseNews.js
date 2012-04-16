// ActionScript Document
var news1A = new Array();
var news2A = new Array();
var news3A = new Array();


//news1
news1A[0]="Открытие новой торговой площадки на Донецком шоссе"; news1A[1]="12.01.2010";
news1A[2]="Поздравляем наших клиентов с открытием новой торговой площадки на Донецком шоссе по улице Нижнеднепровская,2а.<a href='http://vikkon.dp.ua/main/news.html'>подробнее &gt;&gt;</a>";


//news2
news2A[0]="Мы готовы к новому сезону! А Вы?"; news3A[1]="1.03.09";
news2A[2]="Отныне, сотрудничая с нашей компанией, можно не просто закупить строительные материалы – Вы можете подойти в вопросу создания дома своей мечты комплексно. <a href='http://vikkon.dp.ua/main/news.html'>подробнее &gt;&gt;</a>";






	var news1=document.getElementById("news1"); 
			news1T="<span class='newsHead'>"+news1A[0]+"</span>";
			news1T=news1T+"<span class='newsDate'>"+news1A[1]+"</span><br />";
			news1T=news1T+"<span class='newsText'>"+news1A[2]+"</span>";
			news1.innerHTML=news1T;

	var news2=document.getElementById("news2"); 
			news2T="<span class='newsHead'>"+news2A[0]+"</span>";
			news2T=news2T+"<span class='newsDate'>"+news2A[1]+"</span><br />";
			news2T=news2T+"<span class='newsText'>"+news2A[2]+"</span>";
			news2.innerHTML=news2T;