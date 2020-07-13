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
        Frequently Asked Questions / COVID-19 Self Checker
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
            Frequently Asked Questions (FAQs)
        </h1>
    </div>

    <!--Card FAQs-->
    <div class="card card-faqs">
        <div class="card-body">
            <!--Global COVID-19 INFO API-->
            <h5 class="card-grand-title">
                GLOBAL COVID-19 INFORMATION
            </h5>
            
            <?php $json_string = file_get_contents("https://coronavirus-19-api.herokuapp.com/all"); ?>
            <?php $parsed_json = json_decode($json_string, true); ?>
        
            <div class="card-stats-1">
                <img class="card-img-top" src="https://th.boell.org/sites/default/files/grid/2020/04/15/11.jpg">
                <div class="stats-cap-1">
                    CASES
                </div>
                <div>
                    <p class="stats">
                        <?php echo number_format($parsed_json['cases']); ?> 
                    </p>
                </div>
            </div>
            <div class="card-stats-2">
                <img class="card-img-top" src="https://static.euronews.com/articles/stories/04/61/76/02/602x338_cmsv2_0bc17b69-d198-5281-9622-27370547b370-4617602.jpg">
                <div class="stats-cap-2">
                    DEATHS
                </div>
                <div>
                    <p class="stats">
                        <?php echo number_format($parsed_json['deaths']); ?> 
                    </p>
                </div>
            </div>
            <div class="card-stats-3">
                <img class="card-img-top" src="https://i.insider.com/5e7ba2f5487c2211ce375394?width=1100&format=jpeg&auto=webp">
                <div class="stats-cap-3">
                    RECOVERED
                </div>
                <div>
                    <p class="stats">
                        <?php echo number_format($parsed_json['recovered']); ?> 
                    </p>
                </div>
            </div>
            
            <h5 class="card-title">
                What is a novel coronavirus?
            </h5>
            <p class="card-text text-faqs">
                A novel coronavirus is a new coronavirus that has not been previously identified. 
                The virus causing coronavirus disease 2019 (COVID-19), is not the same as the 
                coronaviruses that commonly circulate among humans and cause mild illness, like the common cold.
            </p>
            <h5 class="card-title">
                Why is the disease being called coronavirus disease 2019, COVID-19?
            </h5>
            <p class="card-text text-faqs">
                On February 11, 2020 the World Health Organization announced an official name for the disease that is 
                causing the 2019 novel coronavirus outbreak, first identified in Wuhan China. The new name of this 
                disease is coronavirus disease 2019, abbreviated as COVID-19. In COVID-19, ‘CO’ stands for ‘corona,’ 
                ‘VI’ for ‘virus,’ and ‘D’ for disease. Formerly, this disease was referred to as “2019 novel coronavirus” 
                or “2019-nCoV”.
            </p>
            <p class="card-text text-faqs">
                There are many types of human coronaviruses including some that commonly cause mild upper-respiratory tract 
                illnesses. COVID-19 is a new disease, caused by a novel (or new) coronavirus that has not previously been seen
                in humans.
            </p>
            <h5 class="card-title">
                Who is at higher risk for severe illness?
            </h5>
            <p class="card-text text-faqs">
                COVID-19 is a new disease and there is limited information regarding risk factors for severe disease. 
                Based on currently available information and clinical expertise, older adults and people of any age who have 
                serious underlying medical conditions might be at higher risk for severe illness from COVID-19.
            </p>
            <h5 class="card-title">
                How does the virus spread?
            </h5>
            <p class="card-text text-faqs">
                The virus that causes COVID-19 is thought to spread mainly from person to person, mainly through respiratory 
                droplets produced when an infected person coughs, sneezes, or talks. These droplets can land in the mouths or 
                noses of people who are nearby or possibly be inhaled into the lungs. Spread is more likely when people are in 
                close contact with one another (within about 6 feet).
            </p>
            <p class="card-text text-faqs">
                COVID-19 seems to be spreading easily and sustainably in the community (“community spread”) in many affected 
                geographic areas. Community spread means people have been infected with the virus in an area, including some 
                who are not sure how or where they became infected.
            </p>
            <h5 class="card-title">
                How can I help protect myself?
            </h5>
            <p class="card-text text-faqs">
                DOH advises the public to practice protective measures. It is still the best way to protect oneself against COVID-19.
            </p>
            <ol type="a">
                <li>
                    Practice frequent and proper handwashing - wash hands often with soap and water for at least 20 seconds. 
                    Use an alcohol-based hand sanitizer if soap and water are not available.
                </li>
                <li>
                    Practice proper cough etiquette.
                    <ol type="i">
                        <li>
                            Cover mouth and nose using tissue or sleeves/bend of the elbow when coughing or sneezing.
                        </li>
                        <li>
                            Move away from people when coughing.
                        </li>
                        <li>
                            Do not spit.
                        </li>
                        <li>
                            Throw away used tissues properly.
                        </li>
                        <li>
                            Always wash your hands after sneezing or coughing.
                        </li>
                        <li>
                            Use alcohol/sanitizer.
                        </li>
                    </ol>
                </li>
                <li>
                    Maintain distance of at least one meter away from individual/s experiencing respiratory symptoms.
                </li>
                <li>
                    Avoid unprotected contact with farm or wild animals (alive or dead), animal markets, and products 
                    that come from animals (such as uncooked meat).
                </li>
                <li>
                    Ensure that food is well-cooked.
                </li>
            </ol>
            <h5 class="card-title">
                Is there a treatment and vaccine for COVID-19?
            </h5>
            <p class="card-text text-faqs">
                Not yet. As of now, there is no specific treatment for or vaccine against COVID-19. However, many of the 
                symptoms can be treated based on the patient’s clinical conditions. Supportive care for infected persons
                is highly effective. Most of those infected have recovered with only supportive care.
            </p>
            <p class="card-text text-faqs">
                Vaccines and specific drug treatments are currently being developed and are tested through clinical trials. 
                WHO and DOH are coordinating with those who are developing the vaccines and medicines to determine possible 
                availability of these resources.
            </p>
            <p class="card-text text-faqs">
                On the other hand, DOH continuously advises the public to frequently clean or wash  hands, cover cough with 
                a tissue or the bend of the elbow, and maintain a distance of at least one meter from people who are coughing
                or sneezing (for more information, see Section on protective and preventive measures).
            </p>
            <h5 class="card-title">
                How can my family and I prepare for COVID-19?
            </h5>
            <p class="card-text text-faqs">
                Create a household plan of action to help protect your health and the health of those you care about in the 
                event of an outbreak of COVID-19 in your community:
            </p>
            <ol type="a">
                <li>
                    Talk with the people who need to be included in your plan, and discuss what to do if a COVID-19 outbreak 
                    occurs in your community.
                </li>
                <li>
                    Plan ways to care for those who might be at greater risk for serious complications, particularly older 
                    adults and those with severe chronic medical conditions like heart, lung or kidney disease.
                    <ol type="i">
                        <li>
                            Make sure they have access to several weeks of medications and supplies in case you need to stay home 
                            for prolonged periods of time.
                        </li>
                    </ol>
                </li>
                <li>
                    Get to know your neighbors and find out if your neighborhood has a website or social media page to stay connected.
                </li>
                <li>
                    Create a list of local organizations that you and your household can contact in the event you need access to information,
                    healthcare services, support, and resources.
                </li>
                <li>
                    Create an emergency contact list of family, friends, neighbors, carpool drivers, health care providers, teachers, employers, 
                    the local public health department, and other community resources.
                </li>
            </ol>
            <h5 class="card-title">
                What are the symptoms and complications that COVID-19 can cause?
            </h5>
            <p class="card-text text-faqs">
                People with COVID-19 have had a wide range of symptoms reported – ranging from mild symptoms to severe illness. Symptoms may appear 
                2-14 days after exposure to the virus. People with these symptoms may have COVID-19:
            </p>
            <ul>
                <li>Fever or chills</li>
                <li>Cough</li>
                <li>Shortness of breath or difficulty breathing</li>
                <li>Fatigue</li>
                <li>Muscle or body aches</li>
                <li>Headache</li>
                <li>New loss of taste or smell</li>
                <li>Sore throat</li>
                <li>Congestion or runny nose</li>
                <li>Nausea or vomiting</li>
                <li>Diarrhea</li>
            </ul> 
        </div>
    </div>

    <!--Footer-->
    <div class="main-footer">
        <p>© 2020 Ateneo de Naga University</p>
    </div>
</body>