<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Verfica Pacient</title>
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
        .container {
            width: 300px;
            margin: 0 auto;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

<div class="container">
   <form method="post" action="verificaIdP.php">
        <input type="text" id="idPacient" name="idPacient" placeholder="ID Pacient"><br>
        <input type="submit" value="Verifica">
        </form>
</div>
</body>
</html>
