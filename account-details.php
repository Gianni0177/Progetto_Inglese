<?php

$array;

session_start();

    if(!$_SESSION["AUTENTICATO"]=="ok"){
        header("Location: php/login.php");
    }else{

    

    //print_r($_SESSION);
    try {
        //recupero l'user e i dati del db corrispondenti
        $connessione = mysqli_connect("localhost", "root", "root", "progettoinglese");

        $username=$_SESSION["USER"];
        
        $sql="SELECT * FROM utente WHERE username='$username'";
        
        $risultato=$connessione->query($sql);
        $array=mysqli_fetch_assoc($risultato);
        //print_r($array);


        
        
    } catch (Exception $e) {
        // Gestione eccezioni
    }



?>

<html>
<head>
    <title>EduStream - Settings</title>
    <link rel="stylesheet" type="text/css" href="../css/stile2.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function redirectAccount(){
            var url="../index.php";
            window.location.href = url; 
        }
    </script>

</head>
<body>

<div class="login-container">
    <h2>Your account informations</h2>
        Name: <?php echo $array["nome"]?><br><br>
        Surname: <?php echo $array["cognome"]?><br><br>
        Username: <?php echo $array["username"]?><br><br>
        Email: <?php echo $array["email"]?><br><br>
        Your school name: <?php echo $array["nome_scuola"]?><br><br>
        Role: <?php echo $array["ruolo"]?><br><br>
        Last modify: <?php echo $array["data_registrazione"]?><br><br><br><br>
        
    <button style="background-color:red" type="submit" name="redirectAccount" onclick="redirectAccount();">Or return to the homepage</button>
</div>

</body>
</html>
<?php 
    $connessione->close();    
    }
?>