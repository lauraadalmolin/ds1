function troca(id) {

	document.getElementById("deposito").style = "display: none"; 
	document.getElementById("saque").style = "display: none";  
	document.getElementById("transferencia").style = "display: none";  
	if ("deposito" === id) {
		document.getElementById(id).style = "display: block"; 
	}
	if ("saque" === id) {
		document.getElementById(id).style = "display: block"; 
	}
	if ("transferencia" === id) {
		document.getElementById(id).style = "display: block"; 
	}
	
}