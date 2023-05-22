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
	<form action="index.php" method="get">
		<input type="text" id="search-bar" placeholder="Search" name="search">
	</form>

        <table id="product-table">
            <?php
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		// Creo la connessione col database
                $mysqli = new mysqli('localhost', 'guest', 'guest');

		$mysqli->select_db("Esercitazione");

		if(isset($_GET['search'])) {
			$search = $_GET['search'];
			$result = $mysqli->query("SELECT * FROM prodotto WHERE nome LIKE '%$search%'", MYSQLI_USE_RESULT);
		} else {
                	$result = $mysqli->query("SELECT * FROM prodotto", MYSQLI_USE_RESULT);
		}

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
