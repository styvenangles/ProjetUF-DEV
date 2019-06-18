<?php
session_start();
require("bdd.php");
if(isset($_GET["plantname"]) && isset($_GET["temp"]) && isset($_GET["hum"])){
    try{
        $sql = $pdo->prepare("INSERT INTO plante(`nom_plante`, `temperature_optimale`, `humidite_optimale`) VALUE (:nomplante, :temperature, :humidite)");
        $sql->execute(array(':nomplante' => $_GET["plantname"], ':temperature' => $_GET["temp"], ':humidite' => $_GET["hum"]));
    } catch (PDOException $e){
        echo $e->getCode() . "<br/>";
        echo $e->getMessage() . "<br/>";
    }
 
}
if(!isset($_SESSION["user"])) {
    if (!isset($_POST["user"])) {
        //header("location:index.php");
    }
}
 
if(isset($_POST["user"])){
    $_SESSION["user"] = $_POST["user"];
}
?>
<html>
    <head>
 
    </head>
    <body>
    <h1>Votre plante:</h1>
        <?php
        $sql = "SELECT * FROM plante WHERE nom_plante='".$_SESSION["user"]."'";
        foreach ($pdo->query($sql) as $row) {
            echo "<h3>" . "Votre " . $row["nom_plante"] . "</h3>";
            echo "<h6>" . "Possède des conditions optimales lorsque la température ambiante est de " . $row["temperature_optimale"] . "°C" . "</h6>";
            echo "<p>" . "Et que l'humidité du sol utilisable est de ". $row["humidite_optimale"] . "</p>";
            echo "<hr color=\"#1255a2\">";
        }
        ?>

        <h1>Ajouter une plante:</h1>
        <form action="rajoutplante.php" method="get" id="msg">
 
            <input type="text" id="plantname" name="plantname" placeholder="Nom de la plante">
            <input type="text" id="temp" name="temp" placeholder="Sa température optimale">
            <input type="text" id="hum" name="hum" placeholder="L'humidité optimale du sol">
            <input type="submit">
        </form>
        <hr color='#1255a2'>          
        
        <h1>Retour au choix des plantes</h1>
        <form action="conec.php" method="post" id="return">
            <input type="submit">
        </form>

        <style>
          body {
            font-family: Arial, Helvetica, sans-serif;
            padding: 0px;
          }

          textarea, input[type=destinataire] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            margin-right: 0px;
            margin-left: 0px;
            resize: vertical;
          }

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

          h1 {
            color: #1255a2;
            width: 100%;
          }
          </style>
    </body>
</html>