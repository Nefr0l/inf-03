<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <img id="motor" src="motor.png" alt="motocykl">

    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>

    <main>
        <section class="left">
            <h2>Gdzie pojechać?</h2>
            
            <dl>
                <?php
                    $k = "select w.nazwa, w.opis, w.poczatek, z.zrodlo from wycieczki w join zdjecia z on w.zdjecia_id = z.id;";

                    $db = mysqli_connect("localhost", "root", "", "motory");

                    $query = mysqli_query($db, $k);
                    while($row = mysqli_fetch_assoc($query)) {
                        echo "<dt>" . $row['nazwa'] . ", rozpoczyna się w " . $row['poczatek'] . ", <a href='". $row['zrodlo'] .".jpg'>zobacz zdjęcie</a></dt>";
                        echo "<dd>" . $row['opis'] . "</dd>";
                    }

                ?>

                <dt>fdsfsd</dt>
                <dd>fdsfsdffgsgfsd</dd>
            </dl>
        </section>

        <section class="right">
            <h2>Co kupić?</h2>
            <ul>
                <li>Honda CBR125R</li>
                <li>Yamaha YBR125</li>
                <li>Honda VFR800i</li>
                <li>Honda CBR1100XX</li>
                <li>BMW R1200GS LC</li>
            </ul>
        </section>

        <section class="right">
            <h2>Statystyki</h2>
            <p>Wpisanych wycieczek: <?php 
            $k = "select count(id) as ilosc from wycieczki;";
            $q = mysqli_query($db, $k);
            $row = mysqli_fetch_array($q);

            echo $row['ilosc'];

            mysqli_close($db);
            ?></p>
            <p>Użytkowników forum: 200</p>
            <p>Przesłanych zdjęć: 1300</p>
        </section>
    </main>

    <footer>
        <p>Stronę wykonał: 123</p>
    </footer>
</body>
</html>