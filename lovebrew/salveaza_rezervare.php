<?php
//http://localhost/lovebrew/rezervare.html



$servername = "localhost";  
$username = "root"; 
$password = ""; 
$dbname = "rezervari_lovebrew"; 


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); 
}

//Se preiau datele din formular
//Aceasta functie cumva ajuta ca datele sa fie safe 
$nume = mysqli_real_escape_string($conn, $_POST['nume']);
$prenume = mysqli_real_escape_string($conn, $_POST['prenume']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$telefon = mysqli_real_escape_string($conn, $_POST['telefon']);
$data = mysqli_real_escape_string($conn, $_POST['data']);
$ora = mysqli_real_escape_string($conn, $_POST['ora']);
$mesaj = mysqli_real_escape_string($conn, $_POST['mesaj']);


// Se construieste o interogare sql ca datele preluate din formulat sa fie puse in baza de date
$sql = "INSERT INTO rezervare (nume, prenume, email, telefon, data, ora, mesaj) VALUES ('$nume', '$prenume', '$email', '$telefon', '$data', '$ora', '$mesaj')";

// Se executa interogarea facuta anterior si se afiseaza un mesaj daca s-a realizat cu succes sau nu
if (mysqli_query($conn, $sql)) {
    echo "Rezervarea a fost înregistrată cu succes!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
}



///////////////////////////////////////////////////////////////////////////////

$sql2 = "SELECT nume, prenume, email, telefon, data, ora, mesaj FROM rezervare";
$result = $conn->query($sql2);



  $myfile = fopen("Rezervari.txt", "w") or die("Unable to open file!");
  $contor = 1;

  while($row = $result->fetch_assoc()) {
    $txt1 = "Rezervare " . $contor . ": \n";
    fwrite($myfile, $txt1);
    $txt2 =  "\nNume " . $row["nume"] . " prenume " . $row["prenume"] . " email " . $row["email"] . " telefon " . $row["telefon"] . " data programarii " . $row["data"] . " ora programarii " . $row["ora"] . " comentariu " .  $row["mesaj"] . "\n";
    fwrite($myfile, $txt2);
    $txt3 = "\n\n\n";
    fwrite($myfile, $txt3);
    $contor++;

    }
    
 
fclose($myfile);
mysqli_close($conn);

?>