pt = false;
dt = false;
ht = false;

function validaPlaca(p) {

    var placa = document.getElementById(p).value;
    
    document.getElementById(p).style = "background-color: #f2dede";
    //document.getElementById(p).style = "color: #ab4a48";
    var regex = /[a-zA-Z]{3}-[0-9]{4}/;

    if (regex.test(placa) && placa.length == 8) {
    	pt = true;
        document.getElementById(p).style = "background-color: #dff0d8";
        //document.getElementById(p).style = "color: #467d46";

    } else {
    	pt = false;
    }

}

function validaData(d) {
	
	var data = document.getElementById(d).value;

	document.getElementById(d).style = "background-color: #f2dede";
	//document.getElementById(d).style = "color: #ab4a48";
	var regex = /[0-9]{4}-[0-9]{2}-[0-9]{2}/;

	if (regex.test(data) && data.length === 10) {
		dt = true;
		document.getElementById(d).style = "background-color: #dff0d8";
		//document.getElementById(d).style = "color: #467d46";
	} else {
		dt = false;
	}
	

}

function validaHora(h) {
	
	var hora = document.getElementById(h).value;

	document.getElementById(h).style = "background-color: #f2dede";
	//document.getElementById(h).style = "color: #ab4a48";
	var regex = /[0-9]{2}:[0-9]{2}/;

	if (regex.test(hora) && hora.length === 5) {
		ht = true;
		document.getElementById(h).style = "background-color: #dff0d8";
		//document.getElementById(h).style = "color: #467d46";
	} else {
		ht = false;
	}
    
}

function testa() {

	validaHora("hora");
	validaData("data");
	validaPlaca("placa");
	
	if (pt === true && ht === true && dt === true) {
		return true;
	} 
	document.getElementById("mensagem").style = "display: block";
	return false;
}