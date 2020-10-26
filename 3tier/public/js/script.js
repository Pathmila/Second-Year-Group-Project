function cpassword_validation(){
	var x = document.getElementById("password");
	var y = document.getElementById("cpassword");
	if(x.value==y.value){
		return;
	}else{
		alert("Password not same");
	}
}


