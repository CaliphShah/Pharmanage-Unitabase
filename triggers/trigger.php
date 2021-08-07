<?php

    include 'config.php';
    $trig='CREATE OR REPLACE TRIGGER creditpts_update
           AFTER INSERT ON RECEIPT
           FOR EACH ROW
           BEGIN
                DECLARE tot FLOAT;
                DECLARE nam VARCHAR(20);
                DECLARE pts INT;
                SELECT c_name,total into nam,tot FROM receipt WHERE receipt.c_name=NEW.c_name;
                IF tot<=50 THEN
                    pts=10;
                ELSEIF tot>50 AND tot<=100 THEN
                    pts=20;
                ELSE
                    pts=30;
                END IF; 
                UPDATE CUSTOMER SET cred_points=cred_points+pts WHERE CUSTOMER.c_name=nam;
           END;';
    $exec=mysqli_query($con,$trig);
    mysqli_close($con);
?>