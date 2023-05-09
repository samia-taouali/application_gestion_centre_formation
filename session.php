<?php
session_start();
$conn= mysqli_connect("localhost", "root", "", "gestion_formation");
if(!empty($_SESSION["ID_apprenant"])){
    $id = $_SESSION["ID_apprenant"];
    $result = mysqli_query($conn, "SELECT * FROM apprenant WHERE id_app = $id");
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <title>SESSION</title>
</head>
<body>
     <!-- navbar -->
     <div class="barzone">
        <nav class="navbar navbar-default navbar-trans navbar-expand-lg" >
            <div class="container">
                <a class="navbar-brand text-brand" href="home.php">GrowthZone</a>

                <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link active" href="home.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="Formations.php">Formations</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="profile.php">Profil </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="registration.php">My registrations</a>
                        </li>

                        </ul>
                            <div>
                                <form action="logout.php" method="get">
                                <input type="submit" value="Log out" class="btn btn-danger" name="logout">
                            </form>
                    </div>
                </div>

            </div>
        </nav>
    </div>

    <section>
        <?php
            if(isset($_GET["response"])){
                if($_GET["response"]== "done"){
                    ?>
                <button id="modal-btn" type="hidden" class="btn btn-primaryd-none " data-bs-toggle="modal" data-bs-target="#staticBackdrop">Launch static backdrop modal</button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        </div>
                        <div class="modal-body">
                        You have Joined The Session 
                        </div>
                        <div class="modal-footer">
                        <a href="home.php"  class="btn btn-secondary" >Close</a>

                        </div>
                        </div>
                    </div>
                    </div>
                <?php
                }elseif($_GET["response"]=="already_joined"){
                    ?>
                    <button id="modal-btn" type="hidden" class="btn btn-primaryd-none " data-bs-toggle="modal" data-bs-target="#staticBackdrop">Launch static backdrop modal</button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            </div>
                            <div class="modal-body">
                            You have already joined this session
                            </div>
                            <div class="modal-footer">
                            <a href="home.php"  class="btn btn-secondary" >Close</a>
    
                            </div>
                            </div>
                        </div>
                        </div>
                    <?php
                }elseif($_GET["response"]=="2sessionsd"){
                    ?>
                    <button id="modal-btn" type="hidden" class="btn btn-primaryd-none " data-bs-toggle="modal" data-bs-target="#staticBackdrop">Launch static backdrop modal</button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            </div>
                            <div class="modal-body">
                            You have already joined 2 sessions 
                            </div>
                            <div class="modal-footer">
                            <a href="home.php"  class="btn btn-secondary" >Close</a>
    
                            </div>
                            </div>
                        </div>
                        </div>
                    <?php
                }elseif($_GET["response"]=="cannot"){
                    ?>
                    <button id="modal-btn" type="hidden" class="btn btn-primaryd-none " data-bs-toggle="modal" data-bs-target="#staticBackdrop">Launch static backdrop modal</button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            </div>
                            <div class="modal-body">
                            There is another Session in this date You can't join this session 
                            </div>
                            <div class="modal-footer">
                            <a href="home.php"  class="btn btn-secondary" >Close</a>
    
                            </div>
                            </div>
                        </div>
                        </div>
                    <?php
                }elseif(["response"]=="notdispo"){
                    ?>
                    <button id="modal-btn" type="hidden" class="btn btn-primaryd-none " data-bs-toggle="modal" data-bs-target="#staticBackdrop">Launch static backdrop modal</button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            </div>
                            <div class="modal-body">
                            This session not Disponibles
                            </div>
                            <div class="modal-footer">
                            <a href="home.php"  class="btn btn-secondary" >Close</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    <?php
                }
            }
                

        ?>
    </section>
    
    <!-- carte détaile -->

    <div class="albumPrds album py-5" style="background-color: #BBA8FF;">
        <div class="container">
            <?php
            $id_formation = $_GET["ID_formation"];
            $formations = "SELECT * FROM formation WHERE id_formation = $id_formation";
            $result = mysqli_query($conn, $formations);
            if(mysqli_num_rows($result) > 0) {
            echo '<div class="row d-flex justify-content-between" style="width: 80%; margin: auto;">';
            while($row = mysqli_fetch_assoc($result)) {
                echo '<div class="imgSt col-md-4">
                <div class="OuvrageDetails"><h2><strong>' . $row['sujet'] . '</strong></h2></div>
                <div class="OuvrageDetails"><h5><strong>Categorie :</strong><span>' . $row['categorie'] . '</span></h5></div>
                <div class="OuvrageDetails"><h5><strong>Masse Horaire :</strong><span>' . $row['duree'] . 'h</span></h5></div>
                </div>
                <div class="col-md-7">
                <div><h2>Description :</h2><span>' . $row['description'] . '</span></div>
                </div>';
            }
            echo '</div>';
            }
            ?>
        </div>
    </div>



<div class=" container mt-5 " style="background-color:white;">

<h1 class ="text-center">Les Sessions</h1>

<?php

    $sessionAfficher = 
        "SELECT * FROM session s 
        INNER JOIN formation f 
        ON f.ID_formation = s.ID_formation
        INNER JOIN formateur ff ON ff.ID_formateur = s.ID_formateur
        WHERE s.ID_formation = $ID_formation ";
            
    
    $result = mysqli_query($connection, $sessionAfficher);
    
    if( mysqli_num_rows ( $result ) > 0 ){

        echo '<div class="row ">';

        while($row = mysqli_fetch_assoc($result)) {

    $session_id = $row["ID_session"];

    $placesReserverResult  = mysqli_query($connection, "SELECT COUNT(*) FROM inscription i INNER JOIN apprenant a ON a.ID_apprenant = i.ID_apprenant WHERE ID_session = $session_id");

    $placesReserverData = mysqli_fetch_assoc($placesReserverResult);

    $placesReserver = $placesReserverData['COUNT(*)'];

    if(!empty($_SESSION["ID_apprenant"])){

        echo ' <div class="card col-md-5" style=" background-color: #BBA8FF;">

        <div class="card-body">
            <h4 class="card-title">Session ID '.$row["ID_session"].'</h4>
            <p class="card-text"><strong>Date debut :</strong> ' .$row['date_debut']. '</p>
            <p class="card-text"><strong>Date fin :</strong> ' .$row['date_fin']. '</p>
            <p class="card-text"><strong>Fomateur :</strong> ' .$row['nom']. ' ' .$row['prenom']. '</p>
            <p class="card-text"><strong>Les Places :</strong> ' .$row['nbr_places_max'].'</p>
            <p class="card-text"><strong>Les Places Disponibles :</strong> ' .$row['nbr_places_max'] - $placesReserver.'</p>
            <p class="card-text"><strong>Etat :</strong> ' .$row['etat_session']. '</p>
    
            <form action="gestioninscription.php" method="get">
                <input class="btn btn-success"  type="submit" name="joinSession" value="Join">
                <input type="hidden" name="id_session" id="ID"  value="'.$row["ID_session"].'">
            </form>
            
        </div>
        ';
 

}

}
    
    
    echo '</div>';



    }
    else{

        echo '<div class="row latestsProductsdiv">';
                echo '<h1 class ="text-center">There is no Session in this Formation :)</h1>';
        echo '</div>';
    }
    ?>




</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<?php
if(isset($_GET["response"])){
    ?>
    <script>
        setTimeout(() => {
            document.getElementById('modal-btn').click()
        }, 200);
    </script>
    <?php
}?>
</body>
</html>