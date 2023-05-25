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
