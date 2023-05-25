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

window.addEventListener('load', function() {
	var productItems = document.getElementsByClassName('product-item');

	var maxHeight = 0;
	for (var i = 0; i < productItems.length; i++) {
		var height = productItems[i].offsetHeight;
		if (height > maxHeight) {
			maxHeight = height;
		}
	}

	for (var i = 0; i < productItems.length; i++) {
		productItems[i].style.height = maxHeight + 'px';
	}
});
