

<html>
<head>
    <title>Sign-In</title>
    <link rel="stylesheet" type="text/css" href="../css/stile2.css">
</head>


<?php
if (isset($_POST["sign-in"])) {
    try {
        $connessione = mysqli_connect("localhost", "root", "root", "progettoinglese");

       
        $sql = "INSERT INTO utente (username, pwd, email, nome, cognome, nome_scuola, data_registrazione) VALUES (?, ?, ?, ?, ?, ?, NOW())";
        $stmt = mysqli_prepare($connessione, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssss", $_POST["username"], $_POST["password"], $_POST["email"], $_POST["name"], $_POST["surname"], $_POST["school_name"]);

            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        mysqli_close($connessione);
    } catch (Exception $e) {
        $msg = "ERRORE: " . $e->getMessage();
    }

    header("Location: registered.html");
    exit();
}

?>

<body>

<div class="login-container">
    <h2>Sign in</h2>
    <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
        <input required type="text" name="username" placeholder="Your username"><br><br>
        <input required type="email" name="email" placeholder="Your email"><br><br>
        <input required type="password" name="password" placeholder="Your password"><br><br>
        <input required type="text" name="name" placeholder="Your name"><br><br>
        <input required type="text" name="surname" placeholder="Your surname"><br><br>
        <input required type="text" name="school_name" placeholder="School name"><br><br>
        <input name="sign-in" type="submit" value="Sign In">
    </form>
</div>

</body>
</html>



    </div>

</body>
</html>



