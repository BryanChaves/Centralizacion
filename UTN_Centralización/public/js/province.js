


$( "#province" ).change(function() {
   	var value = $( "#province" ).val();
   	
		$("#district").empty();
	if (value==" ") {
		$("#canton").empty();
		$("#district").empty();
	}else{
		$.getJSON('/canton/'+value,{}, function(json) {
			$("#canton").empty();
			$('#canton').append("<option value="+" "+">" +"Seleccione un cantón"+"</option>");
        	for (var i = 0; i < json.length; i++) {	
        		$('#canton').append("<option value="+json[i].id+">" +json[i].name+"</option>");	
            };
                    
        });

  	}

});

$( "#canton" ).change(function() {
var value2 = $("#canton").val();
	
	if (value2=="") {
		$("#district").empty();
	}else{
		$.getJSON('/district/'+value2,{}, function(json) {
			$("#district").empty();
			$('#district').append("<option value="+" "+">" +"Seleccione un distrito"+"</option>");
        	for (var i = 0; i < json.length; i++) {	
        		$('#district').append("<option value="+json[i].id+">" +json[i].name+"</option>");	
            };
                    
        });

  	}


});



 



          



 
