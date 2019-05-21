<!doctype html>
<html lang="en">
  <head>
    <title>Apprenant dans une promo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="stylecss.css">
  </head>
  <body>
      <div class="container">
      <nav class="navbar navbar-expand-md bg-warning navbar-success">
            <!-- Brand -->
            <a class="navbar-brand" href="#">SONATEL ACADEMY</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
             <span class="navbar-toggler-icon"></span>
             </button>

             <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav">
                     <li class="nav-item">
                        <a class="nav-link" href="affiche.php">Lister Apprenant</a>
                     </li>
                      <li class="nav-item">
                            <a class="nav-link" href="listePromo.php">Afficher Promos</a>
                      </li>
                     <li class="nav-item">
                          <a class="nav-link" href="apprenant.php">Inscrit Apprenant</a>
                     </li>
                     <li class="nav-item">
                          <a class="nav-link" href="modifierpromo.php">Modfication Promo</a>
                     </li> 
                     <li class="nav-item">
                          <a class="nav-link" href="modifier.php">Modfication Apprenant</a>
                     </li>  
                 </ul>
            </div> 
        </nav>
        <!-- Formulaire -->
        <h1>Ajout promo</h1>
               <form action="#" method="post" class="formu">
                    <div id="centre">
                        <!-- <p>Code</p>
                        <input type="text" name="code" placeholder="Code" required> -->
                        <p>Nom</p> 
                        <input type="text" name="nom" placeholder="Nom" required>
                        <p>Mois</p>
                        <input type="text" name="mois" placeholder="Début et Fin" required>
                        <p>Année</p>
                        <input type="text" name="annee" placeholder="année académie" required><br><br>    
                        <input type="submit" name="ajouter" value="Ajouter">
                    </div>
                 </form> 
     </div>
     <!-- Utilisation du php -->
     <?php
        $i=2;
        if (isset($_POST['ajouter'])) {
            $code = $i+1;
            $nom = $_POST['nom'];
            $moi = $_POST['mois'];
            $annee = $_POST['annee'];
            $file = fopen("promo.txt",'a+');
            fwrite($file,"\n".$code.':'.$nom.':'.$moi.':'.$annee.':');
        }
     ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>