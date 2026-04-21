<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Proszę wpisać hasło.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Nazwa użytkownika może zawierać tylko litery, cyfry i znaki podkreślenia.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Ta nazwa jest już w użyciu.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Ups! Coś poszło nie tak. Spróbuj ponownie później.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Proszę wpisać hasło";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Hasło musi zawierać 6 znaków";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Proszę potwierdzić hasło";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Hasła nie pasują do siebie";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index2.php");
            } else{
                echo "Ups! Coś poszło nie tak. Spróbuj ponownie później.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AdrNews - Rejestracja</title>

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
                        </li>
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


    <!-- nawigacyjny start -->
   <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Strona główna</a>
                 

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link  nav-item nav-link active" data-toggle="dropdown">Rejestracja</a>
                    
                    </div>
                
                    <a href="contact.php" class="nav-item nav-link">Kontakt</a>
                </div>
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
    </div><br>
    <!-- nawigacyjny koniec --><center>

        <h2>Zajerestuj się</h2>
        <p>Proszę uzupełnić formularz aby utworzyć konto.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nazwa użytkownika:</label>
                <input type="text" name="username" class="form-control  size="2"  style="width:30ex"<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Hasło:</label>
                <input type="password" name="password" class="form-control size="2"  style="width:30ex" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Powtórz hasło:</label>
                <input type="password" name="confirm_password" class="form-control size="2"  style="width:30ex" <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
  <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Utwórz">
                <input type="reset" class="btn btn-secondary ml-2" value="Wyczyść">
            </div>
            <p>Posiadasz już konto ? <a href="index.php">Zaloguj się</a>.</p>
        </form>
    </div> 


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