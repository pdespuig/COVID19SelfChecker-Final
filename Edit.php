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
    if (isset($_GET['Submit_ID'])){
        $sql = "SELECT * FROM data_table WHERE submit_id =" .$_GET['Submit_ID'];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    }

    //---Update Information---
    if (isset($_POST['save'])){ 
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $barangay = $_POST['barangay'];
        $travel = "";
        $close_contact = "";
        $chk = "";
        
        if (isset($_POST['travel']) && ($_POST['travel'] == "yes")){
            $travel .= "Yes";
        } else {
            $travel .= "No";
        }
        
        if (isset($_POST['close_contact']) && ($_POST['close_contact'] == "yes")){
            $close_contact .= "Yes";
        } else {
            $close_contact .= "No";
        }
      
        if (isset($_POST['symptoms'])){
            $symptoms = $_POST['symptoms'];
            $coma = "";
            foreach($symptoms as $check){  
                $chk .= $coma.$check;
                $coma = ", ";
            } 
        }
        
        $update = "UPDATE data_table SET 
                    age='$age', 
                    gender='$gender', 
                    barangay='$barangay', 
                    traveled_abroad='$travel',         
                    close_contact='$close_contact', 
                    symptoms='$chk' 
                    WHERE submit_id=". $_GET['Submit_ID'];
        
        $up = mysqli_query($conn, $update);

        if (!isset($sql)){
            die ("Error $sql" .mysqli_connect_error());
        } else {
            header("location:Data.php");
        }
    }
?>

<!DOCTYPE html>
<head>
    <title>
        Edit / COVID-19 Self Checker
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="https://img.icons8.com/color/48/000000/virus.png">
    <link href='https://fonts.googleapis.com/css2?family=Concert+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <!--Navigation Bar-->
    <nav class="navbar sticky-top navbar-expand-md">
        <a class="navbar-brand" href="Home.php">
            <img src="https://img.icons8.com/color/48/000000/virus.png" class="d-inline-block align-top" alt="">
            <h1>
                COVID-19 Self Checker
            </h1>
        </a>
        <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    
    <!--Header-->
    <div class="jumbotron">
        <h1 class="display-4">
            Edit Information
        </h1>
    </div>
    
    <form action="#" method="post" id="form">
        <div class="card card-1">
            <div class="card-header">
              INFORMATION
            </div>
            <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="submit_id" value="<?php echo $row['Submit_ID'];?>" />
                    </div>
                    <div class="form-group">
                        <label>
                            Age
                        </label>
                        <input type="number" min="1" autocomplete="off" class="form-control" name="age" id="age" value="<?php echo $row['Age']; ?>">
                    </div>
                    <div class="form-group">
                        <label>
                            Gender
                        </label>
                        <select class="form-control" name="gender" id="gender">
                            <option selected></option>
                            <option <?php if($row['Gender']=="Male"){echo "selected";}?>>Male</option>
                            <option <?php if($row['Gender']=="Female"){echo "selected";}?>>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            Barangay
                        </label>
                        <input type="text" autocomplete="off" class="form-control" name="barangay" id="barangay" value="<?php echo $row['Barangay']; ?>">
                    </div>
                    <div class="form-check form-check-1">
                        <input class="form-check-input" type="checkbox" value="yes" name="travel" <?php if($row['Traveled_Abroad'] == "Yes"){echo "checked";}?>>
                        <label class="form-check-label check-1">
                            Travelled abroad within the last 14 days
                        </label>
                    </div>
                    <div class="form-check form-check-1">
                        <input class="form-check-input" type="checkbox" value="yes" name="close_contact" <?php if($row['Close_Contact'] == "Yes"){echo "checked";}?>>
                        <label class="form-check-label check-1">
                            Close contact with a known COVID-19 patient within the last 14 days
                        </label>
                    </div>
                    <!--Save Button-->
                    <input type="submit" class="btn btn-primary btn-submit" id="submitBtn" name="save" onClick="update()" value="Save">
                    <!--Cancel Button-->
                    <input type="button" class="btn btn-primary btn-cancel" name="cancel" onclick="window.location='Data.php';" value="Cancel">
            </div>
        </div>

        <!--Card Symptoms-->
        <div class="card card-2">
            <div class="card-header">
              SYMPTOMS
            </div>
            <div class="card-body">
                <p>Check what applies to you</p>
                <?php 
                    $chk = $row['Symptoms'];
                    $symptoms=explode(", ",$chk);
                ?>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Fever" name="symptoms[]" onclick="answer('fever')" id="fever" <?php if(in_array("Fever",$symptoms)){echo "checked";}?>>
                    <img class="symptoms" src="https://image.flaticon.com/icons/svg/2966/2966449.svg"/>
                    <label class="form-check-label check-2">
                        Fever
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Fatigue" name="symptoms[]" onclick="answer('fatigue')" id="fatigue" <?php if(in_array("Fatigue",$symptoms)){echo "checked";}?>>
                    <img class="symptoms" src=" https://image.flaticon.com/icons/png/512/3017/3017401.png"/>
                    <label class="form-check-label check-2">
                        Fatigue
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Muscle or Joint Pain" name="symptoms[]" onclick="answer('muscle')" id="muscle" <?php if(in_array("Muscle or Joint Pain",$symptoms)){echo "checked";}?>>
                    <img class="symptoms" src="https://image.flaticon.com/icons/svg/3017/3017383.svg"/>
                    <label class="form-check-label check-2">
                        Muscle or Joint Pain
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Diarrhea" name="symptoms[]" onclick="answer('diarrhea')" id="diarrhea" <?php if(in_array("Diarrhea",$symptoms)){echo "checked";}?>>
                    <img class="symptoms" src="https://image.flaticon.com/icons/png/512/2615/2615185.png"/>
                    <label class="form-check-label check-2">
                        Diarrhea
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Dry Cough" name="symptoms[]" onclick="answer('cough')" id="cough" <?php if(in_array("Dry Cough",$symptoms)){echo "checked";}?>>
                    <img class="symptoms" src="https://image.flaticon.com/icons/png/512/2877/2877806.png"/>
                    <label class="form-check-label check-2">
                        Dry Cough
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Loss of Smell or Taste" name="symptoms[]" onclick="answer('loss')" id="loss" <?php if(in_array("Loss of Smell or Taste",$symptoms)){echo "checked";}?>>
                    <img class="symptoms" src="https://image.flaticon.com/icons/svg/3035/3035297.svg"/>
                    <label class="form-check-label check-2">
                        Loss of Smell or Taste
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Sore Throat" name="symptoms[]" onclick="answer('sore')" id="sore" <?php if(in_array("Sore Throat",$symptoms)){echo "checked";}?>>
                    <img class="symptoms" src="https://image.flaticon.com/icons/svg/2709/2709207.svg"/>
                    <label class="form-check-label check-2">
                        Sore Throat
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Shortness of Breath" name="symptoms[]" onclick="answer('shortness')" id="shortness" <?php if(in_array("Shortness of Breath",$symptoms)){echo "checked";}?>>
                    <img class="symptoms" src="https://image.flaticon.com/icons/svg/2790/2790661.svg"/>
                    <label class="form-check-label check-2">
                        Shortness of Breath
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="None" name="symptoms[]" onclick="answer('none')" id="none" <?php if(in_array("None",$symptoms)){echo "checked";}?>>
                    <img class="symptoms" src="https://image.flaticon.com/icons/png/512/1373/1373257.png"/>
                    <label class="form-check-label check-2">
                        None of the Above
                    </label>
                </div>
            </div>
        </div> 
    </form>
    
    <!--Footer-->
    <div class="main-footer">
        <p>© 2020 Ateneo de Naga University</p>
    </div>
    
    <script src="script.js"></script>
</body>