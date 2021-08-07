<?php

  include "../Config/config.php";

  $sql="SELECT * FROM inventory;";
  $sql1=mysqli_query($con,$sql);
  $sql2=mysqli_fetch_all($sql1,MYSQLI_ASSOC);




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
  		<a class="navbar-brand" href="admin.php">  
  		  <img src="../sources/Images/Pharmanage (2).png" width="30" height="30" class="d-inline-block align-top" alt="">
 		   Pharmanage
	    </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    			<span class="navbar-toggler-icon"></span>
  		</button>
	  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
		  
    	<ul class="navbar-nav float-sm-right">
      		
     		<!-- li class="nav-item">
        		<a class="nav-link" href="#"></a>
      		</li>
      		<li class="nav-item">
        		<a class="nav-link" href="#"></a>
      		</li-->
             
      		<!-- <li class="nav-item-center r"> -->
        		<!-- <a class="nav-link" href="#">Order Portal</a> -->
      		<!-- </li> -->

			<li class="nav-item dropdown dropleft">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="../sources/Images/apple-settings.png" type="img/png"  width="30" height="30" >
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#" onclick="alert('Pharmanage is an Application for the management and maintainence of any Pharmaceutical Database with the Best Possible features and atmost security for the users and the admins.');">About Application</a>
					<a class="dropdown-item" href="admin.php">Home</a>
					<div class="dropdown-divider"></div>
					
          <a class="dropdown-item" href="../Config/sesdest.php">Logout</a>
					</div>
				</li>                

			<!-- <li class="nav-item active"> -->
      		 	<!-- <a class="nav-link" href="#"><img src="apple-settings.png" type="img/png"  width="30" height="30" class="d-inline-block align-top"  ></a> -->
      		<!-- </li> -->
        </ul>
  	  </div>
	</nav>
    <div ng-view></div>
    
    <!-- <div class="container-fluid text-center fixed-top lead" style="position:top; margin-top: 10px;  ">
        <br><br><br>
	                   <h1 data-text="UnitaBase" ><span>UnitaBase</span></h1>                       
    </div> -->
    
     <div class="container-flex" style="width:100%">
        <div class="table-responsive" style="overflow-y: auto; height: 500px; background-color: white; margin-top: 150px; ">
                <table class="table  table-striped table-bordered border-0 border-b-2 brc-default-l1">
                    <thead class="bg-dark bgc-default-tp1">
                        <tr class="text-white">
                            <th>Medicine ID</th>
                            <th>Medicine Name</th>
                            <th>Medicine Type</th>
                            <th>Price</th>
                            <th>Qty Available</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($sql2 as $sql3) : ?>
                            <tr>
                               
                                <td><?php echo $sql3['med_id']; ?></td>
                                <td><?php echo $sql3['med_name'];?></td>
                                <td><?php echo $sql3['med_type'];?></td>
                                <td><?php echo $sql3['price'];?></td>
                                <td><?php echo $sql3['qty_available'];?></td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
				</table>
				
      

	</div>
  <div class="container-flex" style="width:100%" >
      <a href="admin.php" value="Back to Admin Page" type="button" class="button btn btn-lg btn-dark" style="bottom:0; right:0; position:absolute">Back to Admin Page</a>          
  </div>

    
</body>
</html>

   