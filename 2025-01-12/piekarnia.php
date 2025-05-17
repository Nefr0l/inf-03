<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIEKARNIA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <img src="wypieki.png" alt="Produkty naszej piekarni">

    <nav>
        <a href="kw1.png">KWERENDA 1</a>
        <a href="kw2.png">KWERENDA 2</a>
        <a href="kw3.png">KWERENDA 3</a>
        <a href="kw4.png">KWERENDA 4</a>
    </nav>

    <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i 
            zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
    </header>

    <main>
        <h4>Wybierz rodzaj wypieków:</h4>
        <form action="piekarnia.php" method="post">
            <select name="rodzaj">
                <!-- skrypt 1 -->
                 <?php
                    $db = mysqli_connect("localhost", "root", "", "piekarnia");

                    $k1 = "select DISTINCT rodzaj from wyroby order by rodzaj desc;";
                    $q1 = mysqli_query($db, $k1);

                    while ($row = mysqli_fetch_assoc($q1)) {
                        echo "<option>" . $row['rodzaj'] . "</option>";
                    }
                 ?>
            </select>

            <button>Wybierz</button>
        </form>

        <table>
            <tr>
                <th>Rodzaj</th>
                <th>Nazwa</th>
                <th>Gramatura</th>
                <th>Cena</th>
            </tr>

            <!-- skrypt 2 -->

            <?php
                if (isset($_POST['rodzaj'])) {
                    $k2 = "select rodzaj, nazwa, Gramatura, Cena from wyroby where Rodzaj like '" . $_POST['rodzaj'] . "';";
                    $q2 = mysqli_query($db, $k2);

                    while ($row2 = mysqli_fetch_assoc($q2)) {
                        echo "<tr>";
                        echo "<td>" . $row2['rodzaj'] . "</td>";
                        echo "<td>" . $row2['nazwa'] . "</td>";
                        echo "<td>" . $row2['Gramatura'] . "</td>";
                        echo "<td>" . $row2['Cena'] . "</td>";
                        echo "</tr>";
                    }
                }

                mysqli_close($db);
            ?>
        </table>
    </main>

    <footer>
        <p>AUTOR: Filip Wrzosek</p>
        <p>Data: 10 maj 2025</p>
    </footer>
</body>
</html>