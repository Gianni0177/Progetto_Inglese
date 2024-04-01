<?php

session_start();

if(isset($_SESSION["AUTENTICATO"]) and $_SESSION["AUTENTICATO"]=="ok"){
                    
    header("Location: ../index.php");
    
}

if (isset($_POST["login"])) {
    try {
        $connessione = mysqli_connect("localhost", "root", "root", "progettoinglese");

        // Prevenzione SQL injection
        $username = mysqli_real_escape_string($connessione, $_POST["username"]);
        $password = mysqli_real_escape_string($connessione, $_POST["password"]);

        // Query SQL per il login
        $sql = "SELECT * FROM utente WHERE username='$username' AND pwd='$password'";
        $risultato = $connessione->query($sql);

        if ($risultato && $risultato->num_rows > 0) {
            // Utente trovato, imposto le variabili di sessione
            $_SESSION["AUTENTICATO"] = "ok";
            $_SESSION["USER"] = $username;

            $connessione->close();

            header('Location: ../index.php');
            exit();
        } else {
            // Utente non trovato, reindirizzo alla pagina di login
            header('Location: login.php');
            exit();
        }
    } catch (Exception $e) {
        // Gestione eccezioni
    }
}

?>

<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="../css/stile2.css">
</head>
<body>

<div class="login-container">
    <h2>Portale Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input required type="text" name="username" placeholder="Username"><br><br>
        <input required type="password" name="password" placeholder="Password"><br><br>
        <input name="login" type="submit" value="Login">
    </form>
</div>

</body>
</html>
