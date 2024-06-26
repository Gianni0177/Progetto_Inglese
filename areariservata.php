<?php 
session_start();
if(!$_SESSION["AUTENTICATO"]=="ok"){
    header("Location: php/login.php");
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

  <link rel="stylesheet" type="text/css" href="css/area_riservata.css">
  <script type="text/javascript" src="js/funzioni.js"></script>

  <title>Area-Riservata</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

<button class="burger" onclick="toggleMenu()">
      <i class="fa-solid fa-bars"></i>
      <i class="fa-solid fa-close"></i>
    </button>
<aside class="aside">
    <br><br><br><br><br><br><br>
    
    <ul>
        <li><a href="index.php"><i class='bx bxs-home-alt-2'></i></i> Back to home</a></li>
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
          <h2>EduStream - Area Riservata</h2>
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

  <!-- menu selezione-->
  <div class="container">

    <div class="titolo_centrale">
      <font> <!-- Se vuoi cambiare font-->
        <center>
          CHOOSE WHAT TO DO !
        </center>
      </font>
    </div>

    <br><br>

    <ul class="accordion">
      <!-- Accordion 1-->
      <li>
          <img src="img/Notes.jpg" >
          <div class="content" onclick="toExample()">
              <span>
                  <h2>Your Courses</h2>
                  <p>Notes from the courses you signed up for</p>
              </span>
          </div>
      </li>

      <!-- Accordion 2-->
      <li>
          <img src="img/VideoLessons.png">
          <div class="content" onclick="toVideos()">
              <span>
                  <h2>Video Lessons</h2>
                  <p>Video lessons of the courses you signed up for</p>
              </span>
          </div>
      </li>

      <!-- Accordion 3-->
      <li>
          <img src="img/courses.jpg">
          <div class="content" onclick="toCourses()">
              <span>
                  <h2>View courses</h2>
                  <p>View the courses you have signed up for</p>
              </span>
          </div>
      </li>
      
      <!-- Accordion X - copia incolla
      <li>
        <img src="img/ AGGIUINGI UNA IMMAGINE QUI ">
        <div class="content">
            <span>
                <h2> TITOLO </h2>
                <p> DESCRIZIONE </p>
            </span>
        </div>
      </li>
      -->

    </ul>
  </div>  

</body>
</html>
