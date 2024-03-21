<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Multidimensional Array</h2>
    <table>
        <tr>
            <th>Judul Film</th>
            <th>Tahun</th>
            <th>Rating</th>
        </tr>
        <?php
        $movie = array(
            array("Avengers: Infinity War", 2018, 8.1),
            array("The Avengers", 2012, 8.1),
            array("Guardians of the Galaxy", 2014, 8.0),
            array("Iron Man", 2008, 7.9)
        );
        
        foreach ($movie as $film) {
            echo "<tr>";
            echo "<td>" . $film[0] . "</td>";
            echo "<td>" . $film[1] . "</td>";
            echo "<td>" . $film[2] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
