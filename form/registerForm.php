<?php



$error = NULL;
if (isset($_POST) && !empty($_POST))
{
    $error=[];
    if(!preg_match('#^[a-zA-Z0-9_-]{3,30}+$#', $_POST['username'])){
        if (strlen($_POST['username']) < 3 || strlen($_POST['username']) > 30) {
            $error['name'] = 'Le nom d\'utilisateur doit être compris entre 3 et 30 carractere';
        }
    }
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ===false) {
            $error['email'] ='L\'email est inccorect';
        }
    }

    if (isset($_POST['password']) && !empty($_POST['password'] && isset($_POST["passwordconfirmed"]) && !empty($_POST["passwordconfirmed"]))){
        if ($_POST['password'] !== $_POST["conf_password"] ) {
            $error['password'] = 'Le mot de passe est incorrect';
        }
    }
    
    if(empty($error)){
        $pseudo = $_POST['username'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $roles = json_encode(['user']);


        $sql = "INSERT INTO users(email,password,pseudo,roles) VALUES ('$email','$password','$pseudo','$roles')";
        if ($mysqli->query($sql) === true) {
            $_SESSION['msg-flash'] = 'Votre compte à été créer avec succès !!';
            redirectToRoute('login.php');
        } else {
            $error['sql'] = 'Une erreur est survenue, compte non créer !!';
        }

       

    }
    
      
}



?>