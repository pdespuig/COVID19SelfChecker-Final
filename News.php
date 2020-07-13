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
        News / COVID-19 Self Checker
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
            Latest News
        </h1>
    </div>
    
    <!--Card News-->
    <div class="card card-news">
        <div class="card-body">
            <?php set_time_limit(300); ?>
            <?php $json_string = file_get_contents("http://newsapi.org/v2/top-headlines?country=ph&category=health&apiKey=7a7bdf4c77b54d07877a2e536dd2e502"); ?>
            <?php $parsed_json = json_decode($json_string, true); ?>
            
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="card-grand-title">TOP HEALTH HEADLINES FROM THE PHILIPPINES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($parsed_json['articles'] as $a){ ?>
                        <tr>
                            <td>
                                <?php 
                                    $pic = $a['urlToImage'];
                                    if (@getimagesize($pic)){
                                        echo "<img class='news-img' src='" . $pic . "' class='news-img'>";
                                    } else {
                                        echo " ";
                                    }
                                ?> 
                                <p class="news-info-title">
                                    <?php echo $a['title']; ?>
                                </p>
                                <p class="news-info-text"> 
                                    <?php echo $a['description']; ?>
                                </p> 
                                <p class="news-info-text">
                                    <?php echo $a['content']; ?> <?php echo "<a href=" . $a['url'] . ">Click for more</a>"; ?>
                                </p>
                                <p class="news-info-publish">
                                    <?php 
                                        $author = $a['author']; 
                                        if (strpos($author,'null')){
                                            echo " ";
                                        } else {
                                            echo $author;
                                        }
                                    ?>
                                    | Publised At: <?php echo date('F j, Y, g:i a', strtotime($a['publishedAt'])); ?>
                                </p>
                                <hr class="news-divide">
                            </td>
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
           