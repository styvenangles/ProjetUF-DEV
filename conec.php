<?php
require("bdd.php");
?>

<html>
<head>
    <title>Choix plante</title>
</head>
<body>
        <label for="user">Choisissez une plante:</label>

        <select name="user" form="connexion">
            <option value="">--Selectionnez une option--</option>
            <?php
                $sql = "SELECT * FROM plante";
                foreach($pdo->query($sql) as $row) {
                    echo("<option value='".$row["nom_plante"]."'>".$row["nom_plante"]."</option>");
                }
            ?>
        </select>
        <br><br>
        <form action="rajoutplante.php" method="post" id="connexion">
        <input type="submit">
    </form>
    <style>
        input[type=submit] {
            background-color: #1255a2;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
          }

          input[type=submit]:hover {
            background-color: #1872D9;
          }
        </style>
</body>
</html>