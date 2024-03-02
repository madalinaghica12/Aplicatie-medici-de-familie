<?php
// Verificăm dacă datele au fost trimise prin formular
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prelucrăm și salvăm datele trimise
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];

    // Conectare la baza de date - exemplu folosind PDO
    $host = 'localhost';
    $username = 'mada';
    $password = 'mgm120330';
    $nume_baza_date = 'aa';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$nume_baza_date", $username, $password);
        // Setăm modul de eroare PDO la excepție
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL pentru inserarea datelor într-o tabelă
        $sql = "INSERT INTO test (nume, prenume) VALUES ('$nume', '$prenume')";
        
        // Folosim exec() pentru a executa interogarea SQL
        $conn->exec($sql);

        echo "Datele au fost inserate cu succes în baza de date.";
    } catch(PDOException $e) {
        echo "Eroare: " . $e->getMessage();
    }

    // Închidem conexiunea cu baza de date
    $conn = null;
}
?>