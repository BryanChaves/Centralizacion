


$( "#F1" ).change(function() {
  $("#combo").empty();
	var value = $( "#F1" ).val();
var nombre = "";
if (value == "watersource") 
{
  nombre = "Seleccione la Naciente";
}else{
  if (value == "sampling_site") 
  {
nombre = "Seleccione el Sitio de Muestreo";
  }
}
   	//alert(value);
   	$.getJSON('/combo/'+value,{}, function(json) {
   		$("#combo").empty();
      $('#combo').append("<option value='nombre'>"+nombre+"</option>");
   		$('#combo').append("<option value='todos'>Todos</option>");
   		for (var i = 0; i < json.length; i++) {	
   			$('#combo').append("<option value="+json[i].id+">" +json[i].name+"</option>");	
   		};     
   	});
   });

$( "#combo" ).change(function() {
	var value = $( "#combo" ).val();
	var value2 = $( "#F1" ).val();
//alert(value);
var arreglo = [value2,value];

var table = document.getElementById("f2");
var count =document.getElementById("f2").rows.length;
   	//alert(count);
   	if(count > 1){

   		var myTable = document.getElementById("f2");
   		var rowCount = myTable.rows.length;
   		for (var x=rowCount-1; x>0; x--) {
   			myTable.deleteRow(x);
   		}

   	}
   	$.getJSON('/cargarTabla/'+arreglo,{}, function(json) {
   		for (var i = 0; i < json.length; i++) {	
   			var row = table.insertRow(i+1);
   			var cell0 = row.insertCell(0);
   			var cell1 = row.insertCell(1);
   			var cell2 = row.insertCell(2);
   			var cell3 = row.insertCell(3);
   			var cell4 = row.insertCell(4);
   			var cell5 = row.insertCell(5);
   			var cell6 = row.insertCell(6);
            cell6.innerHTML = json[i].id;
   			cell1.innerHTML = json[i].consecutive;
   			cell2.innerHTML = json[i].label;
   			cell3.innerHTML = json[i].level;	
   			cell4.innerHTML = json[i].name;
   			cell5.innerHTML = json[i].created_at;
   			var element1 = document.createElement("input");
   			element1.type = "checkbox";
   			element1.name="chkbox[]";
   			cell6.style = "visibility:hidden";
   			cell0.appendChild(element1);
   		};     
   	});
   });

function checkAll(table){
	var table = document.getElementById(table);
	var chk = table.getElementsByTagName('input'), val = null;
	var len = chk.length;

	for (var i = 0; i < len; i++) 
	{
		if (chk[i].type == 'checkbox') 
		{
			if (val === null) val = chk[i].checked;
			chk[i].checked = val;
		}
	} 
}

function Generar() {
try {
       var table = document.getElementById('f2');
       var rowCount = table.rows.length;
                         var muestra = new Array();
                         var muestras = new Array();
                         var consecutivo = 0;
                        
       for(var i=1; i<rowCount; i++) 
       {
           var row = table.rows[i];
           var chkbox = row.cells[0].childNodes[0];
           if(null != chkbox && true == chkbox.checked) 
           {	
             
           	muestra = table.tBodies[0].rows[i].cells[6].innerHTML;  	

        muestras[consecutivo] =   muestra;	
        consecutivo++;	                       
           }                           
                }
var form =  document.getElementById('form');  
    input = document.createElement('input');
     input.type = 'hidden';
     input.name = 'muestras';

     input.value = muestras;
     form.appendChild(input);
    // form.submit();
}catch(e) { alert(e);}

}

function form(){
        var table = document.getElementById('f2');
       var rowCount = table.rows.length;
                         var muestra = new Array();
                         var muestras = new Array();
                         var consecutivo = 0;

         var combo = document.getElementById('combo').value;
        var cadena = "";
         var puntoControl = document.getElementById('F1').value;
if(puntoControl == "watersource"){
 cadena = "Debe de seleccionar una Naciente";
}else{
  cadena = "Debe de seleccionar un Muestreos Aleatorios";
}
if(combo == "nombre" ){
   alert(cadena);
                  return false;
}
       for(var i=1; i<rowCount; i++) 
       {
           var row = table.rows[i];
           var chkbox = row.cells[0].childNodes[0];
           if(null != chkbox && true == chkbox.checked) 
           {  
                    return true;
                   
           }                           
                }
                            alert("Debe de seleccionar alguna MUESTRA");
                  return false;  
}
function form2(){

         var combo = document.getElementById('combo').value;
        var cadena = "";
         var puntoControl = document.getElementById('F1').value;
if(puntoControl == " "){
  alert("Debe de seleccionar un punto de Control");
                  return false;
}

if(puntoControl == "watersource"){
 cadena = "Debe de seleccionar una Naciente";
}else{
  cadena = "Debe de seleccionar un Muestreo Aleatorio";
}
if(combo == "nombre" ){
   alert(cadena);
                  return false;
} 
}
