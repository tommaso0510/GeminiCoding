<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GeminiCoding
</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">GeminiCoding<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-terminal" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 2H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z"/>
  <path fill-rule="evenodd" d="M6 9a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3A.5.5 0 0 1 6 9zM3.146 4.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 1 1-.708-.708L4.793 6.5 3.146 4.854a.5.5 0 0 1 0-.708z"/>
</svg></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contattaci</a></li>
                    </ul>
                </div>
            </div>
        </nav>
     <!-- Masthead-->
     <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Benvenuto in:</div>
                <div class="masthead-heading text-uppercase">GeminiCoding</div>
                
                
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="registrati.php">Entra a far parte del nostro piccolo universo.</a>
            </div>
        </header>


        <?php 

        
session_start();

//$host= $_POST['host'];
//$user= $_POST['user'];
//$psw1 = $_POST['PSW'];
 $database = "tommypedia";
 
//$nome= $_POST['nome'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['email'] = $_POST['email'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['password'] = $_POST['password'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['nome'] = $_POST['nome'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['cognome'] = $_POST['cognome'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['Conferma'] = $_POST['Conferma'];
}


$email=  $_SESSION['email'] ; 
$password=  $_SESSION['password'];
$nome=  $_SESSION['nome'] ; 
$cognome=  $_SESSION['cognome'] ; 
$conferma=  $_SESSION['Conferma'];
     
        if($conferma!=$password)
        {
            ?>
            <br>
            <div class="container">
            <div class="alert alert-danger" role="alert">
 <center><h3>Le password inserite non corrispondono</h3></center>
            </div></div>
            
            <div class="container">
                            <center><a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="registrati.php">Torna indietro</a><center>
                            </div>
            <?php
     
        }
        else{
        $conn= mysqli_connect("localhost","root","",$database) or die ('impossibile connettersi al server ' .mysqli_error());
            
        mysqli_select_db($conn,$database) or die ('impossibile connettersi al server ' .mysqli_error());
            
        $nome_tabella="users";
            
        $sql1 = "SELECT * FROM $nome_tabella WHERE Email ='" .$email . "'";
        $sql2 = "SELECT * FROM $nome_tabella WHERE Password ='" .$password . "'";
    
        
if($sql1 === FALSE) {
    die(mysqli_error());
}
if($sql2 === FALSE) {
    die(mysqli_error());
}

            $result1 = mysqli_query($conn,$sql1) or die( mysqli_error($conn));
            $result2 = mysqli_query($conn,$sql2) or die( mysqli_error($conn));
            
if($row1=mysqli_fetch_assoc($result1)){
                $autenticato1 =($email = $row1['Email']);
    
            }
else 
                $autenticato1 = false;
if($row2=mysqli_fetch_assoc($result2)) {
               
                $autenticato2 =($psw =$row2['Password']);
            }
else 
    $autenticato2 = false;
           
        if(($autenticato1==true)&&($autenticato2==true))
        {
                ?>
                <br>
                <div class="alert alert-success" role="alert">
  <h4 class="alert-heading"> <?php echo "Benvenuto ".$nome." ".$cognome.""; ?></h4>
  <p>Grazie per aver scelto TommyPedia</p>
  <hr>
  <p class="mb-0">Il sito in questo momento è in manutenzione, torneremo al più presto! <div class="spinner-border text-success" role="status">
  <span class="sr-only">Manutenzione</span>
</div></p>
</div>
                
                
                <?php 
        


        
        }//fine if autenticato1==autenticato2
        else{
            ?>
            <br>
            <div class="container">
            <div class="alert alert-danger" role="alert">
 <center><h3>Autentificazione Fallita</h3></center>
            </div></div>
            
            <div class="container">
                            <center><a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="registrati.php">Torna indietro</a><center>
                            </div>
     <?php
        }
    }//fine else della verifica delle password
        ?>

























           <!-- Contact-->
           <section class="page-section" id="contact">
            <script type="text/javascript">

                function Email() {
                var email = document.modulo.email.value;
                var oggetto = document.modulo.oggetto.value;
                var messaggio = document.modulo.messaggio.value;
                 if ((oggetto == "") || (oggetto == "undefined")) {
                alert("Inserire un oggetto.");
                document.modulo.oggetto.focus();
                }
                else if ((messaggio == "") || (messaggio == "undefined")) {
                alert("Inserire un messaggio.");
                document.modulo.messaggio.focus();
                }
                else {
                location.href = "mailto:" + email + "?Subject=" + oggetto + "&Body=" + messaggio;
                }
                }
                </script>
            <div class="container">

                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contattaci</h2>
                    <h3 class="section-subheading text-muted">Per qualunque cosa noi siamo a vostra disposizione</h3>
                </div>
                <form id="contactForm" name="modulo" novalidate="novalidate">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" name="name" type="text" placeholder="Il tuo nome*" required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" type="email" placeholder="La tua email*" disabled="disabled"  value="tommaso0510.ta@gmail.com" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" name="oggetto" type="text" placeholder="Oggetto*" required="required" data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" name="messaggio" placeholder="Messaggio*" required="required" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit" onClick="Email()">Invia</button>
                    </div>
                </form>
            </div>
        </section>

           <!-- Footer-->
           <<footer class="new_footer_area bg_color">
    <div class="new_footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Get in Touch</h3>
                        <p>Don’t miss any updates of our new templates and extensions.!</p>
                        <form action="#" class="f_subscribe_two mailchimp" method="post" novalidate="true" _lpchecked="1">
                            <input type="text" name="EMAIL" class="form-control memail" placeholder="Email">
                            <button class="btn btn_get btn_get_two" type="submit">Subscribe</button>
                            <p class="mchimp-errmessage" style="display: none;"></p>
                            <p class="mchimp-sucmessage" style="display: none;"></p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Download</h3>
                        <ul class="list-unstyled f_list">
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Android App</a></li>
                            <li><a href="#">ios App</a></li>
                            <li><a href="#">Desktop</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">My tasks</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Help</h3>
                        <ul class="list-unstyled f_list">
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Term &amp; conditions</a></li>
                            <li><a href="#">Reporting</a></li>
                            <li><a href="#">Documentation</a></li>
                            <li><a href="#">Support Policy</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Team Solutions</h3>
                        <div class="f_social_icon">
                            <a href="#" class="fab fa-facebook"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-linkedin"></a>
                            <a href="#" class="fab fa-pinterest"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bg">
            <div class="footer_bg_one"></div>
            <div class="footer_bg_two"></div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-7">
                    <p class="mb-0 f_400">© cakecounter Inc.. 2019 All rights reserved.</p>
                </div>
                <div class="col-lg-6 col-sm-5 text-right">
                    <p>Made with <i class="icon_heart"></i> in <a href="#">CakeCounter</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>