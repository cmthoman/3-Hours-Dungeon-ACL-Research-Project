$(document).ready(function() {
	userControlWidth = $("#userControl").width();
	userControlLeftWidth = $("#userControlLeft").width();
	$("#userControlBody").css('width', userControlWidth - userControlLeftWidth);
});