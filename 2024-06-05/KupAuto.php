<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1><i>Kup Auto!</i> Internetowy Komis Samochodowy</h1>
    </header>

    <main>
        <section id="one">
            <?php
                $db = mysqli_connect("localhost", "root", "", "kupauto");

                $k = "select model, rocznik, przebieg, paliwo, cena, zdjecie from samochody where id like 10;";
                $q = mysqli_query($db, $k);
                
                while ($row = mysqli_fetch_assoc($q)) {
                    echo "<img class='ig' src='pliki5/" . $row['zdjecie'] . "' alt='oferta dnia' />";
                    echo "<h4>Oferta Dnia: Toyota " . $row['model'] . "</h4>";
                    echo "<p>Rocznik: " . $row['rocznik'] . ", przebieg: " . $row['przebieg'] . ", rodzaj paliwa: " . $row['paliwo'] . "</p>";
                    echo "<h4>Cena: " . $row['cena'] . "</h4>";
                }
            ?>
        </section>

        <section id="two">
            <h2>Oferty Wyróżnione</h2>

            <?php
                $k2 = "select m.nazwa, s.model, s.cena, s.zdjecie from marki m inner join samochody s on m.id = s.marki_id where s.wyrozniony like 1 limit 4;";
                $q2 = mysqli_query($db, $k2);
                
                while ($row = mysqli_fetch_assoc($q2)) {
                    $img = $row['zdjecie'];
                    $model = $row['model'];
                    $marka = $row['marka'];

                    echo "<article>";
                    echo "<img src='pliki5/$img' alt='$model'>";
                    echo "<h4>$marka $model</h4>";
                    echo "<p>Rocznik: " . $row['rocznik'] . "</p>";
                    echo "<h4>Cena: " . $row['cena'] . "</h4>";
                    echo "</article>";
                }
            ?>
        </section>

        <section id="three">
            <h2>Wybierz markę</h2>

            <form method="post" action="KupAuto.php">
                <select name="nazwa" id="nazwa" required>
                    <?php

                        $k3 = "select nazwa from marki;";
                        $q3 = mysqli_query($db, $k3);

                        while ($row = mysqli_fetch_assoc($q3)) {
                            echo "<option>" . $row['nazwa'] . "</option>";
                        }
                    ?>
                </select>

                <button>Wyszukaj</button>

                
            </form>

            <?php

                    if (isset($_POST['nazwa'])) {

                        $k2 = "SELECT s.model, s.cena, s.zdjecie from samochody s join marki m on s.marki_id = m.id where m.nazwa like '" . $_POST['nazwa'] . "';";
                        $q2 = mysqli_query($db, $k2);

                        while ($row = mysqli_fetch_assoc($q2)) {
                            $img = $row['zdjecie'];
                            $model = $row['model'];
                            $marka = $row['marka'];
        
                            echo "<article>";
                            echo "<img src='pliki5/$img' alt='$model'>";
                            echo "<h4>$marka $model</h4>";
                            echo "<p>Rocznik: " . $row['rocznik'] . "</p>";
                            echo "<h4>Cena: " . $row['cena'] . "</h4>";
                            echo "</article>";
                        }
                    }

                    mysqli_close($db);
                ?>
        </section>
    </main>

    <footer>
        <p>Stronę wykonał: Filip Wrzosek</p>
        <a href="http://firmy.pl/komis">Znajdź nas także</a>
    </footer>
</body>
</html>