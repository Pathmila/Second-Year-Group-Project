//for signups 
function cpassword_validation(){
	var x = document.getElementById("password");
	var y = document.getElementById("cpassword");
	if(x.value==y.value){
			return;
	}else{
		document.getElementById("password").value="";
		document.getElementById("cpassword").value="";
		alert("Password not same");
	}
}

function required_name(){
    var x = document.getElementById("name");
    
    reWhiteSpace = new RegExp(/^\s+$/);
    // Check for white space
    if (reWhiteSpace.test(x.value)) {
        document.getElementById("name").value="";
        alert("Please Check Your Fields For Spaces. No spaces are allowed");
    }
    return;
}

function required_address(){
    var x = document.getElementById("address");
    
    reWhiteSpace = new RegExp(/^\s+$/);
    // Check for white space
    if (reWhiteSpace.test(x.value)) {
        document.getElementById("address").value="";
        alert("Please Check Your Fields For Spaces. No spaces are allowed");
    }
    return;
}

function required_username(){
    var x = document.getElementById("uname");
    
    reWhiteSpace = new RegExp(/^\s+$/);
    // Check for white space
    if (reWhiteSpace.test(x.value)) {
        document.getElementById("uname").value="";
        alert("Please Check Your Fields For Spaces. No spaces are allowed");
    }
    return;
}

function required_ownername(){
    var x = document.getElementById("owner");
    
    reWhiteSpace = new RegExp(/^\s+$/);
    // Check for white space
    if (reWhiteSpace.test(x.value)) {
        document.getElementById("owner").value="";
        alert("Please Check Your Fields For Spaces. No spaces are allowed");
    }
    return;
}

function required_description(){
    var x = document.getElementById("description");
    
    reWhiteSpace = new RegExp(/^\s+$/);
    // Check for white space
    if (reWhiteSpace.test(x.value)) {
        document.getElementById("description").value="";
        alert("Please Check Your Fields For Spaces. No spaces are allowed");
    }
    return;
}

/*
//for user name validation
function name_validate(){
    var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
    var name = document.getElementById('name').value;
    if(!regName.test(name)){
        alert('Please enter your full name (first & last name).');
        document.getElementById("name").value="";
    }else{
        return;
    }
}

//for vehicle owner name validation
function owner_validate(){
    var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
    var name = document.getElementById('owner').value;
    if(!regName.test(name)){
        alert('Please enter your full name (first & last name).');
        document.getElementById("name").value="";
    }else{
        return;
    }
}
*/
//for file size validation
function file_validate(){
    const fi = document.getElementById('image'); 
    // Check if any file is selected. 
    if (fi.files.length > 0) { 
        for (const i = 0; i <= fi.files.length - 1; i++) { 
            const fsize = fi.files.item(i).size; 
            const file = Math.round((fsize / 1024)); 
            // The size of the file. 
            if (file >= 4096) { 
                alert("File too Big, please select a file less than 4mb"); 
                document.getElementById("image").value="";
            } else { 
                return; 
            } 
        } 
    }
}

function file1_validate(){
    const fi = document.getElementById('file1'); 
    // Check if any file is selected. 
    if (fi.files.length > 0) { 
        for (const i = 0; i <= fi.files.length - 1; i++) { 
            const fsize = fi.files.item(i).size; 
            const file = Math.round((fsize / 1024)); 
            // The size of the file. 
            if (file >= 4096) { 
                alert("File too Big, please select a file less than 4mb"); 
                document.getElementById("file1").value="";
            } else { 
                return; 
            } 
        } 
    }
}

function file2_validate(){
    const fi = document.getElementById('file2'); 
    // Check if any file is selected. 
    if (fi.files.length > 0) { 
        for (const i = 0; i <= fi.files.length - 1; i++) { 
            const fsize = fi.files.item(i).size; 
            const file = Math.round((fsize / 1024)); 
            // The size of the file. 
            if (file >= 4096) { 
                alert("File too Big, please select a file less than 4mb"); 
                document.getElementById("file2").value="";
            } else { 
                return; 
            } 
        } 
    }
}

function file3_validate(){
    const fi = document.getElementById('file3'); 
    // Check if any file is selected. 
    if (fi.files.length > 0) { 
        for (const i = 0; i <= fi.files.length - 1; i++) { 
            const fsize = fi.files.item(i).size; 
            const file = Math.round((fsize / 1024)); 
            // The size of the file. 
            if (file >= 4096) { 
                alert("File too Big, please select a file less than 4mb"); 
                document.getElementById("file3").value="";
            } else { 
                return; 
            } 
        } 
    }
}

// Foget password ---> new password
function crpassword_validation(){
	var x = document.getElementById("new_pass");
	var y = document.getElementById("new_pass_c");
	if(x.value==y.value){
			return;
	}else{
		document.getElementById("new_pass").value="";
		document.getElementById("new_pass_c").value="";
		alert("Password not same");
	}
}
