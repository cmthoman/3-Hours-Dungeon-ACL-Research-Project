$(document).ready(function() {

	//Buttons
		//Form Submit Button Green
			$(".submitButtonLargeGreen").click(function(){
				formId = $(this).attr('id');
				$("#"+formId).submit();
			});	
	//Site Navigation
		//Find Page & Set Active State (Page is located in a special hidden div with attribute page='<page>' which is set by the current controller on page load)
		page = $("div[page]").attr('page');
		if(page != ''){
			$("#"+page).attr('src', $("#"+page).attr('src').replace(/\.png/, '-active.png'));
		}
		
		//Rollover States
		$(".navButton").each(function(){
			$(this).find('img').mouseover(function(){
				if($(this).attr('id') != page){
					$(this).attr('src', $(this).attr('src').replace(/\.png/, '-hover.png'));
				}
			});
			$(this).find('img').mouseout(function(){
				if($(this).attr('id') != page){
					$(this).attr('src', $(this).attr('src').replace(/\-hover.png/, '.png'));
				}
			});
		})
		
	//Searchbar
	$('.searchField').attr('value', 'Search 3HD').focusin(function(){
		fieldText = $('.searchField').attr('value');
		if(fieldText == 'Search 3HD'){
		$(this).attr('value', '');
		}
	}).focusout(function(){
		fieldText = $('.searchField').attr('value');
		if(fieldText == ''){
		$(this).attr('value', 'Search 3HD');
		}
	});
	
	//Embedded Login
		//Open Login Box
		$("#login").click(function(){
			$("#blackout").css('visibility', 'visible');
			$("#embeddedLogin").css('visibility', 'visible');
		});
	
		//Close Login Box
		$("#blackout").click(function(){
			$(this).css('visibility', 'hidden');
			$("#embeddedLogin").css('visibility', 'hidden');
		});
			
	//Page Options
		//Open/Close Options
		state = "closed";
		$("#pageControlsTab").click(function(){
			if(state != "opened"){
				$(this).css('background-image', "url('/img/site-resources/page-controls-tab-opened.png')");
				$("#pageControlsBody").css({'visibility' : 'visible', 'display': 'inline'});
				state = 'opened';
			}else{
				$(this).css('background-image', "url('/img/site-resources/page-controls-tab-closed.png')");
				$("#pageControlsBody").css({'visibility' : 'hidden', 'display': 'none'});
				state = 'closed';
			}
		});
});