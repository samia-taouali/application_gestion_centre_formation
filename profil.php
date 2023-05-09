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
<?php

if (isset($_POST["edit"])){
    $prenom=$_POST['firstname']; 
    $nom=$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="UPDATE apprenant SET prenom_app='$prenom',nom_app='$nom',email_app='$email',password_app='$password' WHERE id_app='$id_apprenant'";
    if (mysqli_query($conn,$query)){
        header("refresh:0");
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profil.css">
    <title>Document</title>
</head>
<body>
   <!-- nav -->
   <div class="navp">
  <div class="icon">
     <a href="index.php"><i class="fa-solid fa-arrow-left-long fa-xl" style="color: #ffffff;"></i></a>
  </div>
    <div class="logout"><a href="logout_user.php"> <i class="fa-solid fa-arrow-right-from-bracket"></i>Se déconnecter</a> </div>
</div>
</div>

<div class="section1">
<div class="navbar">
    <div ><a href="profil.php"> Mes informations</a ></div>
    <div ><a href="formation.php"> Mes formations</a></div>
</div>
</div>
<div class="section2">
<div class="container mt-3">
    <div class=" formSU text-center">
        <?php
        
         $sql="SELECT*FROM apprenant WHERE id_app ='$id_apprenant'";
         $result=mysqli_query($conn,$sql);
         while($row=mysqli_fetch_assoc($result)){
            ?>
    <form class="tt row" method = "POST" action = ""  autocomplete="off">
        
        <div class="col-md-6">
    <div class="inputs"> <input class="form-control" type="text" name = "firstname" placeholder="First Name" required value="<?php echo $row["prenom_app"]?>"> </div>
</div>
        <div class="col-md-6">
          <div class="inputs">  <input class="form-control" type="text" name = "lastname" placeholder="Last Name" required value="<?php echo $row["nom_app"]?>"> </div>
      </div>


  <div class="col-md-6">
    <div class="inputs"> <input class="form-control" type="email" name = "email" placeholder="Email" required value="<?php echo $row["email_app"]?>"> </div>
</div>

<div class="col-md-6">
  <div class="inputs"><input class="form-control" type="password" name = "password" placeholder="password" required value="<?php echo $row["password_app"]?>"> </div>
</div>
    <div class="mt-3 ">
      <button class="px-3 btn btn" type = "submit" name = "edit" >Modifier</button>
    </div>
 
    </form>
            <?php
         }


        ?>
        
    </div>
    </div>
    </div>













</body>
<script src="https://kit.fontawesome.com/bc08f1cf31.js" crossorigin="anonymous"></script>
</html>