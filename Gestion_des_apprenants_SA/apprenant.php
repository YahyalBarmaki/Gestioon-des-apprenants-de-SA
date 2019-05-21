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
               <form action="#" method="post" class="formu">
                    <div id="centre">
                        <!-- <p>Code</p>
                        <input type="text" name="code" placeholder="Code"> -->
                        <p>Nom</p> 
                        <input type="text" name="nom" placeholder="Nom" required>
                        <p>Prénom</p>
                        <input type="text" name="prenom" placeholder="Prénom" required>
                        <p>Date de naissance</p>
                        <input type="date" name="date" placeholder="Date de naissance" required>
                        <p>Numéro de téléphone</p>
                        <input type="number" name="number" placeholder="Numéro" required>
                        <p>Email</p>
                        <input type="texte" name="mail" placeholder="Email" required>
                        <p>Statut</p>
                        <select name="statut">
                             <option value="présent">Présent</option>
                             <option value="abandon">Abandon</option>
                        </select>
                        <p>Promo</p>
                        <select name='promo'>
                         <?php
                              $file = fopen("promo.txt",'a+');
                              while (!feof($file)) {
                                   $recup = fgets($file);
                                   $separ = explode(':',$recup);
                                   echo "<option value='$separ[1]'>$separ[1]</option>";
                              }     
                         ?>   
                         </select><br><br>
                        <input type="submit" name="inscri" value="Inscri">
                    </div>
                 </form> 
     </div>
<!-- Utilisation du php -->
<?php
     //Récupération des données du php
     $i=19;
     if (isset($_POST['inscri'])) {
          $i=$i+1;
          $code = $i;

          $nom = $_POST['nom'];
          $prenom = $_POST['prenom'];
          $date = $_POST['date'];
          $num = $_POST['number'];
          $mail = $_POST['mail'];
          $statut = $_POST['statut'];
          $promo = $_POST['promo'];
          $file = fopen("apprenant.txt",'a+');
          //Ouverture et remplissage du fichier
          fwrite($file,"\n".$code.':'.$nom.':'.$prenom.':'.$date.':'.$num.':'.$mail.':'.$statut.':'.$promo.':');
          fclose($file);
     }
?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>