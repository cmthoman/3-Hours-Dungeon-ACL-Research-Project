$(document).ready(function(){
	
	//Submit Button
	$(".buttonLargeGreen").click(function(){
		$('#UserRegisterForm').submit();
	});
	
	//Username Field
	if($('#UserUsername').attr('value') == ''){
		$('#UserUsername').attr('value', 'Enter User Name');
	}
	$('#UserUsername').focusin(function(){
		fieldText = $('#UserUsername').attr('value');
		if(fieldText == 'Enter User Name'){
		$(this).attr('value', '');
		}
	}).focusout(function(){
		fieldText = $('#UserUsername').attr('value');
		if(fieldText == ''){
		$(this).attr('value', 'Enter User Name');
		}
	});
	
	//Email Fields
	if($('#UserEmail').attr('value') == ''){
		$('#UserEmail').attr('value', 'Enter Valid E-Mail Address');
	}
	$('#UserEmail').focusin(function(){
		fieldText = $('#UserEmail').attr('value');
		if(fieldText == 'Enter Valid E-Mail Address'){
		$(this).attr('value', '');
		}
	}).focusout(function(){
		fieldText = $('#UserEmail').attr('value');
		if(fieldText == ''){
		$(this).attr('value', 'Enter Valid E-Mail Address');
		}
	});
	if($('#UserEmail2').attr('value') == ''){
		$('#UserEmail2').attr('value', 'Re-Enter E-Mail Address');
	}
	$('#UserEmail2').focusin(function(){
		fieldText = $('#UserEmail2').attr('value');
		if(fieldText == 'Re-Enter E-Mail Address'){
		$(this).attr('value', '');
		}
	}).focusout(function(){
		fieldText = $('#UserEmail2').attr('value');
		if(fieldText == ''){
		$(this).attr('value', 'Re-Enter E-Mail Address');
		}
	});
	
	//Password Fields
	$('#UserPassword').get(0).type = 'text';
	$('#UserPassword').attr('value', 'Enter Password').focusin(function(){
		fieldText = $('#UserPassword').attr('value');
		if(fieldText == 'Enter Password'){
		$(this).attr({'value' : ''}).get(0).type = 'password';
		}
	}).focusout(function(){
		fieldText = $('#UserPassword').attr('value');
		if(fieldText == ''){
		$(this).attr({'value' : 'Enter Password'}).get(0).type = 'text';
		}
	});
	$('#UserPassword2').get(0).type = 'text';
	$('#UserPassword2').attr('value', 'Re-Enter Password').focusin(function(){
		fieldText = $('#UserPassword2').attr('value');
		if(fieldText == 'Re-Enter Password'){
		$(this).attr({'value' : ''}).get(0).type = 'password';
		}
	}).focusout(function(){
		fieldText = $('#UserPassword2').attr('value');
		if(fieldText == ''){
		$(this).attr({'value' : 'Re-Enter Password'}).get(0).type = 'text';
		}
	});
});
