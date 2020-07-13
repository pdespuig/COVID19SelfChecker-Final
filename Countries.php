<!--                                    
    Author           :  Paul Romeo R. Despuig                                         
    Year and Course  :  2 - BSIT
    Subject          :  ITMC231 Platform Technologies
    Honor Code       :  This is my own work and I have not received any unauthorized help in completing this. 
                        I have not copied from my classmate, friend, nor any unauthorized resource. I am well 
                        aware of the policies stipulated in the handbook regarding academic dishonesty. If 
                        proven guilty, I won't be credited any points for this endeavor.
-->

<!DOCTYPE html>
<head>
    <title>
        Countries / COVID-19 Self Checker
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
                    <a class="nav-item nav-link" href="News.php">
                        <h2>
                            News
                        </h2>
                    </a>
                    <a class="nav-item nav-link" href="Countries.php">
                        <h2>
                            Countries
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
            COVID-19 Information by Country
        </h1>
    </div>
    
    <!--Card Country-->
    <div class="card card-country">
        <div class="card-body">
            <?php $json_string = file_get_contents("https://coronavirus-19-api.herokuapp.com/countries"); ?>
            <?php $parsed_json = json_decode($json_string, true); ?>

            <table class="table table-hover">
               <thead>
                    <tr>
                        <th scope="col">Country</th>
                        <th scope="col">Cases</th>
                        <th scope="col">Deaths</th>
                        <th scope="col">Recovered</th>
                        <th scope="col">Active</th>
                        <th scope="col">Critical</th>
                        <th scope="col">Total Tests</th>
                    </tr>
                </thead>
                 
                <tbody>
                    <?php foreach ($parsed_json as $value){ ?> 
                        <tr>
                          <td><?php echo $value['country']; ?> </td>
                          <td><?php echo number_format($value['cases']); ?></td>
                          <td><?php echo number_format($value['deaths']); ?></td>
                          <td><?php echo number_format($value['recovered']); ?> </td>
                          <td><?php echo number_format($value['active']); ?></td>
                          <td><?php echo number_format($value['critical']); ?></td>
                          <td><?php echo number_format($value['totalTests']); ?> </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> 
        </div>
    </div>
    
    <!--Footer-->
    <div class="main-footer">
        <p>© 2020 Ateneo de Naga University</p>
    </div>
</body>