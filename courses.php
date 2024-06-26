<?php 
session_start();
if(!$_SESSION["AUTENTICATO"]=="ok"){
    header("Location: php/login.php");
}



        if(isset($_GET["corso"])){

            try {
                $connessione = mysqli_connect("localhost", "root", "root", "progettoinglese");
                
                $username=$_SESSION["USER"];
                $corso=$_GET["corso"];

                $sql = "DELETE FROM corso_utente WHERE username_utente = '$username' AND nome_corso='$corso'";
                
                $risultato = $connessione->query($sql);
                
                if ($risultato && $risultato->num_rows == 0) {
                    header("Location: correctly-unsubscribed.html");
                }
                
                $connessione->close();
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
       
        function disiscrizione(corso){
            var url="courses.php?corso="+corso;   //mi passo il corso con il get nell'url
            window.location.href = url;         //ricarico per aggiornare l'url
        }

        function caricaAppunti(materia){
            if(materia=="English"){
                var url="img/example_English1.jpg";   
                window.location.href = url; 
            }

            if(materia=="Litherature"){
                var url="img/example_Letteratura.jpg";   
                window.location.href = url; 
            }

            if(materia=="IT Technology"){
                var url="img/example_ITTech.jpg";   
                window.location.href = url; 
            }

            if(materia=="Science"){
                var url="img/example_Science.jpg";   
                window.location.href = url; 
            }

            if(materia=="Phisics"){
                var url="img/example_Phisics.jpg";   
                window.location.href = url; 
            }

            if(materia=="Mathematics"){
                var url="img/example_Math1.jpg";   
                window.location.href = url; 
            }

            if(materia=="Network"){
                var url="img/example_Network.jpg";   
                window.location.href = url; 
            }

            if(materia=="History"){
                var url="img/example_History.jpg";   
                window.location.href = url; 
            }
        }

    </script>

    <title>EduStream - Your Courses</title>
</head>
<body>

<button class="burger" onclick="toggleMenu()">
      <i class="fa-solid fa-bars"></i>
      <i class="fa-solid fa-close"></i>
    </button>
<aside class="aside">
    <br><br><br><br><br><br><br>
    
    <ul>
        <li><a href="areaRiservata.php"><i class='bx bxs-user-badge'></i> reserved area</a></li>
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
        <div class="logo" onclick="toHome()">
          <img src="img/logov2.png" />
          <h2>EduStream - Your Courses</h2>
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



    
    <?php 
        
            //STAMPO TUTTI I CORSI DELL'UTENTE
        try {
            $connessione = mysqli_connect("localhost", "root", "root", "progettoinglese");

            $username=$_SESSION["USER"];

            $sql = "SELECT * FROM corso_utente WHERE username_utente='$username'";
            $risultato = $connessione->query($sql);
    
            if ($risultato && $risultato->num_rows > 0) {
                ?>
                    
                    <div class="container">
                        <br><br><br><br><br><br>
                        <div class="titolo_centrale">
                            <font> <!-- Se vuoi cambiare font-->
                                <center>
                                Your Courses:
                                </center>
                            </font>
                        </div>
                    </div>
                    
                <?php
                while ($array = mysqli_fetch_assoc($risultato)) {
                    $sql2 = "SELECT * FROM lista_corsi WHERE nome='$array[nome_corso]'";
                    $risultato2 = $connessione->query($sql2);
                    $array2 = mysqli_fetch_assoc($risultato2);
                    ?>
                    <div class="container">  
                        <div class="card">
                            <img src="img/example_English1.jpg" />
                            <div class="testoCorsi">
                                <h2><?php echo $array2["nome"]?></h2>
                                <h3><?php echo $array2["materia"]." - ".$array2["grado"]?></h3>
                                <p>
                                <?php echo $array2["autore"]." - ".$array2["data_inizio"]?>
                                </p>
                                <button type="submit" name="<?php echo $array2["materia"]?>" onclick="caricaAppunti(name);">Notes</button>&nbsp;&nbsp;&nbsp;
                                <button type="submit" name="<?php echo $array2["nome"]?>" onclick="disiscrizione(name);">Unfollow</button>
                            </div>
                        </div>
                    </div>

                    <?php 
                }
                
            }else{
                ?>
                <div class="container"> <br><br><br><br><br><br>
                       
                        <div class="titolo_centrale">
                            <font> <!-- Se vuoi cambiare font-->
                                <center>
                                No courses found!
                                </center>
                            </font>
                        </div>
                    </div>
                <?php
            }
        
    

            $connessione->close();
            exit();

        } catch (Exception $e) {
            // Gestione eccezioni
        }
    

    ?> 




</body>
</html>