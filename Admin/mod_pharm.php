<?php
  include "../Config/config.php";

  $phname=$phnum=$phpwd=$admkey='';

  if(isset($_POST['submit1'])){
    $phname=$_POST['phname'];
    $phnum=$_POST['phnum'];
    $phpwd=$_POST['phpwd'];
    $admkey=$_POST['admkey'];

    if($admkey=='2108'){
      $pwd=password_hash($phpwd,PASSWORD_DEFAULT);
      if(password_verify($phpwd,$pwd)){
          $sql="INSERT INTO pharmacist (p_name,mob_no,password) VALUES ('$phname',$phnum,'$pwd');";
          $sql1=mysqli_query($con,$sql);
      }
      else{
        echo "Password ERROR";
      }
    }
    else{
      echo "Admin Key INVALID!";
    }
 }

  if(isset($_POST['submit2'])){
    $phid=$_POST['phid'];
    $admkey=$_POST['admkey'];

    if($admkey=='2108'){
          $seql="SELECT * FROM pharmacist where pharm_id='$phid';";
          $seql1=mysqli_query($con,$seql);
          if(mysqli_num_rows($seql1)>0){
            $sql3="DELETE FROM pharmacist where pharm_id = '$phid';";
            $sql4=mysqli_query($con,$sql3);
            echo "<script>alert('Pharmacist Removed Successfully!');</script>";
          }
          else{
            echo "<script>alert('INVALID Pharmacist ID!');</script>";
          }
    }
    else{
      echo "Admin Key INVALID!";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>UnitaBase</title>
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

<style>

.buton{
  
  border: none;
  color: black;
  padding: 100px;
  text-align: center;
  text-decoration: none;
  word-wrap: normal;
  display: inline-block;
  margin: 20px;
  cursor: pointer;
  border-radius: 16px;
}

.buton:hover{
    background-color: #ddd;
}



.modal {
  display: none; 
  position: fixed; 
  z-index: 1; 
  padding-top: 100px; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4); 
}


.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}


.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}


</style>




</head>
<body  style="background-image:url(../sources/Images/ph.jpg)">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top ">
  		<a class="navbar-brand" href="#">  
  		  <img src="../sources/Images/Pharmanage (2).png" width="30" height="30" class="d-inline-block align-top" alt="">
 		   Pharmanage
	    </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    			<span class="navbar-toggler-icon"></span>
  		</button>
	  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
		  
    	<ul class="navbar-nav float-sm-right">
      		
     		
			<li class="nav-item dropdown dropleft">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="../sources/Images/apple-settings.png" type="img/png"  width="30" height="30" >
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">About Application</a>
					<a class="dropdown-item" href="#"></a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>                
        </ul>
  	  </div>
	</nav>
    <div ng-view></div>
    
    <div class="container-fluid text-center fixed-top lead" style="position:top; margin-top: 10px;  ">
        <br><br><br>
	                   <h1 data-text="UnitaBase" ><span>UnitaBase</span></h1>                       
    </div>
    <div class="table-responsive table  text-center justify-content-center col-auto" style="margin-left:auto; margin-right:auto; overflow-x:hidden;" >
      <div class="row"> 
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<p><b> To Add A Pharmacist:</b></p>&emsp;&emsp;&emsp;&emsp;
          <form action="mod_pharm.php" method="POST" >
              <div class="form-row">
                  <div class="col">
                      <input type="text" name="phname" class="form-control" placeholder="Pharmacist Name" required>
                  </div>
                  <div class="col">
                      <input type="text"  name="phnum" class="form-control" placeholder="Mobile Number" required>
                  </div>
                  <div class="col">
                      <input type="password" name="phpwd"  class="form-control" placeholder="Password" required>
                  </div>
                  <div class="col">
                      <input type="password" name="admkey" class="form-control" placeholder="Admin Key" required>
                  </div>
                  <button type="submit" class="btn btn-lg btn-dark" name="submit1"> Add Pharmacist</button>
              </div>
          </form>
        </div>
          <br>
      <div class="row">
         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<p><b> To Remove A Pharmacist:</b></p>&emsp;&emsp;&emsp;&emsp;&emsp;
          <form action="mod_pharm.php" method="POST" >
              <div class="form-row">
                  <div class="col">
                      <input type="text" name="phid" class="form-control" placeholder="Pharmacist ID" required>
                  </div>
                  <div class="col">
                      <input type="password" name="admkey" class="form-control" placeholder="Admin Key" required>
                  </div>
                  <button type="submit" class="btn btn-lg btn-dark" name="submit2">Remove Pharmacist</button>
              </div>
          </form>
        </div>          
     </div>
     <div class="container-flex" style="width:100%" >
      <a href="admin.php" value="Back to Admin Page" type="button" class="button btn btn-lg btn-dark" style="bottom:0; right:0; position:absolute">Back to Admin Page</a>          
  </div>
</body>
</html>

   