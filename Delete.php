<!--                                    
    Author           :  Paul Romeo R. Despuig                                         
    Year and Course  :  2 - BSIT
    Subject          :  ITMC231 Platform Technologies
    Honor Code       :  This is my own work and I have not received any unauthorized help in completing this. 
                        I have not copied from my classmate, friend, nor any unauthorized resource. I am well 
                        aware of the policies stipulated in the handbook regarding academic dishonesty. If 
                        proven guilty, I won't be credited any points for this endeavor.
-->

<?php include 'Insert.php'; ?>

<?php
    //---Delete Information---
    $submit_id = $_REQUEST['Submit_ID'];
    $sql = "DELETE FROM data_table WHERE submit_id =" .$_GET['Submit_ID'];
    $result = mysqli_query($conn, $sql) or die ( mysqli_error());
    $row = mysqli_fetch_array($result);
    header("Location: Data.php"); 
?>