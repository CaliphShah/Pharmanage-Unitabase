<?php
session_start();
include "../Config/config.php";

  $user=$_SESSION["userid"];
  include "../triggers/trigger_month.php";



  $sql="SELECT * FROM adminfunc ;";
  $sql1=mysqli_query($con,$sql);
  $sql2=mysqli_fetch_assoc($sql1);

  



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

<!-- <style>

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


</style> -->




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
					<a class="nav-link dropdown-toggle" href="../Admin/admin.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="../sources/Images/apple-settings.png" type="img/png"  width="30" height="30" >
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="../Config/sesdest.php">Logout</a>
					
					
				</li>                
        </ul>
  	  </div>
	</nav>
    <div ng-view></div>
    
    <div class="container-fluid text-center fixed-top " style="background: rgba( 0 ,  0 , 0 , 0.8 ); position:top; margin-top: 60px;  ">
        <br><br><br>
	                   <h1 data-text="UnitaBase" ><span><u>UnitaBase</u></span></h1>
 
                       <!-- <p class="lead col-lg-12 col-xs-12 col-centered">Care Yourself & Care for Others!</p> -->

                       <h2 class="text-center" style="color:palevioletred;"> Welcome <?php echo $user ?>!</h2>
                        
                <div class="table-responsive text-center" style=" font-size:larger ">
                <table class="table  table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class=" bgc-default-tp1">
                        <tr class="text-white" >
                            <th class="opacity-2 "style="width:10vw ; ">Total Sales This Month = <?php echo $sql2['monthsales']; ?></th>
                        </tr>
                        <tr class="text-white">
                            <th class="opacity-2 "style="width:10vw">Today's Sales&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = <?php echo $sql2['daysales']; ?></th>
                        </tr>
                        <tr class="text-white">
                            <th class="opacity-2 "style="width:10vw">Last Transaction &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;= <?php echo $sql2['lastsales']; ?></th>
                        </tr>
                    </thead>
				</table>
	            </div>
    </div>

    <div class="container-fluid " style="width: 100%;" >
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <a href="../Admin/records.php" class="btn btn-dark "  style="display: inline-block; padding: 50px; border-radius: 15px; " onclick="" > Manage Ledger & Records </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="../Admin/view_med.php" class="btn btn-dark  " style="display: inline-block; padding: 50px; border-radius: 15px; " > View Medicine Info </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="../Admin/mod_pharm.php" class="btn btn-dark  " style="display: inline-block; padding: 50px; border-radius: 15px; " > Add / Remove Pharmacist </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="../Admin/adminpos.php" class="btn btn-dark " style="display: inline-block; padding: 50px; border-radius: 15px; " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; POS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
    </div>

<!-- <script>

var modal = document.getElementById("myModal");


var btn = document.getElementById("myBtn");


var span = document.getElementsByClassName("close")[0];



btn.onclick = function() {
  modal.style.display = "block";
}


span.onclick = function() {
  modal.style.display = "none";
}


window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script> -->
    
</body>
</html>

    