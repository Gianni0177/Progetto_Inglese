<?php 
session_start();
if(!$_SESSION["AUTENTICATO"]=="ok"){
    header("Location: php/login.php");
}
?>

<!DOCTYPE html>z
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<script type="text/javascript" src="js/funzioni.js"></script>-->

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0"/>

    <script>
       
        function iscrizione(corso){
            console.log("Corso scelto: "+corso);
            
            <?php 

                    //verifico se l'utente è già iscritto al corso scelto
                   
                    try {
                        $connessione = mysqli_connect("localhost", "root", "root", "progettoinglese");

                        $sql = "SELECT * FROM corso_utente WHERE nome_corso='corso' AND username_utente=$_SESSION[USER];";
                        $risultato = $connessione->query($sql);
                
                        if ($risultato && $risultato->num_rows > 0) {
                            while ($array = mysqli_fetch_assoc($risultato)) {
                                echo "<script>console.log('Corso trovato: " .$array["username_utente"]." ".$array["nome_corso"]." ".$array["id_corso"]. "' );</script>";
                            }

                            
                
                            $connessione->close();
            
                            exit();
                        }
                    } catch (Exception $e) {
                        // Gestione eccezioni
                    }



                

                
            ?>
        }

        function ricercaCorso(){

        }

    </script>

    <title>Home</title>
</head>
<body>

<!-- Sidebar SX-->
<div class="sidebarS">
    <br><br><br><br><br>
    <!-- Per aggiungere righe copia incolla un li-->
    <ul>
      <li><a href="graduation.html"><i class='bx bxs-graduation'></i> graduation</a></li>
      <li><a href="areaRiservata.html"><i class='bx bxs-user-badge'></i> reserved area</a></li>
      <li><a href="php/sign-in.php"><i class='bx bxs-log-in'></i> sign in</a></li>
      <li><a href="termsOfUse.html"><i class='bx bx-user'></i> terms of use</a></li>
      <li><a href="settings.html"><i class='bx bx-cog'></i> settings</a></li>
    </ul>
</div>
  
    <!-- Per cambiare le icone vai su https://boxicons.com e prendi la sezione FONT -->
  
<!-- Sidebar DX -->
<div class="sidebarD">
    <br><br><br><br><br>
  
    <ul>
      <li><a href="#"><i class='bx bx-group' ></i> who we are</a></li>
      <li><a href="#"><i class='bx bx-briefcase'></i> what we do</a></li>
      <li><a href="#"><i class='bx bx-help-circle' ></i> help</a></li>
      <li><a href="#"><i class='bx bxs-contact'></i> contact</a></li>
      <li><a href="#"><i class='bx bxl-creative-commons'></i> credit</a></li>
    </ul>
</div>


<!-- Barra di Navigazione -->
<nav class="navbar">
    <div class="logo">
        <img src="img/Logo_IMG.png" />
        <h2>Take Notes! - Home</h2>
    </div>
    <div class="links">
        <a href="#">TEXT</a>
        <a href="#">TEXT</a>
        <div class="dropdown">
        <a href="#"
            >Explore
            <img src="img/chevron.png" />
        </a>
        <div class="menu">
            <a href="#"> opzione1 </a>
            <a href="#"> opzione2 </a>
            <a href="#"> opzione3 </a>
            <a href="#"> opzione4 </a>
            <a href="#"> opzione5 </a>
            <a href="#"> opzione6 </a>
        </div>
        </div>
        <a href="php/logout.php" class="login-link"> sign out </a>
    </div>
</nav>


<div class="space"></div>

<!-- SearchBar -->

<div class="wrapper">
    <form action="php/ricercaCorso.php" method="post">
        <div id="search-container">
            <input type="search" id="search-input" placeholder="Search here.."/>
            <button type="submit" id="search" onclick="">Search</button>
        </div>

        <!--Dropdown-->
        <div id="buttons">
            <div class="links">
                <div class="dropdownSB">
                    <a href="#">Subject
                        <img src="img/chevron.png" />
                    </a>
                    <div class="menuSB">
                        <a href="#"> English </a>
                        <a href="#"> IT Technology </a>
                        <a href="#"> Science </a>
                        <a href="#"> Phisics </a>
                        <a href="#"> Mathematics </a>
                        <a href="#"> opzione6 </a>
                    </div>
                </div>

                <div class="pad"></div>

                <div class="dropdownSB">
                    <a href="#">Titoli di Studio
                        <img src="img/chevron.png" />
                    </a>
                    <div class="menuSB">
                        <a href="#"> opzione1 </a>
                        <a href="#"> opzione2 </a>
                        <a href="#"> opzione3 </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    <div id="products"></div>
</div>
    
<div class="space2"></div>
    
<!-- Corsi -->  
<div class="container">  
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
            <button>Follow Account</button>
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
</div>

</body>
</html>