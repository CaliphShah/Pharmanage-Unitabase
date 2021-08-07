<?php
    include("../Config/config.php");
    session_start();
    $custname = $pname = $pmobile = $refby = $pid = $qty = $med = '';
    $i = 1;
    $total = 0;

    if(isset($_POST['submit'])){
        $custname = $_POST['custname'];
        $pname = $_POST['pname'];
        $pmobile = $_POST['pmobile'];
        $refby = $_POST['refby'];
        $_SESSION['cname'] = $custname;
        $_SESSION['pname'] = $pname;
        $_SESSION['pmobile'] = $pmobile;
        $_SESSION['refby'] = $refby;
		
        $pid = $_POST['pid'];
		$_SESSION['pid1']=$pid;

        $qty = $_POST['qty'];
		$_SESSION['qty1']=$qty;

        $sql = "SELECT * FROM inventory WHERE med_id = '$pid'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            $med = mysqli_fetch_assoc($result);
            $medname = $med['med_name'];
            $price = $med['price'];
            $sql = "INSERT INTO orders VALUES ('$pid', '$medname', '$price', '$qty')";
            if(mysqli_query($con, $sql)){

            }else{
                echo "Order Insert ERROR : ".mysqli_error($con);
            }
        }else{
            echo "<script> alert('Enter Valid Product ID!!'); </script>";
        }
    }
	$sql = "SELECT * FROM orders";
    $result = mysqli_query($con, $sql);
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
    if(isset($_POST['review'])){
		$pid=$_SESSION["pid1"];
		$qty=$_SESSION["qty1"];
        $total = $_SESSION['total'];
        $cname = $_SESSION['cname'];
		$pmobile = $_SESSION['pmobile'];

		$sql4 = "SELECT * FROM customer WHERE mob_no = '$pmobile'";
        $result4 = mysqli_query($con, $sql4);
		if(!$result4){
			echo "ERROR :".mysqli_error($con);
		}
        if(mysqli_num_rows($result4) > 0){
		 	;
		}
		else{
			$sql3="INSERT INTO customer VALUES ('$pmobile','$cname',0);";
			$result2=mysqli_query($con,$sql3);
		}

	    $sql = "INSERT INTO receipt (c_name, total) VALUES ('$cname', $total);";
		
		$sql1= "UPDATE inventory SET qty_available = qty_available - $qty WHERE med_id = '$pid';";
        if(mysqli_query($con, $sql)){
			if(mysqli_query($con,$sql1)){
				header("Location: order_pay_adm.php");
			}
			else{
				echo "Error: ".mysqli_error($con);
			}
        }else{
            echo "Error: ".mysqli_error($con);
        }
    }

	if(isset($_POST['submit1'])){
		$del = "DELETE FROM orders;";
		if(mysqli_query($con,$del)){
			echo "<script> alert('Items in the Order have been Discarded!'); </script>";
		}
		else{
			echo "Error: ".msqli_error($con);
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
</head>
<body  style="background-image:url(../sources/Images/ph.jpg); overflow-y:auto;">
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
      		</li-->
      		<li class="nav-item">
        		<a class="nav-link" href="orderstock_adm.php">Order Stock</a>
      		</li-->
             
      		<!-- <li class="nav-item-center r"> -->
        		<!-- <a class="nav-link" href="#">Order Portal</a> -->
      		<!-- </li> -->

			<li class="nav-item dropdown dropleft">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="../sources/Images/apple-settings.png" type="img/png"  width="30" height="30" >
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="../Config/sesdest.php">Logout</a>
					</div>
				</li>                

			
        </ul>
  	  </div>
	</nav>
    
    <div class="container-fluid fixed-top" style="background: rgba( 0 ,  0 , 0 , 0.2 ); padding-top: 50px; margin-top:60px; position:absolute; color: white; ">
		
		<!-- <div class="container-fluid">
  			<div class="row align-items-start" style="background-color: rgb(17, 0, 0);">
    			
				
    			
		</div> -->
		<!-- <hr style="background-color: aliceblue;"> -->
			<form class="form  row align-items-start " action="adminpos.php" method = "POST">
                <div class="col-4" style=" width: 100%;">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="cusname">Customer Name</span>
							</div>
							<input type="text" class="form-control" id="cname" aria-describedby="cusname" name="custname" value="<?php echo $_SESSION['cname']??'';?>">
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="cusphone">Mobile Number</span>
							</div>
							<input type="text" class="form-control" id="cphone" aria-describedby="cusphone" name="pmobile"  value="<?php echo $_SESSION['pmobile']??'';?>">
						</div>

    			</div>
    			<div class="col-4" style=" width: 100%;">
						<div class="input-group mb-3"><br>
							<div class="input-group-prepend">
								<span class="input-group-text" id="patname">Patient Name&nbsp;&nbsp;</span>
							</div>
							<input type="text" class="form-control" id="ptname" aria-describedby="patname" name="pname"  value="<?php echo $_SESSION['pname']??'';?>">
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="referby">Referred by Dr.</span>
							</div>
							<input type="text" class="form-control" id="refby" aria-describedby="referby" name="refby"  value="<?php echo $_SESSION['refby']??'';?>">
						</div>
    			</div>
				<div class="col-4" style="padding-top: 1px;">
      				<div class="jumbotron" style="background: rgba( 0 ,  0 , 0 , 0.8 ); position:relative; padding:0%;">
	      				<h1 data-text="UnitaBase" style="padding:6px; position: relative; font-family: 'cinzel', serif ; font-stretch:wider; font-size: calc(2vh + 4vw); font-weight:bolder; color: rgb(255, 255, 255); letter-spacing: 0.02em; text-transform: uppercase; text-shadow: 0 0 0.15em #1da9cc; user-select: none; white-space: nowrap; filter: blur(0.0001em); text-align: center;">
						<span>UnitaBase  </span></h1>
    				</div>
  				</div>
				  
		<hr style="background-color: white; width:100%;">				  
				<div class="d-flex justify-content-center" style="width:100%;">
  				<div class="form-row  ">
  						<div class="col-4 flex-fill ">
    						  <input type="text" class="form-control" placeholder="Product ID" name="pid">
   					 	</div>
						<div class="col-3 flex-fill">
      		                  <input type="number" class="form-control" placeholder="Quantity" name="qty">
    					</div>
						<input type="submit" name="submit" value="Add item" class="btn btn-dark flex-fill col-2" >
						<input type="submit" name="submit1" value="Clear Items" class="btn btn-dark col-2" style="margin-left:10px">
						
					</div>
				</div>
			</form>
		<hr style="background-color: white;width:100%;">
    </div>
	
	<div class="table-responsive" style="overflow-y: auto; height: 380px; background-color: #b8b8b8; margin-top: 335px; ">
                <table class="table  table-striped table-bordered border-0 border-b-2 brc-default-l1">
                    <thead class="bg-dark bgc-default-tp1">
                        <tr class="text-white">
                            <th>S.No</th>
                            <th>Med_id</th>
                            <th>Med_name</th>
							<th>Price</th>
							<th>Qnty</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($items as $item) : ?>
                            <tr>
                                <td><?php echo $i; $i += 1;?></td>
                                <td><?php echo $item['p_id']; ?></td>
                                <td><?php echo $item['name'];?></td>
                                <td><?php echo $item['price'];?></td>
                                <td><?php echo $item['qty'];?></td>
                                <td><?php $pitem = $item['price']*$item['qty']; $total += $pitem; echo $pitem; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
				</table>
				<div class="container " >
				<div class="row">
				<div class="col-3 ml-auto">
					<p>Total &emsp;&emsp;&emsp;&nbsp;&emsp;&nbsp;= &emsp;&nbsp;<?php echo '₹ '.$total; ?></p>
					<p>GST (3%) &emsp;&nbsp;&emsp;&nbsp;= &emsp;&nbsp;<?php echo '₹ '. 0.03*$total; ?></p>
					<?php $total = 1.03*$total; $_SESSION['total'] = $total; ?>
					<p>Grand total&nbsp;&emsp;&nbsp; = &emsp;<?php echo '₹ '.$total;  ?><p>
				
				</div>
				</div>
				</div>
				<form action="adminpos.php" method="POST">
					<input type="submit" name="review" value="Review Your Order" class="btn btn-lg btn-dark" style="bottom:0; right:0; position:absolute;">
				</form>
	</div>
				

</body>
</html>