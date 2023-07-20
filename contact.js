// Récupération du formulaire par son ID
const form = document.getElementById("contactForm");

// Ajout d'un écouteur d'événement sur l'événement "submit"
form.addEventListener("submit", function(event) {
  // Empêcher le rechargement de la page lors de la soumission du formulaire
  event.preventDefault();

  // Récupération des valeurs saisies par l'utilisateur
  const nom = form.elements.nom.value;
  const prenom = form.elements.prenom.value;
  const telephone = form.elements.telephone.value;
  const email = form.elements.email.value;
  const commentaire = form.elements.commentaire.value;

  // Affichage des valeurs récupérées dans la console (vous pouvez les envoyer à un serveur ici)
  console.log("Nom:", nom);
  console.log("Prénom:", prenom);
  console.log("Téléphone:", telephone);
  console.log("Adresse E-mail:", email);
  console.log("Commentaire:", commentaire);

  // Réinitialisation du formulaire après la soumission
  form.reset();
});
