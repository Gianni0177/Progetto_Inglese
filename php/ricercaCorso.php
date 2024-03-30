<!-- VISUALIZZA TUTTI I CORSI PER MATERIA E GRADO -->
<?php

session_start();
    //if($_SESSION["AUTENTICATO"]=="ok"){
    

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu a tendina</title>
</head>
<body>
    <h2>Seleziona la materia e il grado del corso:</h2>
    <form action="ricercaCorso.php" method="post">
        <label for="materia">Materia:</label>
        <select id="materia" name="materia">
            <option value="IT Technology">IT Technology</option>
            <option value="Scienze">Scienze</option>
            <option value="Storia">Storia</option>
            <option value="Italiano">Italiano</option>
            <!-- Aggiungi altre materie qui -->
        </select><br><br>
        
        <label for="grado">Grado:</label>
        <select id="grado" name="grado">
            <option value="1nd grade secondary">1nd grade secondary</option>
            <option value="2nd grade secondary">2nd grade secondary</option>
            <!-- Aggiungi altri gradi qui -->
        </select><br><br>
        
        <input type="submit" value="invia">
    </form>

    <h1>Risultati</h1>
        <?php 
        if(isset($_POST["materia"]) and isset($_POST["grado"])){
        
            try {
                $connessione = mysqli_connect("localhost", "root", "root", "progettoinglese");
        
                $materia=$_POST["materia"];
                $grado=$_POST["grado"];
                
                //print_r([$_POST]);
                // Query SQL per il login
                $sql = "SELECT * FROM lista_corsi WHERE materia='$materia' AND grado='$grado'";
                $risultato = $connessione->query($sql);
        
                if ($risultato && $risultato->num_rows > 0) {
                    while ($array = mysqli_fetch_assoc($risultato)) {
                        echo $array["nome"]." ".$array["materia"]." ".$array["grado"]."<br>";
                    }
        
                    $connessione->close();
    
                    exit();
                }
            } catch (Exception $e) {
                // Gestione eccezioni
            }
        }
        
        ?>

</body>
</html>

<?php 

    /*}else{
        header("Location: ../index.html");
    }*/

?>
