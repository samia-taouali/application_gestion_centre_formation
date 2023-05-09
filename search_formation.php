<?php 
require 'connect.php';

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
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

<!-- result search -->


<div class=" container " style="">

<h1 class="text-center mb-5">Resultat</h1>
<?php

$searchFormation = $_GET['searchFormation'];

$sql = "SELECT * FROM formation WHERE sujet LIKE '%$searchFormation%'";

$result = $conn->query($sql);

if( mysqli_num_rows ( $result ) > 0 ){

echo ' <div class=" row">';

while($row = mysqli_fetch_assoc($result)) {

    $id_formation = $row["id_formation"];

    echo '
    <div class="col-md-3 ">
    <form method = "GET" action = "" class=" card  text-center "  style=" background-color: #fffff;">
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
else{
    echo '
    <div class="alert alert-danger text-center" role="alert">
  No Results found !
    </div>';
}


?>









</div>