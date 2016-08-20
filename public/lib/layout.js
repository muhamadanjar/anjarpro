$(document).ready(function () {
	//Layout
	var mainLayout = $('body').layout({ 
		applyDefaultStyles: true,
		north__closable:false,north__resizable:false,
		east__size:300,east__closable:false,east__resizable:false,
		south__size:45,south__closable:false,south__resizable:false
	});
	
	// qTip plugin
	$('#btnPrev[title], #btnNext[title], a[title]').qtip({ 
		style: { 
			name: 'dark', 
			tip: true,
			border:{width:2,color:'#ffaf0f',radius:3},
			width:{min:115}
		}
	});
	
});

$(function(){
	//Regola le azioni del mouse sui bottoni della toolbar
	$(".fg-button:not(.ui-state-disabled)")
	.hover(
		function(){ 
			$(this).addClass("ui-state-hover"); 
		},
		function(){ 
			$(this).removeClass("ui-state-hover"); 
		}
	)
	.mousedown(function(){
			$(this).parents('.fg-buttonset-single:first').find(".fg-button.ui-state-active").removeClass("ui-state-active");
			if( $(this).is('.ui-state-active.fg-button-toggleable, .fg-buttonset-multi .ui-state-active') ){ $(this).removeClass("ui-state-active"); }
			else { $(this).addClass("ui-state-active"); }	
	})
	.mouseup(function(){
		if(! $(this).is('.fg-button-toggleable, .fg-buttonset-single .fg-button,  .fg-buttonset-multi .fg-button') ){
			$(this).removeClass("ui-state-active");
		}
	});
});
