<?php 
require 'connect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" css/inscription.css">
    <title>Document</title>
</head>
<body>
<div class="container mt-3">
    <div class=" formSU text-center">
        
        <form class="tt row" method = "POST" action = ""  autocomplete="off">
        <div class="title"><h2>E-learning</h2></div>
      <div class="col-md-6">
        <div class="inputs"> <input class="form-control" type="email" name = "email" placeholder="Email" required value=""> </div>
    </div>

    <div class="col-md-6">
      <div class="inputs"><input class="form-control" type="password" name = "password" placeholder="password" required value=""> </div>
  </div>
        <div class="mt-3 ">
          <button class="px-3 btn btn" type = "submit" name = "submit" >Se connecter</button>
        </div>
        <div class="col-md-6">
    <div class="inputs"><p>vous n'avez pas un compte? <span><a href="inscription.php" id="word">inscrivez-vous</a></span></p></div>
</div>

        </form>
    </div>
    </div>
<?php

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }
  $sql = "SELECT * FROM apprenant WHERE email_app='$email'";
  $result = $conn->query($sql);
  if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    if ($password==$user['password_app']) {
      session_start();

      
      $_SESSION['id_app'] = $user['id_app'];
   
      // Redirect the user to the home page
      header('Location: home.php');
      exit();
    } else {
      $error_message = 'Invalid password';
    } 
  
  } 
  }
?>

