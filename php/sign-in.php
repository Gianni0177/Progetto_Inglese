<html>
<head>

    <title>Sign-In</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>

        <?php               
                
                if(!isset($_POST["login"])){

            ?>

    <div class="login-container">
        <h2>Sign in</h2>
        
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
            
            <input required type="text" name="name" placeholder="Your name"><br><br>
            <input required type="text" name="surname" placeholder="Your surname"><br><br>
            <input required type="text" name="username" placeholder="Username"><br><br>
            <input required type="password" name="password" placeholder="Password"><br><br>

            <input name="login" type="submit" value="Sign In">
        </form>
    </div>

        <?php 
        }else{
            try{
                $file=fopen("../db/utenti.csv", "a+");

                $exist=false;
                $id=-1;

                while(!feof($file)){       //file-end-of-file
                    $riga=fgets($file);
                    $rigaSplit=explode("|", $riga);
                    
                    if(trim($rigaSplit[3])==$_POST["username"] and $rigaSplit[4]==$_POST["password"]){ 
                        $exist=true; 
                        break;
                    }                    
                }

                $id=$rigaSplit[0];

                    if($exist==true){
                        header('Location: already-exist.html');
                    }else{
                        echo "Scrittura";
                        
                        $user=((intval($id)+1)."|".$_POST["name"]."|".$_POST["surname"]."|".$_POST["username"]."|".$_POST["password"]);
                        fwrite($file, "\r\n".$user);
                    }


            }catch(Exception $e){
                $msg="ERRORE: ".$e->getMessage();   
            }

            if(!empty($msg)){
                echo $msg;
            }

        }

    ?>


    </div>

</body>
</html>



