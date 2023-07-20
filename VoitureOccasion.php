<?php
// Démarrer la session pour accéder aux variables de session
session_start();

// Vérifier si l'utilisateur est connecté (vous pouvez adapter cette condition à votre logique de connexion)
$loggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/voiture d'occasion/car.css">
  <title>Voiture d'occasion</title>
</head>

<body>
  <header class="navbar">
    <nav>
      <div class="logo">
        <img src="/Imageprojet/LogoParrot.png" alt="logo">
      </div>
      <div class="links">
      <ul>
                <li> <a href="/Page accueil /Acceuil.html"> Acceuil</a></li>
                <li> <a href= "/voiture d'occasion/VoitureOcassion.php"> Voiture d'occasion </a> </li>
                <li> <a href="/log/log.html">Connexion </a> </li>
            </ul>
      </div>
    </nav>
  </header>
  <br>
  <h1> Retrouver nos véhicules d'occasion</h1>
  <!-- Afficher la partie "Ajouter un véhicule" uniquement si l'utilisateur est connecté -->
  <?php if ($loggedIn) { ?>
    <form id="addCarForm">
      <label for="marque">Marque</label>
      <input type="text" id="marque" required>

      <label for="prix">Prix (en €)</label>
      <input type="number" id="prix" required>
      <input type="text" name="Caracteristique" id="description" placeholder="Caractéristique">

      <button type="submit">Ajouter une voiture</button>
    </form>
  <?php } ?>

    <!-- Afficher le formulaire de suppression de véhicule uniquement si l'utilisateur est connecté -->
    <?php if ($loggedIn) { ?>
    <form id="deleteCarForm">
      <label for="carId">ID du véhicule à supprimer :</label>
      <input type="number" id="carId" required>
      
      <button type="submit">Supprimer le véhicule</button>
    </form>
  <?php } ?>

  
  <div class="filters">
    <span>
      <select name="modele" id="brand">
        <option value="Tous">Marque</option>
        <option value="Peugeot">Peugeot</option>
        <option value="Citroen">Citroen</option>
        <option value="Seat">Seat</option>
        <option value="Toyota">Toyota</option>
        <option value="Mercedes">Mercedes</option>
      </select>
    </span>

    <span>
      <select name="prix" id="price">
        <option value="Tous">Prix</option>
        <option value="0-10000">0 à 10 000€</option>
        <option value="10001-20000">11 000 à 20 000€</option>
        <option value="20001-30000">21 000 à 30 000€</option>
        <option value="30001-40000">31 000 à 40 000€</option>
        <option value="40001">41 000€ et plus</option>
      </select>
    </span>
 

  <span>
    <select name="KM" id="kilomètre">
      <option value="Tous">Kilomètre</option>
      <option value="0-50999">"0-50999"</option>
      <option value="51000-100999">"51000-100999"</option>
      <option value="101000-150999">"101000-150999"</option>
      <option value="151000-200000">151000-200000</option>
    </select>
  </span>

  <span>
    <select name="annee" id="years">
      <option value="Tous">Année</option>
      <option value="2000">2000</option>
      <option value="2001">2001</option>
      <option value="2002">2002</option>
      <option value="2003">2003</option>
      <option value="2004">2004</option>
      <option value="2005">2005</option>
      <option value="2006">2006</option>
      <option value="2007">2007</option>
      <option value="2008">2008</option>
      <option value="2009">2009</option>
      <option value="2010">2010</option>
      <option value="2011">2011</option>
      <option value="2012">2012</option>
      <option value="2013">2013</option>
      <option value="2014">2014</option>
      <option value="2015">2015</option>
      <option value="2016">2016</option>
      <option value="2017">2017</option>
      <option value="2018">2018</option>
      <option value="2019">2019</option>
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
    </select>
  </span>
  </div>

  <div class="Voccasion">
        <div class="item1"> 
            <p> Citroene année 2020 140 000 KM - Prix : 10 000 €</p>
         <img src="/Imageprojet/Citroene.jpeg" alt="">
        <a href="/voiture d'occasion/carocass.html"></a>
        </div>
    </div>

  <footer>
    <ul> Horaires
        <li>Lundi 8:45- 12:00, 14:00-18h00 </li>
        <li>Mardi 8:45- 12:00, 14:00-18h00</li>
        <li>Mercredi 8:45- 12:00, 14:00-18h00</li>
        <li>Jeudi 8:45- 12:00, 14:00-18h00</li>
        <li>Vendredi 8:45- 12:00, 14:00-18h00</li>
        <li>Samedi 8:45 - 12:00</li>
    </ul>
    <p >Contacter nous au 0101 ou en cliquant sur  le lien ci-dessous</p>
        
    <div class="contact">
        <a href="/contact/contact.html"> Nous contacter </a> 
    </div> 
</footer>

 <!-- Partie JavaScript pour cacher le formulaire si l'utilisateur n'est pas connecté -->
 <script>
    // Récupérer la valeur de la variable de session 'userLoggedIn' en JavaScript
    // Si l'utilisateur n'est pas connecté (ou la variable de session n'est pas définie), cacher le formulaire
    // Sinon, afficher le formulaire
    document.addEventListener('DOMContentLoaded', function() {
      var userLoggedIn = <?php echo $_SESSION['userLoggedIn'] ?? 'false'; ?>;
      var addCarForm = document.getElementById('addCarForm');
      addCarForm.style.display = userLoggedIn ? 'block' : 'none';
    });
  </script>
  
  <script src="car.js"></script>
</body>

</html>
