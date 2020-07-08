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
    include 'Insert.php';

    $sql = "SELECT * FROM table1";
    $result = mysqli_query($conn, $sql)or die(mysqli_error());
?>

<!DOCTYPE html>
<head>
    <title>
        Data
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
            Data
        </h1>
    </div>
    
    <!--Card Data-->
    <div class="card card-data">
        <div class="card-body">
           
            <!--Show Table-->
            <form method = "post"> 
                <table class="table table-hover">
                    <tr>
                        <th scope="col" class="col-data">#</th>
                        <th scope="col" class="col-data">Age</th>
                        <th scope="col" class="col-data">Gender</th>
                        <th scope="col" class="col-data">Barangay</th>
                        <th scope="col" class="col-data">Traveled Abroad?</th>
                        <th scope="col" class="col-data">Close Contact?</th>
                        <th scope="col" class="col-data">Symptoms</th>
                        <th scope="col" class="col-data"></th>
                        <th scope="col" class="col-data"></th>
                    </tr>

                    <!--Fetch Data-->        
                    <?php
                        $sql = "SELECT * FROM table1";
                        $result = mysqli_query($conn, $sql)or die(mysqli_error());

                        while ($row = mysqli_fetch_array($result)) {
                    ?>    
                            <tr>
                            <td><?php echo $row["Submit_ID"]; ?></td>
                            <td><?php echo $row["Age"]; ?></td>
                            <td><?php echo $row["Gender"]; ?></td>
                            <td><?php echo $row["Barangay"]; ?></td>
                            <td><?php echo $row["Traveled_Abroad"]; ?></td>
                            <td><?php echo $row["Close_Contact"]; ?></td>
                            <td><?php echo $row["Symptoms"]; ?></td>
                            <td><a class="btn btn-success" href="Edit.php?Submit_ID=<?php echo $row["Submit_ID"]; ?>">Edit</a></td>
                            <td><a class="btn btn-danger" href="Delete.php?Submit_ID=<?php echo $row["Submit_ID"]; ?>">Delete</a></td>
                            </tr>
                            
                    <?php  
                        } 
                        mysqli_close($conn);
                    ?>
                </table>
            </form>
        </div>
    </div>
        
    <!--Footer-->
    <div class="main-footer">
        <p>© 2020 Ateneo de Naga University</p>
    </div>
</body>