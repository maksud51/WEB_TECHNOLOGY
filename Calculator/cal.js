	function BACKSPC(){
	var VAL = document.calcul.result.value;
	document.calcul.result.value = VAL.substr(0, VAL.length-1);
	}

	function number(value){
	document.calcul.result.value += value;
	}

	function remv(){
	document.calcul.result.value=" ";
	}

	function equal(){
	document.calcul.result.value=eval(document.calcul.result.value);
	}
