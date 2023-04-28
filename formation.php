<?php
require 'connect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
       <!-- nav -->
   <div class="navp">
  <div class="icon">
     <a href="home.php"><i class="fa-sharp fa-regular fa-arrow-left" style="color: #ffffff;"></i></a>
  </div>
    <div class="logout"><a href="index.php"> <i class="fa-regular fa-right-to-bracket"></i>Se déconnecter</a> </div>
</div>
</div>

<div class="section1">
<div class="navbar">
    <div ><a href="profil.php"> Mes informations</a ></div>
    <div class=""style="text-decoration:underline;"><a href="formations.php"> Mes formations</a></div>
</div>
</div>

<?php

$historique = "SELECT * FROM apprenant_session ms  
INNER JOIN session s ON s.id_session = ms.id_session
INNER JOIN formation f ON f.id_formation = s.id_session
WHERE ms.id_app = 1";

$result = mysqli_query($conn, $historique);

if( mysqli_num_rows ( $result ) > 0 ){

echo ' <div class=" row " style = "width:60%;  margin: auto; " >';

while($row = mysqli_fetch_assoc($result)) {

    echo ' <div class="cate col-md-12 py-3" style =  "background-color: rgba(43, 181, 192, 0.54) ; ">
    <h3> <strong>Titre :  </strong>' .$row['sujet']. '</h3>
    <h5><strong>Categorie :  </strong>' .$row['categorie']. '</h5>
    <p> <strong>Date  :  </strong>'.$row['date_debut'].' /'.$row['date_fin'].' </p>
    <div class=""><strong>Resultat :  </strong><span>'.$row['resultat'].'</span></div>
    <div class=""><strong>Date Evaluation : </strong><span>'.$row['date_eval'].'</span></div>
    
</div>';
}


echo '</div>';
}
?>


    
</body>
</html>