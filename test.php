<?php 
  $con = new PDO("mysql:host=sql.ekonomik.nazwa.pl;dbname=ekonomik", "ekonomik_android", "Ekonomik7A");

  $query = "SELECT date, timek from struktura Where type=:type";
  $stmt = $con->prepare($query);
  $stmt->execute(array("type" => "datakursu"));

  $stmt = $stmt->fetch(PDO::FETCH_ASSOC);

    
  $daysOfWeek = array("Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota", "Niedziela");
  $timeinint = strtotime($stmt['date']);
  $exp = explode(":",$stmt['timek']);
  $fullTime = strtotime("+".$exp[0]." hour +".$exp[1]." minutes", $timeinint);

    $current = time();
    if($current < $fullTime){
      $date = str_replace("-", ".", $stmt['date']);
      $dayOfWeek = $daysOfWeek[date("N", $timeinint)-1];
      $time = $stmt['timek'];
      $outString = "Najbliższy termin rozpoczęcia kursu na prawo jazdy: $date r. ($dayOfWeek) o godz. $time. w LO im. B.Prusa sala nr 3";
    }
    else{
      $outString = "Kolejny kurs już niebawem!";
    }
  $con = null;

?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta name="description" content="Ośrodek Szkolenia Kierowców Ekonomik w Skierniewicach">
    <meta name="keywords" content="Ośrodek szkolenia kierowców, OSK, Ekonomik, Paweł Bełc, Skierniewice, Nauka Jazdy, Najlepsza Szkoła w Skierniewicach, Szkoła Jazdy, OSK ekonomik">
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

    <div class="container-fluid wrapper">
    <!-- NAVBAR -->
      <nav id="mainNav" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

        <a class="navbar-brand" href="#start"><img class="img-fluid" src="imgs/brand-logo-small.png"></a>

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
      <div id="start" class="landing-page">

        <div class="top-bar"><?php echo $outString; ?></div>

        <div class="main-landing">
          <img src="imgs/brandlogo.png" class="img-fluid" alt="OSK Ekonomik">

          <a href="#about">
            <i class="fas fa-chevron-down"></i>
          </a>
        </div>
        </div>
  <!-- END LANDING -->
  <!-- ONAS -->
        <div id="about" class="container about">
          <div class="row"><h2 class="text-center">O NAS</h2></div>
          <div class="row">
            <div class="about-description mx-auto">
              <p>Ośrodek szkolenia kierowców <span class="marked">Ekonomik</span> to miejsce dla Ciebie przyszły kierowco. Szkoła od lat zajmuje się <span class="marked">profesjonalnym</span> szkoleniem kierowców w różnych kategoraich. Do każdego kursanta mamy <span class="marked">indywidualne</span> podejście, nie podążamy według schematów. Naszym <span class="marked">priorytetem</span> jest jak najlepsze przygotowanie do egzaminu państwowego. <span class="marked">Nagrodą</span> dla nas jest <span class="marked">pozytywny</span> wynik kursanta na egzaminie oraz jego <span class="marked">zadowolenie</span> ze spędzonego z nami czasu.
              </p>
            </div>
          </div>
        </div>
<!-- END ONAS -->
<!--OFERTA -->
        <div id="oferta" class="container oferta">
          <div class="row"><h2 class="text-center">ZAPISZ SIĘ!</h2></div>

          <div class="row padoff">
            <div class="col-md-4 col-sm-6 offering four">
              <div class="innerd">Kat. B<br>1200zł/30h</div>
            </div>

            <div class="col-md-4 col-sm-6 offering one">
              <div class="innerd">Kat. AM<br>400zł/5h</div>
            </div>

            <div class="col-md-4 col-sm-6 offering three">
              <div class="innerd">Kat. A 1200zł/20h<br>Kat. A1 1000zł/20h<br>Kat. A2 1200zł/20h</div>
            </div>

            <div class="col-md-4 col-sm-6 offering five">
              <div class="innerd">Kat. B+E<br>800zł/15h</div>
            </div>

            <div class="col-md-4 col-sm-6 offering six">
              <div class="innerd">Kat. C<br>2000zł/30h</div>
            </div>

            <div class="col-md-4 col-sm-6 offering seven">
              <div class="innerd">Kat. C+E<br>1800zł/25h</div>
            </div>

            <div class="col-md-4 col-sm-6 offering seven">
              <div class="innerd">Kat. C+C+E<br>3200zł/45h</div>
            </div>

            <div class="col-md-4 col-sm-6 offering eight">
              <div class="innerd">Kat. D<br><span class="small">z kat.B </span>3800zł/60h<br><span class="small">z kat.C </span>3000zł/40h</div>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 offering nine">
              <div class="innerd">Kat. T<br>1100zł/20h</div>
            </div>

            <div class="col-xs-12 bonus text-center">Cena dodatkowych godzin jest uzgadniana osobiście</div>

          </div>

        </div>
    <!-- END OFERTA -->
    <!-- GALERIA -->
        <div id="gallery" class="gallery padoff">
          <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="imgs/gallery/dom.png" alt="Budynek Ośrodka">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="imgs/gallery/gladius.png" alt="Gladius">
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
        </div>
    <!-- END GALERIA -->
    <!-- FAQ -->
        <div id="faq" class="container faq">
          <div class="row"><h2 class="text-center">Często zadawane pytania</h2></div>
          <div class="row padoff">
            <div class="col-xs-12">

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
        </div>
    <!-- KONTAKT -->
        <div id="contact" class="container contact padoff">
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
              </ul>
            </div>
            <div class="col-lg-6 col-md-12">
              <div id="map_wrapper">
                  <div id="map" class="mapping"></div>
              </div>
            </div>
          </div>
        </div>
    <!-- END KONTAKT -->
    <!-- STOPKA -->
        <div class="container-fluid footer">

          <div class="row">
            <a href="https://www.facebook.com/OSK-Ekonomik-175956562597919/?fref=ts" class="fblink" target="_blank">Odwiedź nas na <span class="fbfont">facebook'u</span></a>
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
        </div>

    </div><!-- END MAIN WRAPPER -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="datarozpoczeciakursu.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyxlvQ9tIGRFWobOqQ7RzW2gWaDzQixi8&callback=initMap">
    </script>
    <script src="js/app.min.js"></script>
  </body>
</html>
