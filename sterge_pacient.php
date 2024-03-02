<?php
// Verificăm dacă datele au fost trimise prin formular
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prelucrăm și salvăm datele trimise
    $idPacient = $_POST['idPacient'];

    // Conectare la baza de date - exemplu folosind PDO
    $host = 'localhost';
    $username = 'mada';
    $password = 'mgm120330';
    $dbname = 'proiectis';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Setăm modul de eroare PDO la excepție
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL pentru a verifica existența pacientului în tabelul listapacienti
        $sql = "DELETE FROM lista_pacienti WHERE idPacient = :idPacient";
        
        // Preparam și executăm interogarea folosind parametri pentru a preveni SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idPacient', $idPacient);
        $stmt->execute();

        // Obținem rezultatele
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        echo "Eroare: " . $e->getMessage();
    }

    // Închidem conexiunea cu baza de date
    $conn = null;
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        /* Stiluri CSS pentru pagina medicului */
        body {
            background-image: url('img3.png'); 
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
</html>
