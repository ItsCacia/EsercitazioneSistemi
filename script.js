function loginWindow(){
	var ld = document.getElementById("login-div");
	var c = document.getElementById("container");
	var lb = document.getElementById("login-button");
	if (ld.style.display === "none") {
		ld.style.display = "flex";
        	c.style.filter = "blur(5px)";
		lb.value = "Exit";
	} else {
		ld.style.display = "none";
        	c.style.filter = "none";
		lb.value = "Log in";
	}
}

