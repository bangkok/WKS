// JavaScript Document
var AnnounceA = new Array();
var AnnounceB = new Array();


//start content
//ПРОДАЕМ
AnnounceA[0]="";
AnnounceA[1]="";


//КУПИМ
AnnounceB [0]="Погрузчик импортного производства б/у";


//end content





	var Announce=document.getElementById("right_text"); 
			AnnounceT="<span class='menuT_R_H'>ПРОДАЕМ:</span><span class='menuT_R_T'>";
			for (var i=0; i<AnnounceA.length;i++)
			{
				AnnounceT=AnnounceT+AnnounceA[i]+"<br/><br/>";
			}
			AnnounceT=AnnounceT+"</span>";
			
			AnnounceT= AnnounceT+"<span class='menuT_R_H'>КУПИМ:</span><span class='menuT_R_T'>";
			for (var i=0; i<AnnounceB.length;i++)
			{
				AnnounceT=AnnounceT+AnnounceB[i]+"<br/>";
			}
			AnnounceT=AnnounceT+"</span>";
			
			
			Announce.innerHTML=AnnounceT;

