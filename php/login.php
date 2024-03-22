<html>
<head>

    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>

        <?php 

                session_start();

                if(!isset($_POST["login"])){
                    

            ?>

    <div class="login-container">
        <h2>Portale Login</h2>
        
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
                    
            <input required type="text" name="username" placeholder="Username"><br><br>
            <input required type="password" name="password" placeholder="Password"><br><br>

            <input name="login" type="submit" value="Login">
        </form>
    </div>

        <?php 
        }else{
            try{
                $file=fopen("../db/utenti.csv", "r");

                while(!feof($file)){       //file-end-of-file
                    $riga=fgets($file);
                    $rigaSplit=explode("|", $riga);
                    
                    if(trim($rigaSplit[3])==$_POST["username"] and $rigaSplit[4]==$_POST["password"]){  //trim toglie spazi ad una stringa
                        $_SESSION["AUTENTICATO"]="ok";
                        $_SESSION["NOMINATIVO"]=$rigaSplit[2]." ".$rigaSplit[1];
                        header('Location: logged.php'); 
                    }else{
                        header('Location: login.php');
                    }

                                      
                }


            }catch(Exception $e){
            }
        }

    ?>


    </div>

</body>
</html>



