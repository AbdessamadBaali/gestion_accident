<?php
    
    if(isset($_POST['valider'])){
    if(isset($_POST['email']) && isset($_POST['mdp'] )){
        $email=$_POST['email'];
        $mdp=$_POST['mdp'];
        $erreur="";
        //connexion a la base de donner
         $nom="localhost";
         $utilisateur = "root";
         $motepass="DD2022";
         $nom_base_donner = "accident";
         $conx=mysqli_connect($nom,$utilisateur,$motepass,$nom_base_donner);
         $req = mysqli_query($conx,"select*from utilisateur where email='$email' and mdp='$mdp'");
        $num_ligne = mysqli_num_rows($req);
        //si le nombre de ligne est >0 on va a la page bienvenu
        if($num_ligne>0){
            header("location:bienvenu.php");
            
        }else{
            $erreur="l'adresse ou mot de passe incorrect";
        }



        };

    };
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page de connexion</title>
    <!-- Ajout des fichiers CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Connexion</h4>
                        <?php
                       if(isset($erreur)){
                          echo "<p class='alert alert-danger'>".$erreur."</p>";
                        }
                         ?>

                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="email">Adresse email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="mdp">Mot de passe</label>
                                <input type="password" name="mdp" id="mdp" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Valider" name="valider" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>