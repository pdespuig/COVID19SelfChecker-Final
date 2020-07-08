<!--                                    
    Author           :  Paul Romeo R. Despuig                                         
    Year and Course  :  2 - BSIT
    Subject          :  ITMC231 Platform Technologies
    Honor Code       :  This is my own work and I have not received any unauthorized help in completing this. 
                        I have not copied from my classmate, friend, nor any unauthorized resource. I am well 
                        aware of the policies stipulated in the handbook regarding academic dishonesty. If 
                        proven guilty, I won't be credited any points for this endeavor.
-->
     
<?php
    $conn = new mysqli('localhost', 'Despuig', 'existentialcrisis05', 'Selfchecker');
    
    if ($conn->connect_error)
        die("Connection Failed");
?>

<?php
    //---Insert Submission---
    if (isset($_POST['submit'])){
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $barangay = $_POST['barangay'];
        $travel = "";
        $close_contact = "";
        $chk = "";
        
        if (isset($_POST['travel']) && ($_POST['travel'] == "yes")){
            $travel .= "Yes";
        } else{
            $travel .= "No";
        }
        
        if (isset($_POST['close_contact']) && ($_POST['close_contact'] == "yes")){
            $close_contact .= "Yes";
        } else {
            $close_contact .= "No";
        }
      
        if (isset($_POST['symptoms'])){
            $symptoms = $_POST['symptoms'];
            foreach($symptoms as $check){  
                $chk .= $check.", ";  
            } 
        }
          
        $sql = "INSERT into table1(age, gender, barangay, traveled_abroad, close_contact, symptoms)
                VALUES('$age','$gender','$barangay','$travel','$close_contact','$chk')";
        
        if (mysqli_query($conn, $sql)){
            ?>
            <script>
                alert('Submission successfully added!');
                window.location.href='Home.php';
            </script>
          <?php 
        } else{
            ?>
            <script>
                alert('There\'s an error...');
                window.location.href='Home.php';
            </script>
          <?php 
        }
        mysqli_close();
    }
?>