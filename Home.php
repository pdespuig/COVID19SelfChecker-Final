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
    $conn = new mysqli('localhost', 'Despuig', 'existentialcrisis05', 'Selfchecker');
    if ($conn->connect_error)
        die("Connection Failed");
?>

<!DOCTYPE html>
<head>
    <title>
        COVID-19 Self Checker
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
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="Home.php">
                        <h2>
                            Home
                        </h2>
                    </a>
                    <a class="nav-item nav-link" href="FAQs.php">
                        <h2>
                            FAQs
                        </h2>
                    </a>
                    <a class="nav-item nav-link" href="About.php">
                        <h2>
                            About
                        </h2>
                    </a>
                    <a class="nav-item nav-link" href="Data.php">
                        <h2>
                            Data
                        </h2>
                    </a>
                </div>
            </ul>
        </div>
    </nav>

    <!--Header-->
    <div class="jumbotron">
        <h1 class="display-4">
            COVID-19 Self Checker
        </h1>
        <p class="lead">
            Self-Checker helps you quickly find information about the new coronavirus and COVID-19.
        </p>
        <hr class="my-4">
        <p class="caption">
            Check yourself for coronavirus symptoms. Learn how to protect yourself and others from COVID-19.
        </p>
    </div>

    <!--Card Information-->
    <form action="#" method="post" id="form">
        <div class="card card-1">
            <div class="card-header">
              INFORMATION
            </div>
            <div class="card-body">
                    <div class="form-group">
                        <label>
                            Age
                        </label>
                        <input type="number" autocomplete="off" class="form-control" name="age" id="age" required>
                    </div>
                    <div class="form-group">
                        <label>
                            Gender
                        </label>
                        <select class="form-control" name="gender" id="gender" required>
                            <option selected></option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            Barangay
                        </label>
                        <input type="text" autocomplete="off" class="form-control" name="barangay" id="barangay" required>
                    </div>
                    <div class="form-check form-check-1">
                        <input class="form-check-input" type="checkbox" value="yes" name="travel">
                        <label class="form-check-label check-1">
                            Travelled abroad within the last 14 days
                        </label>
                    </div>
                    <div class="form-check form-check-1">
                        <input class="form-check-input" type="checkbox" value="yes" name="close_contact">
                        <label class="form-check-label check-1">
                            Close contact with a known COVID-19 patient within the last 14 days
                        </label>
                    </div>
                    <!--Submit Button-->
                    <input type="submit" class="btn btn-primary btn-submit" value="Submit" name="submit" id="submitBtn">
            </div>
        </div>

        <!--Card Symptoms-->
        <div class="card card-2">
            <div class="card-header">
              SYMPTOMS
            </div>
            <div class="card-body">
                <p>Check what applies to you</p>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Fever" name="symptoms[]" onclick="answer('fever')" id="fever">
                    <img class="symptoms" src="https://image.flaticon.com/icons/svg/2966/2966449.svg"/>
                    <label class="form-check-label check-2">
                        Fever
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Fatigue" name="symptoms[]" onclick="answer('fatigue')" id="fatigue">
                    <img class="symptoms" src=" https://image.flaticon.com/icons/png/512/3017/3017401.png"/>
                    <label class="form-check-label check-2">
                        Fatigue
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Muscle or Joint Pain" name="symptoms[]" onclick="answer('muscle')" id="muscle">
                    <img class="symptoms" src="https://image.flaticon.com/icons/svg/3017/3017383.svg"/>
                    <label class="form-check-label check-2">
                        Muscle or Joint Pain
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Diarrhea" name="symptoms[]" onclick="answer('diarrhea')" id="diarrhea">
                    <img class="symptoms" src="https://image.flaticon.com/icons/png/512/2615/2615185.png"/>
                    <label class="form-check-label check-2">
                        Diarrhea
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Dry Cough" name="symptoms[]" onclick="answer('cough')" id="cough">
                    <img class="symptoms" src="https://image.flaticon.com/icons/png/512/2877/2877806.png"/>
                    <label class="form-check-label check-2">
                        Dry Cough
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Loss of Smell or Taste" name="symptoms[]" onclick="answer('loss')" id="loss">
                    <img class="symptoms" src="https://image.flaticon.com/icons/svg/3035/3035297.svg"/>
                    <label class="form-check-label check-2">
                        Loss of Smell or Taste
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Sore Throat" name="symptoms[]" onclick="answer(sore)" id="sore">
                    <img class="symptoms" src="https://image.flaticon.com/icons/svg/2709/2709207.svg"/>
                    <label class="form-check-label check-2">
                        Sore Throat
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="Shortness of Breath" name="symptoms[]" onclick="answer('shortness')" id="shortness">
                    <img class="symptoms" src="https://image.flaticon.com/icons/svg/2790/2790661.svg"/>
                    <label class="form-check-label check-2">
                        Shortness of Breath
                    </label>
                </div>
                <div class="form-check form-check-2">
                    <input class="form-check-input" type="checkbox" value="None" name="symptoms[]" onclick="answer('none')" id="none">
                    <img class="symptoms" src="https://image.flaticon.com/icons/png/512/1373/1373257.png"/>
                    <label class="form-check-label check-2">
                        None of the Above
                    </label>
                </div>
            </div>
        </div> 
    </form>
   
    <!--Youtube Video-->
    <div class="card card-3">
        <a href="http://www.covid19.gov.ph/"><p class="vid-cap"><u>Learn more about COVID-19</u></p></a>
        <iframe width="560" height="345" src="https://www.youtube.com/embed/sHP0UIdZyI4?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
        </iframe>
    </div>
 
    <!--Footer-->
    <div class="main-footer">
        <p>© 2020 Ateneo de Naga University</p>
    </div>
    
    <script src="script.js"></script>
</body>