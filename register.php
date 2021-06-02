<?php
	require_once 'config/configuration.php';
	require_once 'config/connect.php';
	require_once 'form/registerForm.php';
?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/register.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="canonical"  href="https://getbootstrap.com/docs/4.6/examples/sticky-footer/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>REGISTER entrainement</title>
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <style></style>
  </head>
  <body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">       
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="index.php">ACCUEIL</a>
                    <a class="nav-link" href="login.php">LOGIN</a>
                    <a class="nav-link" href="register.php">REGISTER</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
	    
        <h1>Crée votre compte :</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                    <form method="post">
                        <?php 
                            if($error !== NULL && !empty($error)){
                                foreach($error as $e){
                                    echo '<p style=color:red>'. $e.'</p>';
                                }          
                            }
                        ?>
                        <input class="text" type="text" name="username" placeholder="Username" required="">
                        <input class="text email" type="email" name="email" placeholder="Email" required="">
                        <input class="text" type="password" name="password" placeholder="Password" required="">
                        <input class="text w3lpass" type="password" name="conf_password" placeholder="Confirm Password" required="">
                        <div class="wthree-text">
                            <label class="anim">
                                <input type="checkbox" class="checkbox" required="">
                                <span>J'accepte les conditions d'inscription</span>
                            </label>
                        </div>
                        <input type="submit" value="Crée un compte">
                    </form>
                    <p>Déjà un compte ? <a href="login.php">Connexion</a></p>
			</div>
		</div>
    </main>








    <footer class="fixed-bottom text-center bg-dark">
                <div class="social container p-4 pb-0">
                    <a class="btn btn-outline-light bg-light m-1" href="https://www.instagram.com/" target="_blank"> <img src="images/reseau/instagram.svg" alt="logo instagram"> </a>
                    <a class="btn btn-outline-light bg-light m-1" href="https://www.youtube.com/" target="_blank"> <img src="images/reseau/youtube.svg" alt="logo youtube"></a>
                    <a class="btn btn-outline-light bg-light m-1" href="https://twitter.com/" target="_blank"> <img src="images/reseau/twitter.svg" alt="logo twitter"></a>
                    <a class="btn btn-outline-light bg-light m-1" href="https://www.facebook.com/" target="_blank"> <img src="images/reseau/facebook.svg" alt="logo facebook"></a>
                </div>
                <ul class="list-inline ">
                    <li class="list-inline-item"><a class="text-white text-decoration-none" href="index.php">ACCUEIL</a></li>
                    <li class="list-inline-item"><a class="text-white text-decoration-none" href="login.php">LOGIN</a></li>
                    <li class="list-inline-item"><a class="text-white text-decoration-none" href="register.php">REGISTER</a></li>
                </ul>
                <div class="text-center bg-dark p-1" > 
                    <p class="text-center text-secondary">Entrainement © 2021</p>
                </div>       
    </footer>  
    




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>