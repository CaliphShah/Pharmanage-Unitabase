<?php
    include '../Config/config.php';

    $user = $pwd = '';
    if(isset($_POST['submit']))
    {
        $user=$_POST['user'];
        $pwd=$_POST['pwd'];

        $sql = "SELECT * FROM pharmacist WHERE p_name = '$user' ";

       $result = mysqli_query($con, $sql); 
       $result1 = mysqli_fetch_assoc($result);
       if(mysqli_num_rows($result) > 0){
          if(password_verify($pwd,$result1['password'])){
            session_start();
            $_SESSION['userid'] = $user;
            header("Location: pharmacist.php");
            }
            else{
                echo "error in signing in";
                header("location: login_page_ph.php");
            }
        }
    }




?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>UnitaBase Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/gif/png" href="../sources/Images/Pharmanage (2).png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="../pharm.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Arvo&family=Cinzel:wght@400;500;600&family=Cormorant+SC&family=Diplomata+SC&family=Girassol&family=Monoton&family=Montserrat:wght@200;400&family=Orbitron&family=Spectral+SC:wght@200&family=Zen+Dots&display=swap" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
    <body style="background-image:url('../sources/Images/ph.jpg');">
        <div class="container-fluid text-center " style=" margin-top:50px; height: 100% ;    ">
	   <br><br>
	   <div class="jumbotron-fluid " style="background: rgba( 0 ,  0 , 0 , 0.2 ); position:relative; height: 85%; ">
	      <h1 data-text="UnitaBase"><span>UnitaBase</span></h1>
 
          <p class="lead col-lg-12 col-xs-12 col-centered">Care Yourself & Care for Others!</p>
            <div class="contanier justify-content-center row">
                <form action="login_page_ph.php" method="POST" >
                    <div class="form-group col">
                        <label for="username" style="color: aliceblue;">Username:</label>
                        <input type="text" class="form-control text-center justify-content-center" placeholder="Enter username" name="user" id="username">
                    </div>
                    <div class="form-group col">
                        <label for="pwd" style="color: aliceblue;">Password:</label>
                        <input type="password" class="form-control text-center justify-content-center" placeholder="Enter password" name="pwd" id="pwd">
                    </div>
                <button type="submit" name="submit" class="btn btn-primary ">Login</button>
            </form>
           
            </div>
        </div>
        </div>
        </form>
    </body>
</html>