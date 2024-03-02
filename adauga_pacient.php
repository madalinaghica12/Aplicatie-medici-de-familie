<?php
// Verificăm dacă datele au fost trimise prin formular
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prelucrăm și salvăm datele trimise
    $idPacient = $_POST['idPacient'];
    $numePacient = $_POST['numePacient'];
    $prenumePacient = $_POST['prenumePacient'];
    $boala = $_POST['boala'];
    $pretTratament = $_POST['pretTratament'];
    $tratament = $_POST['tratament'];
    $investigatiiClinice = $_POST['investigatiiClinice'];
    $investigatiiParaclinice = $_POST['investigatiiParaclinice'];
    

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
        $sql  ="INSERT INTO lista_pacienti (idPacient, numePacient, prenumePacient, boala, pretTratament, tratament, investigatiiClinice, investigatiiParaclinice)
        VALUES ('$idPacient', '$numePacient', '$prenumePacient', '$boala', '$pretTratament', '$tratament', '$investigatiiClinice', '$investigatiiParaclinice')";
        
        // Folosim exec() pentru a executa interogarea SQL
        $conn->exec($sql);

    } catch(PDOException $e) {
        echo "Eroare: " . $e->getMessage();
    }

    // Închidem conexiunea cu baza de date
    $conn = null;
}
?>