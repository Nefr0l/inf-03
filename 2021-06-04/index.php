<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h3>Portal Społecznościowy - panel administratora</h3>
    </header>

    <main>
        <h4>Użytkownicy</h4>
        <?php
            $db = mysqli_connect("localhost", "root", "", "dane4");

            $k1 = "select id, imie, nazwisko, rok_urodzenia, zdjecie from osoby limit 30;";
            $q1 = mysqli_query($db, $k1);

            while ($row = mysqli_fetch_assoc($q1)) {
                $id = $row['id'];
                $name = $row['imie'];
                $surname = $row['nazwisko'];

                $year = $row['rok_urodzenia'];
                $age = 2025 - $year;

                echo "<p>$id. $name $surname, $age lat</p>";
            }
        ?>
        <a href="settings.html">Inne ustawienia</a>
    </main>

    <aside>
        <h4>Podaj id użytkownika</h4>
        <form action="index.php" method="post">
            <input type="number" id='id' name="id">
            <button type="submit">ZOBACZ</button>
        </form>

        <hr>

        <?php
            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                $k2 = "select u.imie, u.nazwisko, u.rok_urodzenia, u.opis, u.zdjecie, h.nazwa from osoby u join hobby h on u.Hobby_id = h.id where u.id = $id;";
                $q2 = mysqli_query($db, $k2);

                while ($row = mysqli_fetch_assoc($q2)) {
                    $name = $row['imie'];
                    $surname = $row['nazwisko'];
                    $year = $row['rok_urodzenia'];
                    $description = $row['opis'];
                    $image = $row['zdjecie'];
                    $hobby = $row['nazwa'];
    
                    echo "<h2>$id. $name $surname lat</h2>";
                    echo "<img src='zad4/$image' alt='$id'>";
                    echo "<p>$year</p>";
                    echo "<p>$description</p>";
                    echo "<p>$hobby</p>";

                }
            }
        ?>
    </aside>

    <footer>
        <p>Stronę wykonał: Filip Wrzosek</p>
    </footer>
</body>
</html>