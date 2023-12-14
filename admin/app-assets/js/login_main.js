function AjaxFormS(FORMID,SONUCID){

$("#"+SONUCID).fadeOut(400);

var urlal		= $("#"+FORMID).attr("action");

$.ajax({ 

type:'POST',

url:urlal,

data:$('#'+FORMID).serialize(), 

success:function(cevap){
	
$("#"+SONUCID).html(cevap); 

$("#"+SONUCID).fadeIn(400);

}

});

}



function ajaxHere(nere,load_content){

$("#"+load_content).html('');

$.get(nere, function(data, status){

$("#"+load_content).html(data);

});

}
