<?php
    include 'config.php';
    $con=mysqli_connect($dbhost,$dbuser,$dbpassword,$database);
    if(!$con)
        echo "Couldn't connect to Database Server".mysqli_error($con);

    $tabadm='CREATE TABLE admin (admin_id int(10) AUTO_INCREMENT primary key , email varchar(30) unique, admin_name varchar(20), mob_no varchar(12), password varchar(100))';
    if(mysqli_query($con,$tabadm))
    	echo "Admin table created!\n";

    $tabphar='CREATE TABLE pharmacist (pharm_id int(10) primary key,p_name varchar(20),mob_no  int(12),password varchar(100))';
    if(mysqli_query($con,$tabphar))
    	echo "Pharmacist table created!\n";

    $tabinv='CREATE TABLE inventory (med_id varchar(20) primary key,med_name varchar(50),med_type varchar(20),dosage varchar(20),
            company varchar(20),batch_no varchar(20),exp_date date,price int,qty_available int,availability varchar(20),
            box_no varchar(20))';
    if(mysqli_query($con,$tabinv))
	    echo "Inventory table created!\n";

    $tabpur='CREATE TABLE purchase (purchase_id varchar(10) primary key,supplier varchar(20),med_id varchar(20),
             foreign key(med_id) references inventory(med_id),med_name varchar(50),qty int)';
    if(mysqli_query($con,$tabpur))
	    echo "Purchase table created!\n";

    $tabcus='CREATE TABLE customer( mob_no int(12) primary key, c_name varchar(20),cred_points int(10))';
    if(mysqli_query($con,$tabcus))
    	echo "Customer table created!\n";
    $tabord='CREATE TABLE order(order_id varchar(20) primary key,med_id varchar(20),foreign key(med_id) references inventory(med_id),
             med_name varchar(50),price int not null,qty int not null)';
    if(mysqli_query($con,$tabord))
    	echo "Order table created!\n";

    $tabrec='CREATE TABLE receipt(order_id varchar(20),foreign key(order_id) references order(order_id),c_name varchar(20),
             total_amt int,time datetime)';
    if(mysqli_query($con,$tabrec))
	    echo "Receipt table created!\n";
?>




