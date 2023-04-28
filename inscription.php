<?php 
require 'connect.php';
if(!empty($_SESSION["id_app"])){
    header("Location: index.php");
    }
    if(isset($_POST["submit"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];


    $duplicate = mysqli_query ( $conn, "SELECT * FROM apprenant WHERE  email_app = '$email' ");

    if(mysqli_num_rows($duplicate) > 0){

        echo "<script> alert('Email Has Already Taken'); </script>";
    }
    else{

        if($password == $confirmpassword){
        $query = "INSERT INTO apprenant  VALUES('','$firstname','$lastname','$email','$password')";
        // header("window.Location: login-admin.php");

        mysqli_query($conn, $query);

        echo"<script> alert('Registration Successful'); </script>";
        }
        else{
        echo
        "<script> alert('Password Does Not Match'); </script>";
        }
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <title>Document</title>
</head>
<body>
<div class="container mt-3">
    <div class=" formSU text-center">
        
        <form class="tt row" method = "POST" action = ""  autocomplete="off">
        <div class="title"><h2>E-learning</h2></div>
            <div class="col-md-6">
                <div class="inputs"> <input class="form-control" type="text" name = "firstname" placeholder="First Name" required value=""> </div>
            </div>
            <div class="col-md-6">
              <div class="inputs">  <input class="form-control" type="text" name = "lastname" placeholder="Last Name" required value=""> </div>
          </div>


      <div class="col-md-6">
        <div class="inputs"> <input class="form-control" type="email" name = "email" placeholder="Email" required value=""> </div>
    </div>

    <div class="col-md-6">
      <div class="inputs"><input class="form-control" type="password" name = "password" placeholder="password" required value=""> </div>
  </div>

  <div class="col-md-6">
    <div class="inputs"><input class="form-control" type="password" name = "confirmpassword" placeholder="Confirm password" required value=""> </div>
</div>



        <div class="mt-3 ">
          <button class="px-3 btn btn" type = "submit" name = "submit" >S'inscrire</button>
        </div>
        <div class="col-md-6">
    <div class="inputs"><p>vous avez déjà un compte? <span><a href="connexion.php" id="word">connectez -vous</a></span></p></div>
</div>

        </form>
    </div>
    </div>
   
</body>
</html>