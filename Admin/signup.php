<?php
    include '../Config/config.php';
    
    $name  = $email = $pass = $adminkey = $phone = '';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
	    $email = $_POST['email'];
	    $pass = $_POST['pwd'];
	    $adminkey = $_POST['admkey'];
	    $phone = $_POST['phone'];     

      if ($adminkey=='2108'){
        $pass1= password_hash($pass, PASSWORD_DEFAULT);
        if (password_verify($pass,$pass1)){
        $create="INSERT into admin(admin_name,email,mob_no,password) values('$name','$email','$phone','$pass1')";
        if(mysqli_query($con,$create)){
          header("Location: login_page.php");
        }
        else{
            header("Location: signup.php");
        }
       }
      }
        mysqli_close($con);
    }
    
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>UnitaBase Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/gif/png" href="../Sources/Images/Pharmanage (2).png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="../pharm.css">
<style >
* {box-sizing: border-box}


  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}


.cancelbtn {
  padding: 14px 20px;
  background-color: rgb(46, 64, 83);;
}


.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}


.container {
  padding: 16px;
}


.clearfix::after {
  content: "";
  clear: both;
  display: table;
}


@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}
</style>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Arvo&family=Cinzel:wght@400;500;600&family=Cormorant+SC&family=Diplomata+SC&family=Girassol&family=Monoton&family=Montserrat:wght@200;400&family=Orbitron&family=Spectral+SC:wght@200&family=Zen+Dots&display=swap" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body style="overflow-y: auto; background-image:url('../Sources/Images/ph.jpg');">
<div class="container register-form">
    <div class="jumbotron-fluid text-center " style="background: rgba( 0 ,  0 , 0 , 0.8 ); position:relative; height: 100%; ">
	                   <h1 data-text="UnitaBase" ><span>UnitaBase</span></h1>
 
                       <p class="lead col-lg-12 col-xs-12 col-centered">Care Yourself & Care for Others!</p>
    </div>
            <div class="form " style="overflow-y: auto;">
                <form action="signup.php" method="POST" style="border:1px solid #ccc">
                   <div class="container" style="background: rgba(255, 255, 255, 0.8); position:absolute; height: 100%;  ">
                    <h2>Sign Up</h2>
                    <p>Please fill in this form to create an account.</p>
                     <hr>

                    <label for="email"><b>Email</b></label>
                     <input type="email" placeholder="Enter Email" name="email" required>
                    
                     <label for="name"><b>Name</b></label>
                     <input type="text" placeholder="Enter Name" name="name" required>

                     <label for="phone"><b>Phone Number</b></label>
                    <input type="text" placeholder="Enter Phone Number" name="phone" required>

                    <label for="pwd"><b>Create New Password</b></label>
                    <input type="password" placeholder="Enter Password" name="pwd" required>


                    <label for="admkey"><b>Admin Key</b></label>
                     <input type="password" placeholder="Enter Admin Key" name="admkey" required>

                    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                    <div class="clearfix">
                     
                    <button type="button" class="cancelbtn" href="..Unitabase/Admin/login_page.php">Cancel</button>
                    
                    <button type="submit" class="signupbtn"  name="submit">Sign Up</button>
                    </div>
                </div>
                </form>

                
            </div>
    
</div>
</body>
</html>