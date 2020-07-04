<?php
if(session_status()==PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <title>Document</title>
    <style>
        main{
            min-height:100vh;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Navbar</a>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php
         if(empty($_SESSION['uid'])){
            echo '<li class="nav-item">
                  <a class="nav-link" href="signup.php">sign up</a>
                  </li>';
         }
      ?>

      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <?php
    if(isset($_SESSION['uid'])){
        echo '
        <form action="includes/logout.inc.php" method="POST">
           <button type="submit" name="logout-btn" class="btn btn-secondary">logout</button>
        </form>
        
        ';
    }
    else{
        echo '
        <form class="form-inline my-2" action="includes/login.inc.php" method="POST">
           <input type="email" placeholder="email" name="email" class="form-group">
           <input type="password" placeholder="password" name="password" class="form-group">
           <button iype="submit" name="login-form" class="btn btn-success">Login</button>
        </form>';
    }
    ?>

  </div>
</nav>
    </ul>
    
