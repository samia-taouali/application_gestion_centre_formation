<?php 
require 'connect.php';
if(!empty($_SESSION['id_app'])){

    $id_apprenant=$_SESSION['id_app'];
    $result = mysqli_query($conn, "SELECT * FROM apprenant WHERE id_app = $id_apprenant");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location:index.php");
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
<!-- Background image -->
<div
class="text-center bg-image"
style="
  background-image: url(img/background.jpg);
  height: 400px;
  background-repeat: no-repeat;
  background-size: cover;
  height:90vh;
"

>
<div class=" cover" style="background-color: rgba(32, 144, 151, 0.6) ; " >
  <div class="d-flex justify-content-start align-items-center h-100">
    <div class="titre mx-5">
      <h1 class="mb-3">E-learning</h1>
      <h4 class="mb-3">Certificat Professionnel recommandé</h4>
      <h4 class="mb-3">diplôme de haut niveau</h4>
      <h4 class="mb-3">formation Professionnel</h4>
      <h4 class="mb-3">apprenez sans limites</h4>
    </div>
  </div>
</div>
</div>
<!-- Background image -->
<!-- Filter  -->

<div class="filterSearch pt-5 row  text-center" style="width: 70%; margin: auto;"> 

    <div class="filterdiv col-md-6 mb-3">

        <form action = "" method = "GET" class="" >

            <select class="btn btn-outline-dark" name="categories" id = "categories">

                <option value="" name = "allCategories" >All Categories</option>

                <option value="informatique" name = "informatique" >Informatique</option>
                <option value="gaming" name = "gaming">Gaming</option>
                <option value="developement" name = "">Developement</option>

            </select>


            <input class="btn" type="submit" value = "Filter" name = "filterbtn" id = "" style="background-color:#2BB5C0;color:white;">

            </form>

    </div>

    <!-- Search -->

    <div class="searchdiv col-md-4">

        <form method = "GET" action = "search_formation.php" class="input-group">

            <input type="search" name="searchFormation" id="" class="form-control" placeholder="Search" required/>

            <button type="submit" name="searchFormationbtn" class="btn"style="background-color:#2BB5C0;color:white;"> <i class="fas fa-search"></i> </button>

        </form>

    </div>

</div>


<!-- cards -->

<div class=" container " style="">
<?php

$formations = "SELECT * FROM formation " ;


$result = mysqli_query($conn, $formations);

if( mysqli_num_rows ( $result ) > 0 ){

echo ' <div class=" row">';

while($row = mysqli_fetch_assoc($result)) {

    $id_formation = $row["id_formation"];

    echo '
    <div class="col-md-3 ">
    <form method = "GET" action = "details_formation.php" class=" card  text-center "  style=" background-color: #fffff;">
    <div class="card-body">
    <h4 class="card-title">' .$row['sujet']. '</h4>
        <img class="card-img-top" src="img/logo.png" alt="Card image cap">
        <input type="hidden" name="id_formation" type = "submit" value ="'.$id_formation.'">
        <input class="btn" type="submit" value = "Voir plus" style = "width : 100% ;background-color:#2BB5C0" >

    </div>

    </form>
    </div>';

}


echo '</div>';
}


?>









</div>





</body>
<script src="https://kit.fontawesome.com/bc08f1cf31.js" crossorigin="anonymous"></script>
</html>