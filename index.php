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
            <?php
                // Connect to your MySQL database using mysqli
                $servername = "localhost";
                $username = "guest";
                $password = "guest";
                $database = "Esercitazione";
    
                $conn = mysqli_connect($servername, $username, $password, $database);
                if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
                }
            
                // Fetch products from your MySQL database
                $sql = "SELECT * FROM prodotto";
                $result = mysqli_query($conn, $sql);
            
                // Loop through the products and display them in divs
                $count = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                  if ($count % 5 === 0) {
                    echo "<tr>";
                  }
              
                  echo "<td>";
                  echo "<div class='product-item'>";
                  echo "<h3>" . $row['nome'] . "</h3>";
                  echo "<p>" . $row['descrizione'] . "</p>";
                  echo "<p>" . $row['prezzo'] . "</p>";
                  echo "<p>" . $row['quantita'] . "</p>";
                  echo "</div>";
                  echo "</td>";
              
                  if ($count % 5 === 4) {
                    echo "</tr>";
                  }
              
                  $count++;
                }
            
                mysqli_close($conn);
            ?>
        </table>
    </div>
</body>
</html>
