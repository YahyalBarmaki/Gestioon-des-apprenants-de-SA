<!doctype html>
<html lang="en">
  <head>
    <title>Modification</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="stylecss.css">
  </head>
  <body>
  <div class="container">
             <!-- Navbar links -->
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
        <form action="modifier.php" method="POST" class="formu">
                    <div id="centre">
                        <p>Code</p> 
                        <input type="number" name="code" placeholder="Code" required>
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
                              $file = fopen("promo.txt",'r');
                              while (!feof($file)) {
                                   $recup = fgets($file);
                                   $separ = explode(':',$recup);
                                   echo "<option value='$separ[1]'>$separ[1]</option>";
                              }     
                         ?>   
                         </select><br><br>
                        <input type="submit" name="modif" value="Modifier">
                    </div>
          </form> 
                 <!-- Utilisation du php -->
                  
                 <?php 
                    if (isset($_POST['modif'])) {
                         //echo "fghjk";
                         $code=$_POST['code'];
                         $nom = $_POST['nom'];
                         $prenom = $_POST['prenom'];
                         $date = $_POST['date'];
                         $num = $_POST['number'];
                         $mail = $_POST['mail'];
                         $statut = $_POST['statut'];
                         $promo = $_POST['promo'];
                    //Ouverture et récupération
                         $file = fopen('apprenant.txt','r');
                         while(!feof($file)){
                         $recup = fgets($file);
                         $separ = explode(':',$recup);
                         if ($code==$separ[0]) {
                              $separ[1]=$nom;
                              $separ[2]=$prenom;
                              $separ[3]=$date;
                              $separ[4]=$num;
                              $separ[5]=$mail; 
                              $separ[6]=$statut; 
                              $separ[7]=$promo;

                              // $separ = implode(':',$separ);
                              // $ligne = $separ."\n"; 
                              $ligne=$separ[0].':'.$separ[1].':'.$separ[2].':'.$separ[3].':'.$separ[4].':'.$separ[5].':'.$separ[6].':'.$separ[7].':';
                         } 
                         else
                         {
                              $ligne = $recup;
                         }
                         $nvligne = $nvligne.$ligne;
                    }  
                    fclose($file);     
                    $file = fopen("apprenant.txt",'w+');
                    fwrite($file,$nvligne);
                    fclose($file);
                    $file = fopen("apprenant.txt",'r');
                         echo  " <table class='table'>
                         <thead>
                         <tr>
                         <th>ID</th>
                         <th>Nom</th>
                         <th>Prénom</th>
                         <th>Date de naissance</th>
                         <th>Numéro de téléphone</th>
                         <th>Email</th>
                         <th>Statut</th>
                         </tr>
                         </thead>";
                    while (!feof($file)) {
                    $recup = fgets($file);
                    $separ = explode(':',$recup);
                          echo 
                          "<tr>
                            <td>$separ[0]</td>
                            <td>$separ[1]</td>
                            <td>$separ[2]</td>
                            <td>$separ[3]</td>
                            <td>$separ[4]</td>
                            <td>$separ[5]</td>
                            <td><a href=''>$separ[6]</a></td>
                            </tr>";    
                    }
                fclose($file);
                echo "</tbody>";
               }

               else{
                 echo  " <table class='table'>
                 <thead>
                   <tr>
                     <th>ID</th>
                     <th>Nom</th>
                     <th>Prénom</th>
                     <th>Date de naissance</th>
                     <th>Numéro de téléphone</th>
                     <th>Email</th>
                     <th>Statut</th>
                   </tr>
                 </thead>
                 <tbody>";

                 $file = fopen("apprenant.txt",'r');
                    while (!feof($file)) {
                    $recup = fgets($file);
                    $separ = explode(':',$recup);

                    echo "
                    <tr>
                      <td>$separ[0]</td>
                      <td>$separ[1]</td>
                      <td>$separ[2]</td>
                      <td>$separ[3]</td>
                      <td>$separ[4]</td>
                      <td>$separ[5]</td>
                      <td><a href=''>$separ[6]</a></td>
                    </tr>
                    ";
                    }
                   echo "</table>";
                   fclose($file); 
               }
                ?>      
     </div> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>