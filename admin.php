<!DOCTYPE html>
<html>
<head>
	<title>Outlet spaziale #42</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>    
        <h2>Outlet spaziale #42 - vista admin</h2>
        <button id="login-button" class="button" onclick="openLoginWindow()">Login</button>
    </header>

    <div id="container">
        <div id="search-div">
	        <form action="index.php" method="get">
	        	<input type="text" id="search-bar" placeholder="Search" name="search">
	        </form>
        </div>

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
		        	$result = $mysqli->query("SELECT * FROM prodotti WHERE nome LIKE '%$search%'", MYSQLI_USE_RESULT);
		        } else {
                    $result = $mysqli->query("SELECT * FROM prodotti", MYSQLI_USE_RESULT);
		        }

                $count = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($count % 5 === 0) {
                        echo "<tr>";
                    }

                    echo "<td>";
                    echo "<div class='product-item'>";
                    echo "<h3>" . "Id: " . $row['id_prodotto'] . "</h3>";
                    echo "<h4>" . $row['nome'] . "</h4>";
                    echo "<img src=\"images/prodotti/" . $row['nome'] . ".png\" alt=\"" . $row['nome'] . "\">";
                    echo "<p>" . $row['descrizione'] . "</p>";
                    echo "<p>" . "Prezzo: " . $row['prezzo'] . "€" . "</p>";
                    echo "<p>" . "Rimasti: " . $row['quantita'] . "</p>";
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
