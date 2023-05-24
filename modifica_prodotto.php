<!DOCTYPE html>
<html>
<head>
	<title>Outlet spaziale #42</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>    
        <h2>Outlet spaziale #42</h2>
    </header>

    <div id="container">

        <table id="product-table">
            <?php
		        ini_set('display_errors', 1);
		        ini_set('display_startup_errors', 1);
		        error_reporting(E_ALL);

                $mysqli = new mysqli('localhost', 'guest', 'guest');

		        $mysqli->select_db("Esercitazione");

		        if (!isset($_GET['id'])) {

                    echo "<td>";
                    echo "<div class='product-item'>";
                    echo "<h3> Nessun prodotto selezionato </h3>";
                    echo "<img src=\"images/deny.png\">";
                    echo "</div>";
                    echo "</td>";

                    exit();
		        }

		        $id = $_GET['id'];
		        $result = $mysqli->query("SELECT * FROM prodotti WHERE id_prodotto = $id", MYSQLI_USE_RESULT);

                $count = 0;
                while ($row = mysqli_fetch_assoc($result)) {

                    if ($count % 5 === 0) {
                        echo "<tr>";
                    }

                    echo "<td>";
                    echo "<div class='product-item'>";
                    echo "<h3>" . $row['nome'] . "</h3>";
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
