<!DOCTYPE html>
<html>
<head>
    <title>Dodaj recept</title>
</head>
<body>
    <h1>Dodaj recept</h1>

    <form action="dodaj_recept.php" method="POST">
        <label for="naziv">Naziv:</label>
        <input type="text" name="naziv" id="naziv" required>

        <label for="sastojci">Sastojci:</label>
        <textarea name="sastojci" id="sastojci" required></textarea>

        <label for="upute">Upute:</label>
        <textarea name="upute" id="upute" required></textarea>

        <label for="kategorija">Kategorija:</label>
        <input type="text" name="kategorija" id="kategorija" required>

        <input type="submit" value="Dodaj recept">
    </form>

    <h2>Prethodno dodani recepti:</h2>
    <div id="prethodni-recepti">
        <?php
        // Provjerava postoji li XML datoteka s receptima
        if (file_exists('recepti.xml')) {
            $xml = simplexml_load_file('recepti.xml');
            foreach ($xml->recept as $recept) {
                $naziv = $recept->naziv;
                $sastojci = $recept->sastojci;
                $upute = $recept->upute;
                $kategorija = $recept->kategorija;

                echo "<div class='recept'>";
                echo "<h3>$naziv</h3>";
                echo "<p><strong>Sastojci:</strong> $sastojci</p>";
                echo "<p><strong>Upute:</strong> $upute</p>";
                echo "<p><strong>Kategorija:</strong> $kategorija</p>";
                echo "</div>";
            }
        } else {
            echo "Nema prethodno dodanih recepata.";
        }
        ?>
    </div>
</body>
</html>