<?php 
session_start();
if(!$_SESSION["AUTENTICATO"]=="ok"){
    header("Location: php/login.php");

    

}

    //ISCRIZIONE AI CORSI

    if(isset($_GET["corso"])){

        $already_sub="no";
        
        /*echo "<script>console.log('Corso trovato: $_GET[corso]');</script>";
        echo "<script>console.log('USER: $_SESSION[USER]');</script>";
        echo "<script>console.log('ALREADY SUB: $already_sub');</script>";*/
        
        try {
            $connessione = mysqli_connect("localhost", "root", "root", "progettoinglese");
            
            $sql = "SELECT * FROM corso_utente WHERE nome_corso='$_GET[corso]' AND username_utente='$_SESSION[USER]';";
            
            $risultato = $connessione->query($sql);

            if ($risultato && $risultato->num_rows > 0) {
                while ($array = mysqli_fetch_assoc($risultato)) {
                    
                    echo "<script>console.log('Corso trovato nel DB: " .$array["username_utente"]." ".$array["nome_corso"]." ".$array["n_progressivo"]. "' );</script>";
                        if($_SESSION["USER"]==$array["username_utente"] and $_GET["corso"]==$array["nome_corso"]){
                            $already_sub="yes";
                        }
                }
            }

                if($already_sub=="yes"){
                    $connessione->close();
                    header("Location: already-subscribed.html");
                    exit();
                }
                
                if($already_sub=="no"){
                    //iscrizione mediante DB
                    $sql = "INSERT INTO corso_utente (username_utente, nome_corso) VALUES (?, ?)";
                    $stmt = mysqli_prepare($connessione, $sql);

                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "ss", $_SESSION["USER"], $_GET["corso"]);

                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                        $connessione->close();
                        header("Location: correctly-subscribed.html");
                        exit();
                    }
                }

                exit();
            
        } catch (Exception $e) {
            // Gestione eccezioni
        }

    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="icon" href="img/logov2.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/funzioni.js"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0"/>

    <script>
       
        function iscrizione(corso){
            var url="index.php?corso="+corso;   //mi passo il corso con il get nell'url
            window.location.href = url;         //ricarico per aggiornare l'url
        }

        function ricercaCorsoPerMateria(materia){
            var url="index.php?materia="+materia;   
            window.location.href = url;         
        }

        function ricercaCorsoPerGrado(grado){
            var url="index.php?grado="+grado;   
            window.location.href = url;
        }

    </script>

    <title>EduStream - Home</title>
</head>
<body>
 
    <!-- Per cambiare le icone vai su https://boxicons.com e prendi la sezione FONT -->

<button class="burger" onclick="toggleMenu()">
      <i class="fa-solid fa-bars"></i>
      <i class="fa-solid fa-close"></i>
    </button>
    <aside class="aside">
        <br><br><br><br><br><br><br><br><br>
        
        <ul>
            <li><a href="areaRiservata.php"><i class='bx bxs-user-badge'></i> reserved area</a></li>
            <li><a href="php/sign-in.php"><i class='bx bxs-log-in'></i> sign in</a></li>
            <li><a href="termsOfUse.html"><i class='bx bx-user'></i> terms of use</a></li>
            <li><a href="credits.html"><i class='bx bxl-creative-commons'></i> credit</a></li>
            <li><a href="whoweare.html"><i class='bx bx-group' ></i> who we are</a></li>
            <li><a href="whatwedo.html"><i class='bx bx-briefcase'></i> what we do</a></li>
            <li><a href="help.html"><i class='bx bx-help-circle' ></i> help</a></li>
            <li><a href="contacts.html"><i class='bx bxs-contact'></i> contact</a></li>
        </ul>
    </aside>


<!-- Barra di Navigazione -->
<nav class="navbar">
        <div class="logo">
          <img src="img/logoV2.png" />
          <h2>EduStream - Home</h2>
        </div>
        <div class="links">
          <!--<a href="#">TEXT</a>
          <a href="#">TEXT</a>-->
          <div class="dropdown">
            <a href="#">
              <div class="pfp">
                <img src="img/Default_pfp.jpg"/> 
              </div>
              Account
              <img src="img/chevron.png"/>
            </a>
            <div class="menu">
              <a href="php/account-details.php"> Account details </a>
              <a href="#"> Settings </a>
              <a href="php/logout.php" class="login-link"> logout </a>
            </div>
          </div>
        </div>
      </nav>


<div class="space"></div>

<!-- SearchBar -->

<div class="wrapper">
    <form action="index.php" method="post">
        <div id="search-container">
            <input name="ricercaBarra" type="search" id="ricercaBarra" placeholder="Search here.."/>
            <button name="invio" type="submit" id="search" onclick="">Search</button>
        </div>
    </form>
</div>
<div class="wrapper">
        <!--Dropdown-->
        <div id="buttons">
            <div class="links">
                <div class="dropdownSB">
                    <a href="#">Subject
                        <img src="img/chevron.png" />
                    </a>
                    <div class="menuSB">
                        <a name="English" href="#" onclick="ricercaCorsoPerMateria(name);"> English </a>
                        <a name="IT Technology" href="#" onclick="ricercaCorsoPerMateria(name);"> IT Technology </a>
                        <a name="Science" href="#" onclick="ricercaCorsoPerMateria(name);"> Science </a>
                        <a name="Phisics" href="#" onclick="ricercaCorsoPerMateria(name);"> Phisics </a>
                        <a name="Mathematics" href="#" onclick="ricercaCorsoPerMateria(name);"> Mathematics </a>
                        <a name="Network" href="#" onclick="ricercaCorsoPerMateria(name);"> Networks </a>
                        <a name="History" href="#" onclick="ricercaCorsoPerMateria(name);"> History </a>
                        <a name="Litherature" href="#" onclick="ricercaCorsoPerMateria(name);"> Litherature </a>
                    </div>
                </div>

                <div class="pad"></div>

                <div class="dropdownSB">
                    <a href="#">Qualification
                        <img src="img/chevron.png" />
                    </a>
                    <div class="menuSB">
                        <a name="High school diploma" href="#" onclick="ricercaCorsoPerGrado(name);"> High school diploma </a>
                        <a name="Master's degree" href="#" onclick="ricercaCorsoPerGrado(name);"> Master's degree </a>
                        <a name="Doctor of Philosophy" href="#" onclick="ricercaCorsoPerGrado(name);"> Doctor of Philosophy </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<div class="space2"></div>
    
<!-- Corsi --> 
    <?php 
        //Ricerca corsi nella stessa pagina con searchbar
        if(isset($_POST["ricercaBarra"]) and $_POST["ricercaBarra"]!="" and isset($_POST["invio"])){
            //print_r($_POST);

            try {
                $connessione = mysqli_connect("localhost", "root", "root", "progettoinglese");
        
                $nomeCorso=$_POST["ricercaBarra"];
                
                $sql = "SELECT * FROM lista_corsi WHERE nome='$nomeCorso'";
                $risultato = $connessione->query($sql);
        
                if ($risultato && $risultato->num_rows > 0) {
                    while ($array = mysqli_fetch_assoc($risultato)) {
                        //stampo se trovo
                        ?>
                        <div class="container">  
                            <div class="card">
                                <img src="img/example_English1.jpg" />
                                <div class="testoCorsi">
                                    <h2><?php echo $array["nome"]?></h2>
                                    <h3><?php echo $array["materia"]." - ".$array["grado"]?></h3>
                                    <p>
                                    <?php echo $array["autore"]." - ".$array["data_inizio"]?>
                                    </p>
                                    <button type="submit" name="<?php echo $array["nome"]?>" onclick="iscrizione(name);">Follow - <?php echo $array["costo"];?>€</button>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    
                }else{
                    ?>
                        <div>
                            <h2 style="color:white;">The course you searched for is not present in the system</h2>
                        </div>
                    <?php
                }


                $connessione->close();
                exit();

            } catch (Exception $e) {
                // Gestione eccezioni
            }

            //ricerca per materia
        }else if(isset($_GET["materia"])){
        try {
            $connessione = mysqli_connect("localhost", "root", "root", "progettoinglese");

            $materia=$_GET["materia"];
            
            $sql = "SELECT * FROM lista_corsi WHERE materia='$materia'";
            $risultato = $connessione->query($sql);
    
            if ($risultato && $risultato->num_rows > 0) {
                while ($array = mysqli_fetch_assoc($risultato)) {
                    //stampo se trovo
                    ?>
                    <div class="container">  
                        <div class="card">
                            <img src="img/example_English1.jpg" />
                            <div class="testoCorsi">
                                <h2><?php echo $array["nome"]?></h2>
                                <h3><?php echo $array["materia"]." - ".$array["grado"]?></h3>
                                <p>
                                <?php echo $array["autore"]." - ".$array["data_inizio"]?>
                                </p>
                                <button type="submit" name="<?php echo $array["nome"]?>" onclick="iscrizione(name);">Follow - <?php echo $array["costo"];?>€</button>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                
            }else {
                ?>
                    <div>
                        <h2 style="color:white;">There aren't courses of <?php echo $materia?></h2>
                    </div>
                <?php
            }


            $connessione->close();
            exit();

        } catch (Exception $e) {
            // Gestione eccezioni
        }
    }else if(isset($_GET["grado"])){
        try {
            $connessione = mysqli_connect("localhost", "root", "root", "progettoinglese");

            $grado=$_GET["grado"];
            
            $sql = "SELECT * FROM lista_corsi WHERE grado='$grado'";
            $risultato = $connessione->query($sql);
    
            if ($risultato && $risultato->num_rows > 0) {
                while ($array = mysqli_fetch_assoc($risultato)) {
                    //stampo se trovo
                    ?>
                    <div class="container">  
                        <div class="card">
                            <img src="img/example_English1.jpg" />
                            <div class="testoCorsi">
                                <h2><?php echo $array["nome"]?></h2>
                                <h3><?php echo $array["materia"]." - ".$array["grado"]?></h3>
                                <p>
                                <?php echo $array["autore"]." - ".$array["data_inizio"]?>
                                </p>
                                <button type="submit" name="<?php echo $array["nome"]?>" onclick="iscrizione(name);">Follow</button>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                
            }else {
                ?>
                    <div>
                        <h2 style="color:white;">There aren't courses of <?php echo $grado?></h2>
                    </div>
                <?php
            }


            $connessione->close();
            exit();

        } catch (Exception $e) {
            // Gestione eccezioni
        }        
    }else{
            //NESSUNA RICERCA / PRIMA APERTURA, STAMPO TUTTA LA PAGINA
        try {
            $connessione = mysqli_connect("localhost", "root", "root", "progettoinglese");

            $sql = "SELECT * FROM lista_corsi";
            $risultato = $connessione->query($sql);
    
            if ($risultato && $risultato->num_rows > 0) {
                while ($array = mysqli_fetch_assoc($risultato)) {
                    //stampo se trovo
                    ?>
                    <div class="container">  
                        <div class="card">
                            <img src="img/example_English1.jpg" />
                            <div class="testoCorsi">
                                <h2><?php echo $array["nome"]?></h2>
                                <h3><?php echo $array["materia"]." - ".$array["grado"]?></h3>
                                <p>
                                <?php echo $array["autore"]." - ".$array["data_inizio"]?>
                                </p>
                                <button type="submit" name="<?php echo $array["nome"]?>" onclick="iscrizione(name);">Follow - <?php echo $array["costo"];?>€</button>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                
            }

            $connessione->close();
            exit();

        } catch (Exception $e) {
            // Gestione eccezioni
        }
    

    ?> 
<!--<div class="container">  
    <div class="card">
        <img src="img/example_English1.jpg" />
        <div class="testoCorsi">
            <h2>Davide</h2>
            <h3>Inglese - 5 superiore</h3>
            <p>
            Appunti di inglese: Pragmatics - 19-02-2024
            </p>
            <button type="submit" name="English" onclick="iscrizione(name);">Follow</button>
        </div>
    </div>
</div>

<div class="container">  
    <div class="card">
        <img src="img/example_Letteratura.jpeg" />
        <div class="testoCorsi">
            <h2>Denise</h2>
            <h3>Letteratura - 5 superiore</h3>
            <p>
            Appunti su Pascoli - 20/03/2024
            </p>
            <button type="submit" name="Litherature" onclick="iscrizione(name);">Follow</button>
        </div>
    </div>
</div>

<div class="container">  
    <div class="card">
        <img src="img/example_Math1.jpg" />
        <div class="testoCorsi">
            <h2>Gabriele</h2>
            <h3>Matematica - 5 superiore</h3>
            <p>
            Appunti sugli insiemi - 28/03/2024
            </p>
            <button>Follow Account</button>
        </div>
    </div>
</div>-->

            <?php 
        }
            ?>

</body>
</html>