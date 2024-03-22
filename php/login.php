<html>
<head>

    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>

        <?php 

                $msg=""; //variabile glob
                session_start();

                if(!isset($_POST["login"])){
                    

            ?>

    <div class="login-container">
        <h2>Portale Login</h2>
        
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
                    
            <input required type="text" name="username" placeholder="Nome utente"><br><br>
            <input required type="password" name="password" placeholder="Password"><br><br>

            <input name="login" type="submit" value="Login">
        </form>
    </div>

        <?php 
        }else{
            echo "Gestione autenticazione<br>";

            try{
                $file=fopen("../db/utenti.csv", "r");

                while(!feof($file)){       //file-end-of-file
                    $riga=fgets($file);
                    $rigaSplit=explode("|", $riga);
                    
                    if(trim($rigaSplit[1])==$_POST["username"] and $rigaSplit[2]==$_POST["password"]){  //trim toglie spazi ad una stringa
                        $_SESSION["AUTENTICATO"]="ok";
                        $_SESSION["NOMINATIVO"]=$rigaSplit[4]." ".$rigaSplit[3];
                        header('Location: logged.php'); 
                    }else{
                        
                    }

                    //print_r($rigaSplit);
                                      
                }


            }catch(Exception $e){
                $msg="ERRORE: ".$e->getMessage();   //recupero metodo di $e
            }

            if(!empty($msg)){
                echo $msg;
            }

        }

    ?>


    </div>

</body>
</html>



