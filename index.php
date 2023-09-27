 <!DOCTYPE html>
<html lang="en">
    <head>
        <title>Portfolio Website-Serdar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- linking css file -->
        <link rel="stylesheet" href="style.css">
        <!-- bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/31149d48b0.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    </head>
    <body>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark navbarScroll">
            <div class="container">
                <a class="navbar-brand" href="#">Serdar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#portfolio">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
          <!-- main banner-->
    <section class="bgimage" id="home">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hero-text">
                    <h2 class="hero_title">Hallo, ik ben Serdar</h2>
                    <p class="hero_desc">Ik ben een software developer in opleiding</p>
                </div>
            </div>
        </div>
    </section>
    <!-- about section-->
    <section id="about">
        <div class="container mt-4 pt-4">
            <h1 class="text-center">About Me</h1>
            <div class="row mt-4">
                <div class="col-lg-4">
                    <img src="./images/Serdarpfp.jpeg" class= "imageAboutPage" alt="">
                </div>
                <div class="col-lg-8">
                    <p>Ik ben Serdar Saar. Ik vind programmeren heel erg leuk. Sinds kleins af aan vond ik het werken met computer heel erg leuk, later in de middelbare school Walburg College heb ik besloten om een Software Developer opleiding te doen.</p>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <ul>
                                <li>Naam: Serdar</li>
                                <li>Leeftijd: 18</li>
                                <li>Studie: Software Developer</li>

                            </ul>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <p> Ik kan de front-end en back-end van web development: HTML, CSS, en Javascript. Bootstrap is erg makkelijk om te gebruiken, en JQuery maakt Javascript simpeler. PHP is een van mijn favoriete talen op het moment. C# is leuk omdat je er veel meer mee kan doen behalve web development. En PHP maakt database connecties en dynamische websites mogelijk. Oh, ik kan ook redelijk om met MySQL. 
                        </p>
                    </div>
                </div>
            </div>
    </section>
    <!-- portfolio section-->
    <section id="portfolio">
        <div class="container mt-3">
            <h1 class="text-center">Portfolio</h1>
            <div class="row">
                <div class="col-lg-4 mt-4">
                    <div class="card">
                        <img class="card-img-top" src="images/phpcrud.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">PHP CRUD</h4>
                            <p class="card-text">Ik een Agenda gemaakt voor om je planning bij te houden.</p>
                            <div class="text-center">
                                <a href="https://87273.stu.sd-lab.nl/basis2/PHP/crud1/login.php" class="btn btn-success" target="_blank">Link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="card portfolioContent">
                        <img class="card-img-top" src="images/laravel.png" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">Laravel</h4>
                            <p class="card-text">Toen ik het met PHP kon, dacht ik laat ik het maar ook met PHP laravel proberen. Ik heb doormiddel van Laravel een CRUD applicatie gemaakt met PHP.</p>
                            <div class="text-center">
                                <a href="projecten/ToDoList.zip" class="btn btn-success">Download .Zip</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="card portfolioContent">
                        <img class="card-img-top" src="images/Cweb.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">C# Web</h4>
                            <p class="card-text">Ik heb voor C# Web een bestel website gemaakt.</p>
                            <div class="text-center">
                                <a href="projecten/CSharpweb.zip" class="btn btn-success">Download .Zip</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row mx-auto text-center">
                <div class="col-lg-4 mt-4">
                    <div class="card portfolioContent">
                        <img class="card-img-top" src="images/Microsoft-C-Sharp.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">C# Desktop</h4>
                            <p class="card-text">Voor C# Desk heb ik ook een soort CRUD gemaakt namelijk een boodschappenlijst.</p>
                            <div class="text-center">
                                <a href="projecten/CSharpDesk.zip" class="btn btn-success">Download .Zip</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="card portfolioContent">
                        <img class="card-img-top" src="images/cv1.png" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">CV</h4>
                            <p class="card-text">Hier kan je mijn CV zien.</p>
                            <div class="text-center">
                                <a href="projecten/SerdarCV.pdf" class="btn btn-success">CV overzicht</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section-->
      <hr>
      <section id="contact">
        <div class="container mt-3 contactContent">
          <h1 class="text-center">Contact</h1>
          <div class="row mt-4">
            <div class="col-lg-6 mx-auto">
              <!-- form fields -->
              <form name="contactFormEmail" method="post" action="contactProces.php">
                <input type="text" class="form-control form-control-lg" placeholder="Naam..." name="userName" maxlength="50" required id="userName">
                <input type="email" class="form-control mt-3" placeholder="Email..." name="userEmail"  required id="userEmail">
                <input type="text" class="form-control mt-3" placeholder="Onderwerp..." name="userSubject" maxlength="100" required id="userSubject">
                <div class="mb-3 mt-3">
                  <textarea class="form-control" rows="5" id="comment" name="userMessage" placeholder="Wat meer text..." maxlength="500" require id="userMessage"></textarea>
                </div>
                <button type="submit" class="btn btn-success mt-3" name="send" value="Submit">Stuur bericht</button>
              </form>
            </div>
          </div>
        </div>
      </section>
        <!-- footer section-->
        <footer id="footer">
            <div class="container-fluid">
                <!-- social media icons -->
                <div class="social-icons mt-4">
                    <a href="https://www.linkedin.com/in/thisisserdar/" target="_blank"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </footer>
        <!-- load javascript after loading all html content -->
        <script src="script/script.js"></script>
    </body>
</html>
    