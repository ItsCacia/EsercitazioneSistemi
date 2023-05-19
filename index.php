<!DOCTYPE html>
<html>
<head>
	<title>Prodotti</title>
	<link rel="stylesheet" href="styles.css">
	<script src="script.js"></script>
</head>
<body>
    <button id="login-button" onclick="openLoginWindow()">Login</button>
  
    <div class="container">
        <input type="text" id="search-bar" placeholder="Search">
    
        <table id="product-table">
            <?php include('index.php'); ?>
        </table>
    </div>
</body>
</html>
