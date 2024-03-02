<!DOCTYPE html>
<html>
<head>
    <title>Afișare tabel din PHPMyAdmin în HTML</title>
    <style>
        /* Stiluri CSS pentru pagina medicului */
        body {
            background-image: url('img2.png'); 
	        background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
        }
    </style>
</head>
<body>

<?php
// Conectare la baza de date
$host = 'localhost';
$username = 'mada';
$password = 'mgm120330';
$dbname = 'proiectis';

// Creează conexiunea
$conn = new mysqli($host, $username, $password, $dbname);

// Verifică conexiunea
if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

// Interogare pentru a prelua datele din tabel
$sql = "SELECT * FROM lista_medici";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afisează datele sub forma unui tabel HTML
    echo "<table border='1'>
    <tr>
    <th>Id Medic</th>
    <th>Nume Medic</th>
    <th>Prenume Medic</th>
    <th>Specializare</th>
    </tr>";

    // Iesire date din fiecare rând
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['idMedic'] . "</td>";
        echo "<td>" . $row['numeMedic'] . "</td>";
        echo "<td>" . $row['prenumeMedic'] . "</td>";
        echo "<td>" . $row['specializare'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 rezultate";
}

// Închide conexiunea
$conn->close();
?>

</body>
</html>
