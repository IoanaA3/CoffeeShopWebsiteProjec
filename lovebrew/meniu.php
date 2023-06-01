<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="my-style.css" />
    <title>Lovebrew</title>
  </head>
  <body>
    <header>
        <a href="home.html"><img src="gallery images/logo.png" alt="Numele cafenelei" /></a>
        <h1 class = "slog1">Gustă experiența noastră. Meniu proaspăt, savoare garantată</h1>
      <nav>
        <ul>
          <li><a href="ourstory.html">Our Story</a></li>
          <li><a href="meniu.php">Meniu</a></li>
          <li><a href="galerie.html">Galerie</a></li>
          <li><a href="rezervare.html">Rezervare</a></li>
        </ul>
      </nav>
    </header>

    <section class="menu-section-all">
  <h1>Meniuri</h1>
  <div class="menu-container-list">
    <h3>Bauturi</h3>
    <ul>
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "meniu_lovebrew";

     
      $conn = mysqli_connect($servername, $username, $password, $dbname); 

      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      /* interogarea sql care selecteaza nume si pret din tabela meniu_bauturi doar daca produsul e disponibil */
      $sql = "SELECT nume, pret FROM meniu_bauturi WHERE disponibil = 1";
      //se realizeaza interogarea, iar raspunsul este salvat in result
      $result = $conn->query($sql);
      
      //daca interogarea sql a returnat cel putin un rand
      if ($result->num_rows > 0) {
        //bucla se va parcurge atata timp cat mai sunt linii cu date in interogarea facuta
        //$result->fetch_assoc() ia linia urmatoare si o transforma intr-un array, ce poate fi folosita in php
        

        //se parcurge fiecare linie de date
        while($row = $result->fetch_assoc()) {
            //deci row va fi ca o lista/array ce contine info din linia urmatoare
            //se va afisa numele si pretul fiecarui element din linia curenta
            echo "<li>" . $row["nume"] . " - " . $row["pret"] . " lei</li>";
           
              
          }
      } else {
        //daca nu mai am rand returnat cu informatii, nu mai ma rezultate
          echo "0 results";
      }
    
      //in final, conexiunea este inchisa
      mysqli_close($conn);
      ?>
    </ul>
  </div>
  <div class="menu-container-list">
    <h3>Bauturi calde</h3>
    <ul>
      <?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "meniu_lovebrew";

      $conn = mysqli_connect($servername, $username, $password, $dbname);

      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT nume, pret FROM meniu_bauturi_calde WHERE disponibil = 1";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<li>" . $row["nume"] . " - " . $row["pret"] . " lei</li>";
          }
      } else {
          echo "0 results";
      }

      mysqli_close($conn);
      ?>
    </ul>
  </div>
  <div class="menu-container-list">
    <h3>Prajituri</h3>
    <ul>
      <?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "meniu_lovebrew";

      $conn = mysqli_connect($servername, $username, $password, $dbname);

      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT nume, pret FROM meniu_desert WHERE disponibil = 1";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<li>" . $row["nume"] . " - " . $row["pret"] . " lei</li>";
          }
      } else {
          echo "0 results";
      }

      mysqli_close($conn);
      ?>
    </ul>
  </div>
</section>


    <div class="social-icons-home-container">
      <h2>Let's Stay in Touch</h2>
      <div class="social-icons-home">
        <a href="https://www.facebook.com/" target="_blank"><img src="gallery images/facebook-icon.png" alt="Icon Facebook"></a>
        <a href="https://www.instagram.com/" target="_blank"><img src="gallery images/instagram-icon.png" alt="Icon Instagram"></a>
      </div>
    </div>


    <footer>
      <div class="address-section">
        <h2>Adresa noastră</h2>
        <p>Str. Alexandru Ioan Cuza nr. 18</p>
        <p>Iași, Iași</p>
        <p>Cod poștal 700500</p>
      </div>
      <div class="schedule-section">
        <h2>Program</h2>
        <p>Luni - Sâmbătă: 08:00 - 22:00</p>
        <p>Duminică: 12:00 - 22:00</p>
      </div>
      <div class="contact-section">
        <h2>Contact</h2>
        <p>Telefon: +40721234567</p>
        <p>E-mail: office@lovebrew.com</p>
      </div>
  </footer>
  </body>
</html>