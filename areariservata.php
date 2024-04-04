<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="img/logov2.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="css/area_riservata.css">
  <script type="text/javascript" src="js/funzioni.js"></script>

  <title>Area-Riservata</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

<!-- Sidebar SX-->
<div class="sidebarS">
  <br><br><br><br><br>
  <!-- Per aggiungere righe copia incolla un li-->
  <ul>
    <li><a href="graduation.html"><i class='bx bxs-graduation'></i> graduation</a></li>
    <li><a href="index.php"><i class='bx bx-home-alt-2' ></i> return to home</a></li>
    <li><a href="php/logout.php"><i class='bx bxs-log-out'></i> sign-out</a></li>
    <li><a href="termsOfUse.html"><i class='bx bx-user'></i> terms of use</a></li>
    <!-- <li><a href="settings.html"><i class='bx bx-cog'></i> settings</a></li> -->
    </ul>
</div>

  <!-- Per cambiare le icone vai su https://boxicons.com e prendi la sezione FONT -->

<!-- Sidebar DX -->
<div class="sidebarD">
  <br><br><br><br><br>

  <ul>
    <li><a href="whoweare.html"><i class='bx bx-group' ></i> who we are</a></li>
    <li><a href="whatwedo.html"><i class='bx bx-briefcase'></i> what we do</a></li>
    <li><a href="help.html"><i class='bx bx-help-circle' ></i> help</a></li>
    <li><a href="contact.html"><i class='bx bxs-contact'></i> contact</a></li>
    <li><a href="credits.html"><i class='bx bxl-creative-commons'></i> credit</a></li>
    </ul>
  </div>


  <!-- Barra di Navigazione -->
    <nav class="navbar">
        <div class="logo">
          <img src="img/logov2.png" />
          <h2>EduStream - Area Riservata</h2>
        </div>
        <div class="links">
          <a href="#">TEXT</a>
          <a href="#">TEXT</a>
          <div class="dropdown">
            <a href="#">
              <div class="pfp">
                <img src="img/Default_pfp.jpg"/> 
              </div>
              Account
              <img src="img/chevron.png"/>
            </a>
            <div class="menu">
              <a href="#"> opzione1 </a>
              <a href="#"> opzione2 </a>
              <a href="#"> opzione3 </a>
              <a href="#"> opzione4 </a>
              <a href="#"> opzione5 </a>
              <a href="php/login.php" class="login-link"> logout </a>
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
          <img src="img/Notes.jpg">
          <div class="content">
              <span>
                  <h2>Notes</h2>
                  <p>Notes from the courses you signed up for</p>
              </span>
          </div>
      </li>

      <!-- Accordion 2-->
      <li>
          <img src="img/VideoLessons.png">
          <div class="content">
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
