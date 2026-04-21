<?php
session_start();
if(!isset($_SESSION["username"]))
{
header("Location: index.php");
exit(); }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AdrNews - Wiadomości i artykuły</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Wadomości i artykuł" name="keywords">
    <meta content="Wiadomości i artykuł" name="description">

    <!-- to ten mały obrazek w nazwie karty -->
    <link href="img/favicon.ico" rel="icon">

    <!-- google fonts web czcionka Montserrat -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- font awesome (to sa ikonki ich animacje np. zamalowane budki jak jesteśmy w jakiejs podkategorii albo zakladce) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- owl carousel (ladne przejscia, suwaki itp. ) -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- zmodyfikowany bootstrap -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- górny pasek start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" a href="#">2 Luty Środa, 2023</a>
                           
                        </li>
                        <li class="nav-item border-right border-secondary">
                 
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2"> 
                        <li class="nav-item">
                            <a class="nav-link text-body" a href="https://twitter.com/?lang=pl"  target="_blank"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" a href="https://facebook.com/?lang=pl"  target="_blank"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" a href="https://linkedin.com/?lang=pl"  target="_blank"><small class="fab fa-linkedin-in"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" a href="https://instagram.com/?lang=pl"  target="_blank"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" a href="https://myaccount.google.com/?utm_source=sign_in_no_continue&pli=1"  target="_blank"><small class="fab fa-google-plus-g"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://youtube.com/?lang=pl"  target="_blank"><small class="fab fa-youtube"></small></a>
                        </li> <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="logout.php">Wyloguj</a>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="index.php" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-primary">Adr<span class="text-secondary font-weight-normal">News</span></h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
            </div>
        </div>
    </div>
    <!-- górny pasek koniec -->


    <!-- pasek nawigacyjny start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Adr<span class="text-white font-weight-normal">News</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Strona główna</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Kategorie</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="single.php" class="dropdown-item">Sport</a>
                            <a href="kultura.php" class="dropdown-item">Kultura i sztuka</a>
                            <a href="polityka.php" class="dropdown-item">Polityka</a>
                            <a href="rozrywka.php" class="dropdown-item">Rozrywka</a>
                            <a href="swiat.php" class="dropdown-item">Świat</a>
                            <a href="kuchnia.php" class="dropdown-item">Kuchnia</a>
                            <a href="celebryci.php" class="dropdown-item">Celebryci</a>

                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Kontakt</a>
                </div><?php echo "<p>Jesteś zalogowany jako <b> ".$_SESSION['username'].'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>'; ?>
                <form action="https://www.google.com/search" method="get" target="_blank">
                    <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                      <input type="text" class="form-control border-0" name="q" placeholder="Szukaj w Google">
                      <input type="hidden" name="cx" value="[ID wyszukiwarki Google Custom Search]">
                      <input type="hidden" name="ie" value="UTF-8">
                      <div class="input-group-append">
                        <button class="input-group-text bg-primary text-dark border-0 px-3" type="submit"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </form>
            </div>
        </nav>
    </div>
    <!-- pasek nawigacyjny koniec -->


    <!--glowne wiadomosci start  -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="img/news-800x500-1.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="single.php">Sport</a>
                                <a class="text-white" href="single.php">Sty 19, 2023</a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="single.php#ronaldo">Znamy termin debiutu Cristiano Ronaldo w Al-Nassr.</a>
                        </div>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="img/news-800x500-2.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="single.php">Sport</a>
                                <a class="text-white" href="single.php">Sty 22, 2023</a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="single.php#lewy">Lewandowski dorównał Ibrahimoviciowi. Co za wynik!</a>
                        </div>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="img/news-800x500-3.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="swiat.php">Świat</a>
                                <a class="text-white" href="swiat.php">Sty 20, 2023</a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="swiat.php#wypadek">Tragiczny wypadek z udziałem pojazdu armii USA. Dwie osoby nie żyją</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="img/news-700x435-1.jpg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="single.php">Sport</a>
                                    <a class="text-white" href="single.php"><small>Sty 23, 2023</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="single.php#swiatek">Iga Świątek nie podbije Melbourne. Mistrzyni Wimbledonu pokazała moc swojego returnu</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="img/news-700x435-2.jpg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="swiat.php">Świat</a>
                                    <a class="text-white" href="swiat.php"><small>Sty 23, 2023</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="swiat.php#alarm">Alarm bombowy na pokładzie samolotu lecącego z Katowic do Aten</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="img/news-700x435-3.jpg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="swiat.php">Świat</a>
                                    <a class="text-white" href="swiat.php"><small>Sty 22, 2023</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="swiat.php#zabojstwo">Zabójstwo 10-letniej dziewczynki. Do tragedii doszło w sobotę rano</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="img/news-700x435-4.jpg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="swiat.php">Świat</a>
                                    <a class="text-white" href="swiat.php"><small>Sty 23, 2023</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="swiat.php#zima">Zimowy paraliż na Podkarpaciu. Wciąż tysiące gospodarstw domowych jest bez prądu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- glowne wiadomosci koniec -->


    <!-- z ostatniej chwili start -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Z ostatniej chwili</div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px;">
                            <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="swiat.php#alarm">Alarm bombowy na pokładzie polskiego samolotu lecącego z Katowic do Aten</a></div>
                            <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="swiat.php#zima">Zima w Polsce. IMGW ostrzega. Prognoza zagrożeń na najbliższe dni</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- z ostatniej chwili koniec -->


    <!-- najnowsze wiadomosci start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Najnowsze Wiadomości</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="img/news-700x435-1.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="single.php">Sport</a>
                            <a class="text-white" href="single.php"><small>Sty 23, 2023</small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="single.php#swiatek">Iga Świątek nie podbije Melbourne. Mistrzyni Wimbledonu pokazała moc swojego returnu</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="img/news-700x435-2.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="swiat.php">Świat</a>
                            <a class="text-white" href="swiat.php"><small>Sty 23, 2023</small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="swiat.php#alarm">Alarm bombowy na pokładzie samolotu lecącego z Katowic do Aten</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="img/news-700x435-3.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="swiat.php">Świat</a>
                            <a class="text-white" href="swiat.php"><small>Sty 22, 2023</small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="swiat.php#zabojstwo">Zabójstwo 10-letniej dziewczynki. Do tragedii doszło w sobotę rano</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="img/news-700x435-4.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="swiat.php">Świat</a>
                            <a class="text-white" href="swiat.php"><small>Sty 23, 2023</small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="swiat.php#zima">Zimowy paraliż na Podkarpaciu. Wciąż tysiące gospodarstw domowych jest bez prądu</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="img/news-700x435-5.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="swiat.php">Świat</a>
                            <a class="text-white" href="swiat.php"><small>Jan 23, 2023</small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="swiat.php#ukraina">Ukraina. Najważniejsze wydarzenia ostatnich godzin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- najnowsze wiadomosci koniec -->


    <!-- o tym sie mowi / wraz z paskiem bocznym start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">O tym się mówi</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">Pokaż</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="img/news-700x435-1.jpg" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="single.php">Sport</a>
                                        <a class="text-body" href="single.php"><small>Sty 23, 2023</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="single.php#swiatek">Iga Świątek nie podbije Melbourne. Mistrzyni Wimbledonu pokazała moc swojego returnu</a>
                                    <p class="m-0">Iga Świątek nie wygra w tym roku Australian Open. W niedzielę w Melbourne polska tenisistka uległa Jelenie Rybakinie w starciu wielkoszlemowych mistrzyń.</p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                        <small>Adrian Dereń</small>
                                    </div>
                              
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="img/news-700x435-2.jpg" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="swiat.php">Świat</a>
                                        <a class="text-body" href="swiat.php"><small>Sty 23, 2023</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="swiat.php#alarm">Alarm bombowy na pokładzie samolotu lecącego z Katowic do Aten</a>
                                    <p class="m-0">"Na pokładzie samolotu linii Ryanair lecącego z Polski do Grecji zgłoszono alarm bombowy" - podała w niedzielę po południu agencja AFP. Maszyna wylądowała bezpiecznie na międzynarodowym lotnisku w Atenach. Specjalne jednostki policji dokonują inspekcji samolotu i bagażu.</p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                        <small>Adrian Dereń</small>
                                    </div>
                               
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="img/news-700x435-3.jpg" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="swiat.php">Świat</a>

                                        <a class="text-body" href="swiat.php"><small>Sty 23, 2023</small></a>
                                    </div>
                                    <a class="h4 d-block mb-0 text-secondary text-uppercase font-weight-bold" href="swiat.php#zabojstwo">Zabójstwo 10-letniej dziewczynki. Do tragedii doszło w sobotę rano</a>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                        <small>Adrian Dereń</small>
                                    </div>
                           
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="img/news-700x435-4.jpg" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="swiat.php">Świat</a>
                                        <a class="text-body" href="swiat.php"><small>Sty 23, 2023</small></a>
                                    </div>
                                    <a class="h4 d-block mb-0 text-secondary text-uppercase font-weight-bold" href="swiat.php#zima">Zimowy paraliż na Podkarpaciu. Wciąż tysiące gospodarstw domowych jest bez prądu</a>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                        <small>Adrian Dereń</small>
                                    </div>
                             
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="img/art1.png" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="swiat.php">Świat</a>
                                        <a class="text-body" href="swiat.php"><small>Sty 23 2023</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="swiat.php#oleksij">Ołeksij Daniłow ostrzega Ukrainę. "Chcą nas zniszczyć"</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="img/art2.png" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="kultura.php">Kultura i sztuka</a>
                                        <a class="text-body" href="kultura.php"><small>Sty 23 2023</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="kultura.php#jackson">Filmowa biografia Jacksona nie pominie kontrowersji</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="img/art3.png" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="rozrywka.php#">Rozrywka</a>
                                        <a class="text-body" href="rozrywka.php"><small>Sty 23 2023</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="rozrywka.php#cdprojekt">CD Projekt nie poskąpi pieniędzy na Cyberpunk 2077: Widmo Wolności</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="img/art4.png" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="celebryci.php">Celebryci</a>
                                        <a class="text-body" href="celebryci.php"><small>Sty 23 2023</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="celebryci.php#ksiazka">Zabójca Agnieszki Kotlarskiej wypożyczył książkę o jej sprawie.  </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                        </div>
                        <div class="col-lg-12">
                            <div class="row news-lg mx-0 mb-3">
                                <div class="col-md-6 h-100 px-0">
                                    <img class="img-fluid h-100" src="img/news-700x435-5.jpg" style="object-fit: cover;">
                                </div>
                                <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                                    <div class="mt-auto p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="swiat.php">Świat</a>
                                            <a class="text-body" href="swiat.php"><small>Sty 23 2023</small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="swiat.php#ukraina">Ukraina. Najważniejsze wydarzenia ostatnich godzin</a>
                                        <p class="m-0">Rosyjska inwazja na Ukrainę trwa od 332 dni. W Ramstein zakończyło się spotkanie grupy kontaktowej.</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                            <small>Adrian Dereń</small>
                                        </div>
                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="img/art10.png" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Rozrywka</a>
                                        <a class="text-body" href=""><small>Sty 23 2023</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="rozrywka.php#ferie">Ferie zimowe 2023! <br>- Terminy</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="img/art11.png" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="single.php">Sport</a>
                                        <a class="text-body" href="single.php"><small>Sty 23 2023</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="single.php#mundial">Słabe pożegnanie z mundialem. Polacy ograli Iran</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="img/art12.png" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="kuchnia.php">Kuchnia</a>
                                        <a class="text-body" href="kuchnia.php"><small>Sty 23 2023</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="kuchnia.php#jedzenie">Pyszne i kaloryczne – bakalie. Suszone owoce mają mnóstwo zalet</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="img/art13.png" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="swiat.php">Świat</a>
                                        <a class="text-body" href="swiat.php"><small>Sty 23 2023</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="swiat.php#kaliningrad">W Kaliningradzie bez zmian: inflacja, poszukiwanie zdrajców</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- o tym sie mowi koniec -->
                <div class="col-lg-4">
                    <!-- badz na biezaco (te wszystkie social media) start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Bądź na bieżąco</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <a href="https://www.facebook.com/" class="d-block w-100 text-white text-decoration-none mb-3" target="_blank" style="background: #39569E;">
                                <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">143,533 Polubień </span>
                            </a>
                            <a href="https://twitter.com/?lang=pl" class="d-block w-100 text-white text-decoration-none mb-3" target="_blank" style="background: #52AAF4;">
                                <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">103,332 Obserwujących</span>
                            </a>
                            <a href="https://pl.linkedin.com/" class="d-block w-100 text-white text-decoration-none mb-3" target="_blank"  style="background: #0185AE;">
                                <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">20,124 Członków</span>
                            </a>
                            <a href="https://www.instagram.com/" class="d-block w-100 text-white text-decoration-none mb-3" target="_blank"  style="background: #C8359D;">
                                <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">53,345 Obserwujących</span>
                            </a>
                            <a href="https://www.youtube.com/" class="d-block w-100 text-white text-decoration-none mb-3" target="_blank"  style="background: #DC472E;">
                                <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">27,642 Subskrybcji</span>
                            </a>
                            <a href="https://vimeo.com
                            " class="d-block w-100 text-white text-decoration-none" target="_blank"  style="background: #055570;">
                                <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">10,335 Obserwujących</span>
                            </a>
                        </div>
                    </div>
                    <!-- badz na biezaco (te wszystkie social media) koniec -->

                    <!-- reklamy start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Zobacz też:</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <a href="single.php#lewy"><img class="img-fluid" src="img/news-800x500-2.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- reklamy koniec -->

                    <!-- na czasie start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Na czasie</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="img/art5.png" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="polityka.php">Polityka</a>
                                        <a class="text-body" href="polityka.php"><small>Sty 23 2023</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="polityka.php#premier">Premier: nie będzie zgody Niemiec, zbudujemy mniejszą koalicję</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="img/art6.png" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="swiat.php">Świat</a>
                                        <a class="text-body" href="swiat.php"><small>Sty 23 2023</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="swiat.php#strzelanina">W USA doszło do strzelaniny podczas obchodów </a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="img/art7.png" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="polityka.php">Polityka</a>
                                        <a class="text-body" href="polityka.php"><small>Sty 23 2023</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="polityka.php#putin">Putin o zakończeniu wojny. czy to kolejny blef?</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="img/art8.png" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="single.php">Sport</a>
                                        <a class="text-body" href="single.php"><small>Sty 23 2023</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="single.php#zyla">Puchar Świata w Sapporo. Piotr Żyła zajął ósme miejsce</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="img/art9.png" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="celebryci.php">Celebryci</a>
                                        <a class="text-body" href="celebryci.php"><small>Sty 23 2023</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="celebryci.php#ksiezycowy">Księżycowy człowiek się żeni. Wszystkiego najlepszego</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- na czasie koniec -->

                    <!-- tagi start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">
                                <a href="polityka.php" class="btn btn-sm btn-outline-secondary m-1">Polityka</a>
                                <a href="swiat.php" class="btn btn-sm btn-outline-secondary m-1">Świat</a>
                                <a href="kultura.php" class="btn btn-sm btn-outline-secondary m-1">Kultura i sztuka</a>
                                <a href="rozrywka.php" class="btn btn-sm btn-outline-secondary m-1">Rozrywka</a>
                                <a href="single.php" class="btn btn-sm btn-outline-secondary m-1">Sport</a>
                                <a href="celebryci.php" class="btn btn-sm btn-outline-secondary m-1">Celebryci</a>
                                <a href="kuchnia.php" class="btn btn-sm btn-outline-secondary m-1">Kuchnia</a>
        
                            </div>
                        </div>
                    </div>
                    <!-- tagi koniec -->
                </div>
            </div>
        </div>
    </div>
    <!-- koniec o tym sie mowi razem z bocznym paskiem -->


    <!-- to ta stopka na dole z informacjami itp. start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Adres</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Bohaterów Westerplatte 5a/7, Rzeszów, Polska</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>725 270 611</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>166724@stud.prz.edu.pl</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Znajdź nas</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://twitter.com/?lang=pl"  target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://facebook.com/?lang=pl"  target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://linkedin.com/?lang=pl"  target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://instagram.com/?lang=pl"  target="_blank"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="https://youtube.com" target ="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popularne newsy<h5>
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="swiat.php">Świat</a>
                        <a class="text-body" href=""><small>Sty 23 2023</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="swiat.php#kaliningrad">W Kaliningradzie bez zmian: inflacja, recesja, poszukiwanie zdrajców</a>
                </div>
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="celebryci.php">Celebryci</a>
                        <a class="text-body" href="celebryci.php"><small>Sty 23 2023</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="celebryci.php#ksiezycowy">Księżycowy człowiek się żeni. Wszystkiego najlepszego, panie Aldrin</a>
                </div>
                <div class="">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="single.php">Sport</a>
                        <a class="text-body" href="single.php"><small>Sty 23 2023</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="single.php#zyla">Puchar Świata w Sapporo. Piotr Żyła zajął ósme miejsce</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Kategorie</h5>
                <div class="m-n1">
                    <a href="polityka.php" class="btn btn-sm btn-secondary m-1">Polityka</a>
                    <a href="swiat.php" class="btn btn-sm btn-secondary m-1">Świat</a>
                    <a href="single.php" class="btn btn-sm btn-secondary m-1">Sport</a>
                    <a href="kultura.php" class="btn btn-sm btn-secondary m-1">Kultura i sztuka</a>
                    <a href="rozrywka.php" class="btn btn-sm btn-secondary m-1">Rozrywka</a>
                    <a href="kuchnia.php" class="btn btn-sm btn-secondary m-1">Kuchnia</a>
                    <a href="celebryci.php" class="btn btn-sm btn-secondary m-1">Celebryci</a>
    
                </div>
            </div>
     
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #070707;">
        <p class="m-0 text-center">&copy; Projekt aplikacje internetowe | Adrian Dereń | 166724 | Inżynieria i analiza danych |
		
	
		
    </div>
    <!-- stopka koniec -->


    <!-- strzalka do gory -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- sciezki do skryptow -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- szablon js -->
    <script src="js/main.js"></script>
</body>

</html>