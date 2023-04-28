<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        
    <style>
    
        @import url('https://fonts.googleapis.com/css2?family=Kavoon&display=swap');

        *{
            padding: 0;
            margin: 0;
        }
        body{
            background-color: #F2E4DD;
        }

        nav{
            background-color: #E0CBC0;
            font-family: 'Kavoon', cursive;
        }

        .latestsProductsdiv{
            display: flex;
            justify-content: space-between;
             /* width: 80%; */
            margin: 5% auto;
            
        }


        .card{
            margin: 3% 0px;
        }




    </style>
</head>

<body>


<?php
require 'config.php';
if(!empty($_SESSION["id_apprenant"])){
    $id = $_SESSION["id_apprenant"];
    $result = mysqli_query($conn, "SELECT * FROM apprenant WHERE id_apprenant = $id");
    $row = mysqli_fetch_assoc($result);
    ?>

    <!-- ======= Header/Navbar ======= -->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg">
    <div class="container">
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>



    <a class="navbar-brand text-brand" href="home.php">GesFormations</a>

    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link active" href="home.php">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="Formations.php">Formations</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="">Contact</a>
        </li>
        </ul>
    </div>



    <button class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-target="#loginModal">
        <a href="Profile-personal.php" style="margin-right: 1rem; color: black; text-decoration :none;"><span><?php echo $row["firstname"] ; ?></span><i class="fa-solid fa-user"></i></a>

        <a href="logout-user.php" style="color: black;"><i class="fa-solid fa-right-from-bracket"></i></a>
    </button>

    </div>
</nav>
<?php
}
else{
    ?>
    
    <!-- ======= Header/Navbar ======= -->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg">
    <div class="container">
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>



    <a class="navbar-brand text-brand" href="home.php">GesFormations</a>

    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link active" href="home.php">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="Formations.php">Formations</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="">Contact</a>
        </li>
        </ul>
    </div>



    <button class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-target="#loginModal">
        <a href="signup.php" class ="btn btn-outline-dark" style="margin-right: 1rem; text-decoration :none;">SignUp</a>

        <a href="login.php" class="btn btn-outline-dark" style="text-decoration :none;">Login</a>
    </button>

    </div>
</nav>
    <?php
}
?>

<!-- Filter  -->

<div class="filterSearch pt-5 row  text-center" style="width: 70%; margin: auto;"> 

    <div class="searchdiv col-md-4">

        <h1>The Result</h1>

    </div>



</div>


<!-- Filter & Search -->

<div class="albumPrds album ">


    <div class="latestsProducts container">

<?php

    $searchFormation = $_GET['searchFormation'];

    $sql = "SELECT * FROM formation WHERE sujet LIKE '%$searchFormation%'";
    $resultSearch = $conn->query($sql);

    if ($resultSearch->num_rows > 0) {
        echo ' <div class="latestsProductsdiv row">';
        while($row = $resultSearch->fetch_assoc()) {
            $id_formation = $row["id_formation"];
            echo '

            <form method = "GET" action = "formation-details.php" class=" card col-md-3"  style=" background-color: #DDD9D9;">
            <div class="card-body">
                <h4 class="card-title">' .$row['sujet']. '</h4>
                <p class="card-text"><strong>Categorie :</strong> '  .$row['categorie']. '</p>
                <p class="card-text"><strong>Masse Horaire :</strong> '  .$row['masse_horaire']. 'h</p>
                <p class="card-text">'  .$row['description']. '</p>
        
                <input type="hidden" name="id_formation" type = "submit" value ="'.$id_formation.'">
                <input class="btn btn-dark" type="submit" value = "More" style = "width : 50%">
        
            </div>
            
            </form>';
        }
        echo '</div>';
    } else {
        echo '<div class="filterSearch pt-5 row  text-center" style="width: 70%; margin: auto;"> 

        <div class="searchdiv col-md-12">
    
            <h1>No results found :(</h1>
    
        </div>';
    
        echo '</div>';
    }
    
      //close database connection
    $conn->close();


?>




</div>
</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
    </html>


 