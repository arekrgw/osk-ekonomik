<?php 

  require("api/database.php");

  $query = "SELECT * from data_kursu Where id_kurs=:id";

  $stmt = Db::fetch($query, array("id" => 1))->fetch(PDO::FETCH_ASSOC);

    
  $daysOfWeek = array("Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota", "Niedziela");
  $timeinint = strtotime($stmt['data_kursu']);
  $exp = explode(":",$stmt['godzina_kursu']);
  $fullTime = strtotime("+".$exp[0]." hour +".$exp[1]." minutes", $timeinint);

    $current = time();
    if($current < $fullTime){
      $date = str_replace("-", ".", $stmt['data_kursu']);
      $dayOfWeek = $daysOfWeek[date("N", $timeinint)-1];
      $time = $stmt['godzina_kursu'];
      $outString = "Najbliższy termin rozpoczęcia kursu na prawo jazdy: $date r. ($dayOfWeek) o godz. $time. w ".$stmt['miejsce_kursu'];
    }
    else{
      $outString = "Kolejny kurs już niebawem!";
    }


?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta name="description" content="Ośrodek Szkolenia Kierowców Ekonomik w Skierniewicach">
    <meta name="keywords" content="Ośrodek szkolenia kierowców OSK Ekonomik Paweł Bełc Skierniewice Nauka Jazdy Najlepsza Szkoła w Skierniewicach Szkoła Jazdy OSK ekonomik">
    <meta name="author" content="Arkadiusz Pawlak">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OSK Ekonomik</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="main.min.css">

    <link href="https://fonts.googleapis.com/css?family=Exo:800" rel="stylesheet">

    <link rel="shortcut icon" href="imgs/favicon/favicon.ico">
  	<link rel="icon" sizes="16x16 32x32 64x64" href="imgs/favicon/favicon.ico">
  	<link rel="icon" type="image/png" sizes="196x196" href="imgs/favicon/favicon-192.png">
  	<link rel="icon" type="image/png" sizes="160x160" href="imgs/favicon/favicon-160.png">
  	<link rel="icon" type="image/png" sizes="96x96" href="imgs/favicon/favicon-96.png">
  	<link rel="icon" type="image/png" sizes="64x64" href="imgs/favicon/favicon-64.png">
  	<link rel="icon" type="image/png" sizes="32x32" href="imgs/favicon/favicon-32.png">
  	<link rel="icon" type="image/png" sizes="16x16" href="imgs/favicon/favicon-16.png">
  	<link rel="apple-touch-icon" href="imgs/favicon/favicon-57.png">
  	<link rel="apple-touch-icon" sizes="114x114" href="imgs/favicon/favicon-114.png">
  	<link rel="apple-touch-icon" sizes="72x72" href="imgs/favicon/favicon-72.png">
  	<link rel="apple-touch-icon" sizes="144x144" href="imgs/favicon/favicon-144.png">
  	<link rel="apple-touch-icon" sizes="60x60" href="imgs/favicon/favicon-60.png">
  	<link rel="apple-touch-icon" sizes="120x120" href="imgs/favicon/favicon-120.png">
  	<link rel="apple-touch-icon" sizes="76x76" href="imgs/favicon/favicon-76.png">
  	<link rel="apple-touch-icon" sizes="152x152" href="imgs/favicon/favicon-152.png">
  	<link rel="apple-touch-icon" sizes="180x180" href="imgs/favicon/favicon-180.png">
  	<meta name="msapplication-TileColor" content="#FFFFFF">
  	<meta name="msapplication-TileImage" content="imgs/favicon/favicon-144.png">
  	<meta name="msapplication-config" content="/browserconfig.xml">
  </head>
  <body data-spy="scroll" data-target="#mainNav" data-offset="100">

    <main class="container-fluid wrapper">
    <!-- NAVBAR -->
      <nav id="mainNav" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

        <a class="navbar-brand" href="#start">
          <img class="img-fluid" src="imgs/brand-logo-small.png">
          <span class="sr-only">OSK Ekonomik</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto  ">
            <li class="nav-item">
              <a class="nav-link" href="#start">START <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">O NAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#oferta">OFERTA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#gallery">GALERIA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#faq">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">KONTAKT</a>
            </li>
            <li class="nav-item calendar">
              <a class="nav-link" href="calendar.html" target="_blank">KALENDARZ</a>
            </li>
          </ul>

        </div>
      </nav>
  <!-- END NAVBAR -->
  <!-- LANDING -->
      <header id="start" class="landing-page">

        <div class="top-bar"><?php echo $outString; ?></div>

        <div class="main-landing">
          <img src="imgs/brandlogo.png" class="img-fluid" alt="OSK Ekonomik">
          <span class="sr-only">OSK Ekonomik</span>
          <a href="#about">
            <i class="fas fa-chevron-down"></i>
          </a>
        </div>
      </header>
  <!-- END LANDING -->
  <!-- ONAS -->
        <section id="about" class="container about">
          <div class="row"><h2 class="text-center">O NAS</h2></div>
          <div class="row">
            <div class="about-description mx-auto">
              <p>Ośrodek szkolenia kierowców <span class="marked">Ekonomik</span> to miejsce dla Ciebie przyszły kierowco. Szkoła od lat zajmuje się <span class="marked">profesjonalnym</span> szkoleniem kierowców w różnych kategoraich. Do każdego kursanta mamy <span class="marked">indywidualne</span> podejście, nie podążamy według schematów. Naszym <span class="marked">priorytetem</span> jest jak najlepsze przygotowanie do egzaminu państwowego. <span class="marked">Nagrodą</span> dla nas jest <span class="marked">pozytywny</span> wynik kursanta na egzaminie oraz jego <span class="marked">zadowolenie</span> ze spędzonego z nami czasu.
              </p>
            </div>
          </div>
        </section>
<!-- END ONAS -->
<!--OFERTA -->
        <section id="oferta" class="container oferta">
          <div class="row"><h2 class="text-center">ZAPISZ SIĘ!</h2></div>

          <div class="row padoff">

          <?php 
          $prices = Db::fetch("SELECT * FROM ceny_kursow")->fetchAll(PDO::FETCH_ASSOC);

          foreach($prices as $price) {
            $slug = $price['slug'];
            $cena = $price['cena'];
            $hours = $price['ilosc_godz'];
            $nazwa = $price['nazwa'];
            if($slug == "db") {
              echo <<<EOL
              <div class="col-md-4 col-sm-6 offering $slug">
              <div class="innerd">Kat. D<br><span class="small">z kat.B </span>$cena zł/$hours h<br>
              EOL;
            }
            else if($slug == "dc") {
              echo <<<EOL
                <span class="small">z kat.C </span>$cena zł/$hours h</div>
                </div>
              EOL;
            }
            else if($slug == "a1") {
              echo <<<EOL
              <div class="col-md-4 col-sm-6 offering $slug">
                <div class="innerd">Kat. A1 $cena zł/$hours h<br>
              EOL;
            }
            else if($slug == "a2") {
              echo <<<EOL
                Kat. A2 $cena zł/$hours h</div>
                </div> 
              EOL;
            }
            else if($slug == "t") {
              echo <<<EOL
              <div class="col-md-4 col-sm-12 col-xs-12 offering $slug">
                <div class="innerd">Kat. T<br>$cena zł/$hours h</div>
              </div>
              EOL;
            }
            else {
              echo <<<EOL
                <div class="col-md-4 col-sm-6 offering $slug">
                  <div class="innerd">Kat. $nazwa<br>$cena zł/$hours h</div>
                </div>
            
            EOL;
            }
            
          }
          
          
          ?>
            

            <div class="col-xs-12 bonus text-center">Cena dodatkowych godzin jest uzgadniana osobiście</div>

          </div>

        </section>
    <!-- END OFERTA -->
    <!-- GALERIA -->
        <section id="gallery" class="gallery padoff">
          <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="imgs/gallery/house.jpg" alt="Dom">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="imgs/gallery/cars2.jpg" alt="Auta Nauki Jazdy">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="imgs/gallery/cars1.jpg" alt="Auta Nauki Jazdy">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="imgs/gallery/cars3.jpg" alt="Auta Nauki Jazdy">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="imgs/gallery/truck.jpg" alt="Ciezarowka Nauki Jazdy">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="imgs/gallery/cars4.jpg" alt="Ciezarowka Nauki Jazdy">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="imgs/gallery/bike1.png" alt="Motocykl Nauki Jazdy">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="imgs/gallery/bike2.png" alt="Motocykl Nauki Jazdy">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="imgs/gallery/bike3.png" alt="Motocykl Nauki Jazdy">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Poprzednie</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Następne</span>
              </a>
            </div>
          </div>
        </section>
    <!-- END GALERIA -->
    <!-- FAQ -->
        <section id="faq" class="container faq">
          <div class="row"><h2 class="text-center">Często zadawane pytania</h2></div>
          <div class="row padoff">
            <div class="col-xs-12 qa">

              <p class="question">Kiedy mogę się zapisać na kurs?</p>
              <p class="answer">- Na kurs można zapisywać się 3 miesiące przed ukończeniem 18 roku życia.</p>
              <hr class="hr-faq">

              <p class="question">Kiedy mogę zdawać egzamin praktyczny?</p>
              <p class="answer">- Egzamin praktyczny można zdawać miesiąc przed ukończeniem 18 roku życia.</p>
              <hr class="hr-faq">

              <p class="question">Czego potrzebuję by zapisać się na kurs?</p>
              <p class="answer">- Wystarczy przyjść na pierwsze spotkanie oraz potem dostarczyć <a href="" download="zgodarodzicow">zgodę rodziców</a> jeżeli nie jesteś pełnoletni.</p>
              <hr class="hr-faq">

              <p class="question">Czy można zapłacić za kurs w ratach?</p>
              <p class="answer">- Tak, można płacić w ratach w dowolnej wielkości.</p>
              <hr class="hr-faq">

              <p class="question">Czy ośrodek pracuje w weekendy?</p>
              <p class="answer">- Tak, pracujemy w weekendy.</p>
              <hr class="hr-faq">

            </div>
          </div>
        </section>
    <!-- KONTAKT -->
        <section id="contact" class="container contact padoff">
          <div class="row"><h2 class="text-center">Nadal masz pytanie?</h2></div>
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <ul class="dane">
                <li><i class="fas fa-car"></i><strong>OSK Ekonomik</strong></li>
                <li><i class="fas fa-building"></i>Skierniewice</li>
                <li><i class="fas fa-road"></i>Miedniewice 7A</li>
                <li><i class="fas fa-phone"></i>Paweł Bełc: tel. 601 338 873</li>
                <li><i class="fas fa-at"></i>osk-ekonomik@gmail.com</li>
                <li><i class="fas fa-at"></i>belcpawel@gmail.com</li>
                <li><i class="fas fa-credit-card"></i>02 1050 1924 1000 0092 2478 1279</li>
              </ul>
            </div>
            <div class="col-lg-6 col-md-12">
              <div id="map_wrapper">
                  <div id="map" class="mapping"></div>
              </div>
            </div>
          </div>
        </section>
    <!-- END KONTAKT -->
    <!-- STOPKA -->
        <footer class="container-fluid footer">

          <div class="row">
            <a href="https://www.facebook.com/OSK-Ekonomik-175956562597919/?fref=ts" class="fblink" target="_blank">Odwiedź nas na <span class="fbfont">facebook'u</span>
            </a>
          </div>

          <div class="container footer-padding">
            <div class="row">
              <div class="col-md-4 col-sm-12">
                <ul class="foot_nav">
                  <li><a href="https://info-car.pl/infocar/konto/word/rezerwacja.html" target="_blank">Zapisz się na egzamin</a></li>
                  <li><a href="https://info-car.pl/infocar/prawo-jazdy/sprawdz-status.html" target="_blank">Sprawdź status prawa jazdy</a></li>
                </ul>
              </div>

              <div class="col-md-8 col-sm-12">
                <p class="design">Wszelkie prawa zastrzeżone &copy; 2018<br>Autor: <a target="_blank" href="http://arek-portfolio.pl">Arkadiusz Pawlak</a></p>
              </div>
            </div>
          </div>
        </footer>

    </main><!-- END MAIN WRAPPER -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyxlvQ9tIGRFWobOqQ7RzW2gWaDzQixi8&callback=initMap">
    </script>
    <script src="js/app.min.js"></script>
  </body>
</html>
