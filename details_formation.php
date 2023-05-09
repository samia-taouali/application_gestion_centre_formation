<?php 
require 'connect.php';
if(!empty($_SESSION['id_app'])){

    $id_apprenant=$_SESSION['id_app'];
    $result = mysqli_query($conn, "SELECT * FROM apprenant WHERE id_app = $id_apprenant");
    $row = mysqli_fetch_assoc($result);
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</head>

<body>
    <!-- nav -->
    <div class="nav">
        <div class="logo">
            <img src="img/logo.png" alt="" srcset="">
        </div class=>
        <div class="btns"><i class="fa-regular fa-user"></i><a href="profil.php"> Mon profil</a> </div>
    </div>
    </div>


    <div class=" container " style="">
        <?php

$id_formation = $_GET["id_formation"];

$formations = "SELECT * FROM formation WHERE id_formation = $id_formation " ;


$result = mysqli_query($conn, $formations);

if( mysqli_num_rows ( $result ) > 0 ){

echo ' <div class=" row">';

while($row = mysqli_fetch_assoc($result)) {

    $id_formation = $row["id_formation"];

    echo '
<div class=" detailsContent col-md-12 p-3" style="background : rgb(43, 181, 192,0.5); border-radius : 30px;"  >

    <div class="mb-4"><h2><strong>' .$row['sujet']. '</strong></h2></div> 

    <div class="mb-4"> <h5><i class="fa-solid fa-arrow-right mx-4"></i><strong>Categorie :  </strong><span>' .$row['categorie']. '</span></h5></div> 

    <div class="mb-4"> <h5><i class="fa-solid fa-arrow-right mx-4"></i><strong>Masse Horaire : </strong><span>' .$row['masse_horraire']. 'h</span></h5></div> 

    <div class="mb-4"><p><i class="fa-solid fa-arrow-right mx-4"></i>' .$row['description']. '</p></div>  

</div>';

}


echo '</div>';
}
?>
        <div class=" ">

            <h3 class="text-center py-5 ">Les sessions</h3>
        </div>

        <?php

    $sessionAfficher = 
        "SELECT * FROM session s 
        INNER JOIN formation f 
        ON f.id_formation = s.id_formation
        INNER JOIN formateur ff ON ff.id_formateur = s.id_formateur
        WHERE s.id_formation = $id_formation 
        AND s.etat = 'en cours d\\'inscription'";



            
    
    $result = mysqli_query($conn, $sessionAfficher);
    
    if( mysqli_num_rows ( $result ) > 0 ){

        echo '<div class="row ">';

        while($row = mysqli_fetch_assoc($result)) {

            $session_id = $row["id_session"];

$placesReserverResult  = mysqli_query($conn, "SELECT COUNT(*) FROM apprenant_session i INNER JOIN apprenant a ON a.id_app = i.id_app WHERE id_session = $session_id");

$placesReserverData = mysqli_fetch_assoc($placesReserverResult);

$placesReserver = $placesReserverData['COUNT(*)'];


    // if(!empty($_SESSION["id_apprenant"])){

        // echo $currentDate;

        echo ' <div class="card col-md-12" style=" background-color: white;">

        <div class="card-body">
            <h4 class="card-title">Session ID '.$row["id_session"].'</h4>
            <p class="card-text"><strong>Date debut :</strong><span class="greenItems"> ' .$row['date_debut']. ' </span>   |     <strong>Date fin :</strong> <span class="redItems">' .$row['date_fin']. '</span></p>
            
            <p class="card-text"><strong>Fomateur :</strong> ' .$row['prenom_formateur']. ' ' .$row['nom_formateur']. '</p>
            <p class="card-text"><strong>Les Places :</strong> <span class="greenItems">' .$row['nombre_place_maxi'].'</span></p>
            <p class="card-text"><strong>Les Places Disponibles :</strong> <span class="redItems">' .$row['nombre_place_maxi'] - $placesReserver.'</span></p>
            <p class="card-text"><strong>Etat :</strong> <span class="greenItems">' .$row['etat']. '</span></p>
    
            <button type="button" id="joinSessionbtn" class="btn" style = background-color:#209097;color:white;" data-bs-toggle="modal" data-bs-target="#joinSession' .$row['id_session']. '">
            Join Session
            </button>
            
            
        </div>
    
    
        <div class="modal fade" id="joinSession'.$row["id_session"].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title fs-5" id="exampleModalLabel">Join Session</h2">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button >
        </div>
        <div class="modal-body">
        
        <form action="joindre_session.php" method="get" enctype="multipart/form-data">
        
            <label for="ID">Are you sure want to join this Session ?</label>
            <input type="hidden" name="id_session" id="ID"  value="'.$row["id_session"].'">
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input class="btn btn-success" type="submit" name="joinSession" value="Join">
        
            </div>
        </form>
            
        
        </div>
        </div>
        </div>
        </div>';
        
// }

// else{

//     echo ' <div class="card col-md-5" style=" background-color: white;">

//     <div class="card-body">
//         <h4 class="card-title">Session ID '.$row["id_session"].'</h4>
//         <p class="card-text"><strong>Date debut :</strong><span class="greenItems"> ' .$row['date_debut']. ' </span>   |     <strong>Date fin :</strong> <span class="redItems">' .$row['date_fin']. '</span></p>
        
//         <p class="card-text"><strong>Fomateur :</strong> ' .$row['firstname']. ' ' .$row['lastname']. '</p>
//         <p class="card-text"><strong>Les Places :</strong> <span class="greenItems">' .$row['nombre_places_max'].'</span></p>
//         <p class="card-text"><strong>Les Places Disponibles :</strong> <span class="redItems">' .$row['nombre_places_max'] - $placesReserver.'</span></p>
//         <p class="card-text"><strong>Etat :</strong> <span class="greenItems">' .$row['etat']. '</span></p>

//         <a type="button" href="login.php" class="btn " style =" background-color:#1fae51;color:white;">
//         Join Session
//         </a>
        
//     </div>
//         </div>
//     ';

// }

}
    
    
    echo '</div>';



    }
    else{

   

         echo'<div class="alert alert-danger latestsProductsdiv row" role="alert">
         <h1 class ="text-center">There is no Session in this Formation :)</h1>
       </div>';
    }
    ?>









    </div>

</body>
<script src="https://kit.fontawesome.com/bc08f1cf31.js" crossorigin="anonymous"></script>

</html>