<?php
session_start();

if (isset($_POST["login"])) {
    try {
        $connessione = mysqli_connect("localhost", "root", "root", "progettoinglese");

        $sql = "SELECT * FROM utente WHERE username=$_POST[username] AND pwd='$_POST[password];";
        $risultato=$connessione->query($sql);
        //$risultato = mysqli_query($connessione, $sql);
        
        if ($risultato && mysqli_num_rows($risultato) > 0) {
            
            $_SESSION["AUTENTICATO"] = "ok";
            $_SESSION["USER"] = $_POST["username"];

           $connessione->close();

            header('Location: areariservata.php');
            exit();
        } else {
            
            header('Location: login.php');
            exit();
        }
    } catch (Exception $e) {
       
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
