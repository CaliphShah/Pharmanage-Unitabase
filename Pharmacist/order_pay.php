<?php 
    include("../Config/config.php");
    
    session_start();
    $i = 1;
	// $total=0;
    $total = $_SESSION['total'];
	$sqle = "SELECT total FROM receipt ORDER BY r_id DESC LIMIT 1";
 	$resulte = mysqli_query($con, $sqle);
    if(mysqli_num_rows($resulte) > 0){
        $tote = mysqli_fetch_assoc($resulte);
    }else{
    echo 'Data fetch Error : '.mysqli_error($con);
    }   	

    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y');
    $time = date('h:i:s a');

    $sql = "SELECT * FROM receipt ORDER BY r_id DESC LIMIT 1";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        $order = mysqli_fetch_assoc($result);
    }else{
    echo 'Data fetch Error : '.mysqli_error($con);
    }    
    $rid = $order['r_id'];
    $sql = "SELECT * FROM orders";
    $result = mysqli_query($con, $sql);
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if(isset($_POST['submit'])){
        echo "<script> alert('Thank You!!! Checkout Success!'); </script>";
        $sql = "DELETE FROM orders";
        if(mysqli_query($con, $sql)){
			unset($_SESSION['total']);
			unset($_SESSION['cname']);
			unset($_SESSION['pname']);
			unset($_SESSION['pmobile']);
			unset($_SESSION['refby']);
        }else{
            echo "Error".mysqli_error($con);
        }
		
		// header('Refresh: 0; URL=pharmacist.php');
        header("Location: pharmacist.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Review Order</title>
		<link rel="icon" type="image/gif/png" href="../sources/Images/Pharmanage (2).png">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<!-- <link rel="stylesheet" href="pharm.css"> -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Arvo&family=Cinzel:wght@400;500;600&family=Cormorant+SC&family=Diplomata+SC&family=Girassol&family=Monoton&family=Montserrat:wght@200;400&family=Orbitron&family=Spectral+SC:wght@200&family=Zen+Dots&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
		<script src="jquery-3.5.1.min.js"></script>
	</head>

	<body style="background-image: url('../sources/Images/ph.jpg')  ; background-repeat: no-repeat; background-size:cover ; opacity:1	; position: relative;">
    <div class="table-responsive invoice-box " style="background-color: rgba(0,0,0,0.2); color:white;" >
    <table>
	<tbody>
		<tr>
		<td>Receipt ID : <?php echo $rid?></td>

		<div class="col-10" style="padding-top: 0px; margin-left:5vw;">
      				<div class="jumbotron justify-content-center " style="background: rgba( 0 ,  0 , 0 , 0.8 ); position:relative; padding:0%;">
	      				<h1 data-text="UnitaBase" style="padding:10px; position: relative; font-family: 'cinzel', serif ; font-stretch:wider; font-size: calc(2vh + 4vw); font-weight:bolder; color: rgb(255, 255, 255); letter-spacing: 0.02em; text-transform: uppercase; text-shadow: 0 0 0.15em #1da9cc; user-select: none; white-space: nowrap; filter: blur(0.0001em); text-align: center;">
						<span>UnitaBase</span></h1>
    				</div>
  				</div>
		</tr>

		<tr>
		<td >Date : <?php echo $date; ?></td>
		</tr>

		<tr>
        <td>Time : <?php echo $time; ?></td>
		</tr>

		<tr>
        <td>Patient Name : <?php echo $_SESSION['pname']; ?> </td>
        <td>Customer Name : <?php echo $_SESSION['cname']; ?></td>
		</tr>

		<tr>
        <td>Refer by : <?php echo $_SESSION['refby']; ?></td>
		<td>Mobile : <?php echo $_SESSION['pmobile']; ?></td>
		</tr>

		
	   </tbody>
	</table>
    </div>
	
    <div class="table-responsive invoice-box" style="overflow-y: auto; height: 380px; background-color: rgba(0,0,0,0.6); color: white;">
                <table class="table table-dark table-striped table-bordered border-dark" >
                    <thead class="table" style="text-align:center;">
                        <tr class="text-white">
                            <th>S.No</th>
                            <th>Medicine ID</th>
                            <th>Medicine Name</th>
							<th>Price (₹)</th>
							<th>Qty</th>
                            <th>Total Price (₹)</th>
                        </tr>
                    </thead>
                    <tbody class="" style="text-align:center;">
                        <?php foreach($items as $item) : ?>
                            <tr>
                                <td><?php echo $i; $i += 1;?></td>
                                <td><?php echo $item['p_id']; ?></td>
                                <td><?php echo $item['name'];?></td>
                                <td><?php echo $item['price'];?></td>
                                <td><?php echo $item['qty'];?></td>
                                <td><?php $pitem = $item['price']*$item['qty'];  echo $pitem; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
				</table>
				<?php foreach($items as $item) : ?>
					<?php  $total+=$pitem ?>
				<?php endforeach; ?>
				<p class="text-right">Grand total = <?php echo '₹'.$tote["total"]; ?><p>
				
				<!-- <script>
				var eadd=prompt("Please enter your email address");
				$.ajax(
				{
    			type: "POST",
    			url: "/order_pay.php",
    			data: eadd,
    			success: function(data, textStatus, jqXHR)
    			{	
    			    console.log(data);
    			}
				});
				</script> -->

				
				<?php include("../Mailer/mail_em.php"); ?>
            <form action = "order_pay.php" method="POST">
                <input type="submit" class="text-center btn-dark" name="submit" value="Checkout" onclick="window.print()" style="top:0; right:0; padding:25px;width:22%;border-radius:30px; position:absolute; ">
            </form>
		</div>
	</body>
</html>