<?php

echo '<div class=" fixed-bottom">
	<form method="POST">
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Enter your E-mail address</label><br>
    <div class="form-group ">
    <!-- <label for="email" class="sr-only">E-mail ID</label> -->
    <input type="email" class="form-control " name="username" id="email" placeholder="E-mail ID">
  </div>
    <small id="emailHelp" class="form-text ">We will never share your email with anyone else.</small>
  </div>
  <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
</form>
 </div>';



 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'unitabase@gmail.com';
$mail->Password = 'unitabase@123';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

if(isset($_POST['submit'])){
$username=$_POST['username'];

$mail->setFrom('unitabase@gmail.com', 'Pharmanage Corp');
$mail->addReplyTo('unitabase@gmail.com', 'Pharmanage Corp');
$mail->addAddress($username, $username);



$mail->isHTML(true);

$mail->Subject = "Order Receipt from Pharmanage";
$mail->addEmbeddedImage('bg.jpg', 'image_bg');
$string="";
$i=1;
foreach($items as $item):
    $string.="<tr>
                                <td>".$i."</td>
                                <td>".$item['p_id']."</td>
                                <td>".$item['name']."</td>
                                <td>".$item['price']."</td>
                                <td>".$item['qty']."</td>
                                <td>".$item['price']*$item['qty']."</td>
                            </tr>";
    $i++;
endforeach;
$mail->Body = "<p> Thank You for purchasing from Us! Please find your purchase reciept attached with the mail.<p>
<p> Receipt ID: ".$rid."</p>
<p> Please keep your receipt ID for future references! </p>
            <style>
            table, th, td {
            border: 1px solid black;
            }   
            </style>
            <div class='table-responsive invoice-box' style='overflow-y: auto; height: auto;  color:black;'>
                <table class='table table-striped table-bordered border-dark' >
                    <thead class='table' style='text-align:center;'>
                        <tr class='text-white'>
                            <th>S.No</th>
                            <th>Medicine ID</th>
                            <th>Medicine Name</th>
							<th>Price (₹)</th>
							<th>Qty</th>
                            <th>Total Price (₹)</th>
                        </tr>
                    </thead>
                    <tbody style='text-align:center;'><?php $i = 1; ?>
                        ".$string."
                    </tbody>
				</table>

				<p class='text-right'>Grand total =".'₹'.$tote['total']."<p>
		</div>";
$mail->AltBody = 'Your Purchase with Pharmanage Corp(Unitabase_Ltd)';

if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'Message has been sent';
}

}

?>