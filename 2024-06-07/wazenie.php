<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <div id="header1">
            <h1>Ważenie pojazdów we Wrocławiu</h1>
        </div>

        <div id="header2">
            <img src="pliki/obraz1.png" alt="waga">
        </div>
    </header>

    <main>
        <section id="left">
            <h2>Lokalizacje wag</h2>
            <ol>
                <?php
                    $db = mysqli_connect("localhost", "root", "", "wazenietirow");

                    $k1 = "select ulica from lokalizacje;";
                    $q1 = mysqli_query($db, $k1);

                    while ($row = mysqli_fetch_array($q1)) {
                        $name = $row['ulica'];
                        echo "<li>ulica $name</li>";
                    }
                ?>
            </ol>

            <h2>Kontakt</h2>
            <a href="mailto:wazenie@wroclaw.pl">napisz</a>
        </section>

        <section id="center">
            <h2>Alerty</h2>
            <table>
                <tr>
                    <th>rejestracja</th>
                    <th>ulica</th>
                    <th>waga</th>
                    <th>dzień</th>
                    <th>czas</th>
                </tr>

                <?php
                    $k2 = "select w.rejestracja, w.waga, w.dzien, w.czas, l.ulica from wagi w join lokalizacje l on w.lokalizacje_id = l.id where w.waga > 5;";
                    $q2 = mysqli_query($db, $k2);

                    while ($row = mysqli_fetch_array($q2)) {
                        $rejestracja = $row['rejestracja'];
                        $waga = $row['waga'];
                        $dzien = $row['dzien'];
                        $czas = $row['czas'];
                        $ulica = $row['ulica'];

                        echo "<tr>";
                        echo "<td>$rejestracja</td>";
                        echo "<td>$waga</td>";
                        echo "<td>$dzien</td>";
                        echo "<td>$czas</td>";
                        echo "<td>$ulica</td>";
                        echo "</tr>";
                    }
                ?>
            </table>

            <?php
                $k3 = "insert into wagi values (null, 5, floor(1 + rand() * 10), 'DW12345', curdate(), curtime());";
                $q3 = mysqli_query($db, $k3);
                
                header("refresh 10");

                mysqli_close($db);
            ?>
        </section>
            
        <section id="right">
            <img id="obraz2" src="pliki/obraz2.jpg" alt="tir">
        </section>
    </main>

    <footer>
        <p>Stronę wykonał: Filip Wrzosek</p>
    </footer>
</body>
</html>