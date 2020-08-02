function countdown(year, month, date, hour, minute, second) {
	var newYear = new Date(); 
	newYear = new Date(year, month-1, date, hour, minute, second);
	$('#countdown').countdown({until: newYear, format: 'DHMS'}); 
}

function topheight(){
  var topDiv = document.getElementById("top");
  var y = (window.innerHeight / 2);
  topDiv.style.height = y-33 + "px";
 }
 
function contentpositionmiddle(){
  var contentDiv = document.getElementById("content");
  var contentDivHeight = $('#content').height();
  var y = (window.innerHeight / 2) - (contentDivHeight / 2);
  contentDiv.style.top = y+"px";
 }

$(document).ready(function() {
	topheight();
	contentpositionmiddle();
	$(function(){
		$(window).resize(topheight);
		$(window).resize(contentpositionmiddle);
	});			
});