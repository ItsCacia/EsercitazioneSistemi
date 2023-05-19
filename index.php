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
                // Creo la connessione col database
                $mysqli = new mysqli('localhost', 'guest', 'guest', 'Esercitazione');

                $result = $mysqli->query("SELECT * FROM prodotto", MYSQLI_USE_RESULT);

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

                $result->close();
                $mysqli->close();
            ?>
        </table>
    </div>
</body>
</html>
