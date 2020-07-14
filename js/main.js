
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
function validInput(input){
	var type = $(input).attr('type');
	var id = $(input).attr('id');
	if (id==="name") {
		if (input.val().length <= 0) {
			$("#name").addClass('emptyInp');
			$("#name").removeClass('fullInp');	
		}else{
			$("#name").removeClass('emptyInp');	
			$("#name").addClass('fullInp');
		}
	}else if(id==="lastname"){
		if (input.val().length <= 0) {
			$("#lastname").addClass('emptyInp');
			$("#lastname").removeClass('fullInp');	
		}else{
			$("#lastname").removeClass('emptyInp');	
			$("#lastname").addClass('fullInp');
		}
	}else if(id==="country"){
		if (input.val().length <= 0) {
			$("#country").addClass('emptyInp');
			$("#country").removeClass('fullInp');	
		}else{
			$("#country").removeClass('emptyInp');	
			$("#country").addClass('fullInp');
		}
	}
}
$('input').keyup(function(){
	validInput($(this));
	if(!radio_value_date()){
		$("#seguir").addClass('seguir');
	}else{
		$("#seguir").removeClass('seguir');
	}
});

function radio_value_date(){
	var radioName = document.testMaya.name.value;
	var radioLastname = document.testMaya.lastname.value;
	var radioCountry = document.testMaya.country.value;
	if (radioName.lenght==0) {radioName="";}
	if (radioLastname.lenght==0) {radioName="";}
	if (radioCountry.lenght==0) {radioName="";}
	if(radioName!='' && radioCountry!='' && radioLastname!=''){
		return true;
	}else{
		return false;
	}
}
function radio_value() { //Crear funcion para avnzar option
	var radioName = document.testMaya.name.value;
	var radioLastname = document.testMaya.lastname.value;
	var radioCountry = document.testMaya.country.value;
	var radioOption1 = document.testMaya.option1.value;
	var radioOption2 = document.testMaya.option2.value;
	var radioOption3 = document.testMaya.option3.value;
	var radioOption4 = document.testMaya.option4.value;
	var radioOption5 = document.testMaya.option5.value;
	var radioOption6 = document.testMaya.option6.value;
	var radioOption7 = document.testMaya.option7.value;
	var radioOption8 = document.testMaya.option8.value;
	var radioOption9 = document.testMaya.option9.value;
	var radioOption10 = document.testMaya.option10.value;
	if (radioName.lenght==0) {radioName="";}
	if (radioLastname.lenght==0) {radioName="";}
	if (radioCountry.lenght==0) {radioName="";}
	if (radioOption1.lenght==0) {radioOption1="";}
	if (radioOption2.lenght==0) {radioOption2="";}
	if (radioOption3.lenght==0) {radioOption3="";}
	if (radioOption4.lenght==0) {radioOption4="";}
	if (radioOption5.lenght==0) {radioOption5="";}
	if (radioOption6.lenght==0) {radioOption6="";}
	if (radioOption7.lenght==0) {radioOption7="";}
	if (radioOption8.lenght==0) {radioOption8="";}
	if (radioOption9.lenght==0) {radioOption9="";}
	if (radioOption10.lenght==0) {radioOption10="";}
	var answers = {
		"radioName":radioName,
		"radioLastname":radioLastname,
		"radioCountry":radioCountry,
		"radioOption1":radioOption1,
		"radioOption2":radioOption2,
		"radioOption3":radioOption3,
		"radioOption4":radioOption4,
		"radioOption5":radioOption5,
		"radioOption6":radioOption6,
		"radioOption7":radioOption7,
		"radioOption8":radioOption8,
		"radioOption9":radioOption9,
		"radioOption10":radioOption10,
		"Insert":'insert'
	}
	return answers;
 }

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
		//activate next step on progressbar using the index of next_fs
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		
		//show the next fieldset
		next_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({
			'transform': 'scale('+scale+')',
			'position': 'absolute'
		});
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		},
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
	
});
$(".submit").click(function(e){
	e.preventDefault();//detenemos el envio
	const answers = radio_value();
	$.ajax({
		type: "POST",
		url: "CTest.php",
		data: answers,
		beforeSend: function () { //Hacer que se muestre mi modal
			$("#msform").fadeToggle(1000);
		},
		success: function (response) {
			console.log(response.message);
			if (response.message=='OK') {
				$("#succes").fadeIn(4000, function () { 
					document.getElementById('succes').innerHTML=""
					var datos = '';
					datos += '<div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">';
					datos += '<div class="swal2-success-circular-line-left"></div>';
					datos += '<span class="swal2-success-line-tip"></span>';
					datos += '<span class="swal2-success-line-long"></span>';
					datos += '<div class="swal2-success-ring"></div> ';
					datos += ' <div class="swal2-success-fix"></div>';
					datos += '<div class="swal2-success-circular-line-right"></div>';
					datos += '</div>';
					datos += '<div id="bien">Bien! Redireccionando a los resultado</div>';
					datos += '';
					document.getElementById('succes').innerHTML = datos;
					setTimeout(function() {
                        $("#alerta").fadeOut(2500);
                        window.location.href = './answer.php?name='+response.name;
                    }, 3000);
				 });
			}else if(response=="Error"){
				$("#error").fadeIn(4000, function () { 
					document.getElementById('error').innerHTML=""
					var datos = '';
					datos += '<div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">';
					datos += '<span class="swal2-x-mark">';
					datos += '<span class="swal2-x-mark-line-left"></span>';
					datos += '<span class="swal2-x-mark-line-right"></span>';
					datos += '</span>';
					datos += '</div>';
					datos += '<div id="faltoAlgo">Algo falló ¿Quiere reintentar?';
					datos += '</div>';
					datos += '';
					document.getElementById('error').innerHTML = datos;
				});
			}else{
				$("#error").fadeIn(4000, function () { 
					document.getElementById('error').innerHTML=""
					var datos = '';
					datos += '<div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">';
					datos += '<span class="swal2-x-mark">';
					datos += '<span class="swal2-x-mark-line-left"></span>';
					datos += '<span class="swal2-x-mark-line-right"></span>';
					datos += '</span>';
					datos += '</div>';
					datos += '<div id="faltoAlgo">Faltó preguntas por contestar';
					datos += '</div>';
					datos += '';
					document.getElementById('error').innerHTML = datos;
				});
			}
		},error:function () {
			$("#error").fadeIn(4000, function () { 
				document.getElementById('error').innerHTML=""
				var datos = '';
				datos += '<div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">';
				datos += '<span class="swal2-x-mark">';
				datos += '<span class="swal2-x-mark-line-left"></span>';
				datos += '<span class="swal2-x-mark-line-right"></span>';
				datos += '</span>';
				datos += '</div>';
				datos += '';
				document.getElementById('error').innerHTML = datos;
			});
		 }
	});
})
$('regregsar').click(function (e) { 
	e.preventDefault();
	console.log('HOla')
});

// Hacer que se inserte en mi BD
