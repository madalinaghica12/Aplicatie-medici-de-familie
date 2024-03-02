<?php
// Verificăm dacă datele au fost trimise prin formular
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prelucrăm și salvăm datele trimise
    $idProgramare = $_POST['idProgramare'];
    $idPacient = $_POST['idPacient'];
    $idMedic = $_POST['idMedic'];
    $ora = $_POST['ora'];
    $data = $_POST['data'];
    
    // Conectare la baza de date - exemplu folosind PDO
    $host = 'localhost';
    $username = 'mada';
    $password = 'mgm120330';
    $dbname = 'proiectis';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Setăm modul de eroare PDO la excepție
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL pentru inserarea datelor într-o tabelă
        $sql  ="INSERT INTO lista_programari (idProgramare, idPacient, idMedic, ora, data)
        VALUES ('$idProgramare', '$idPacient', '$idMedic', '$ora', '$data')";
        
        // Folosim exec() pentru a executa interogarea SQL
        $conn->exec($sql);

    } catch(PDOException $e) {
        echo "Eroare: " . $e->getMessage();
    }

    // Închidem conexiunea cu baza de date
    $conn = null;
}
?>