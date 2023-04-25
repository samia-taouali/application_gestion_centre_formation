<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <div ><a href="formation.php"> Mes formations</a></div>
</div>
</div>
<div class="section2">
<div class="container mt-3">
    <div class=" formSU text-center">
        
        <form class="tt row" method = "POST" action = ""  autocomplete="off">
        
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
        <div class="mt-3 ">
          <button class="px-3 btn btn" type = "submit" name = "submit" >Modifier</button>
        </div>
     
        </form>
    </div>
    </div>
    </div>












<script src="https://kit.fontawesome.com/bc08f1cf31.js" crossorigin="anonymous"></script>
</body>
</html>