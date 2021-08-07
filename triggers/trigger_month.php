<?php
    
    $TRIG= " CREATE OR REPLACE TRIGGER trgmonth
             AFTER INSERT ON receipt
             FOR EACH ROW
             BEGIN
             DECLARE
             tot INT;
             DECLARE
             totd INT;
             DECLARE
             totl INT;
             
             SELECT SUM(total) INTO tot FROM receipt GROUP BY MONTH(time_placed) ORDER BY MONTH(time_placed) DESC LIMIT 1;
             UPDATE adminfunc SET monthsales = tot;

             SELECT SUM(total) INTO totd FROM receipt GROUP BY DATE(time_placed) ORDER BY DATE(time_placed) DESC LIMIT 1; 
             UPDATE adminfunc SET daysales = totd;

            SELECT total INTO totl FROM receipt ORDER BY time_placed DESC LIMIT 1; 
            UPDATE adminfunc SET lastsales = totl;

             END; ";
    
    $trg=mysqli_query($con,$TRIG);
    


?>
