// Récupérer les éléments du formulaire
const form = document.querySelector('form');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');

// Gérer la soumission du formulaire
form.addEventListener('submit', (event) => {
    event.preventDefault(); // Empêcher l'envoi du formulaire

    // Récupérer les valeurs saisies par l'utilisateur
    const email = emailInput.value;
    const password = passwordInput.value;

    // Ici, vous pouvez envoyer ces valeurs au serveur pour vérification et traitement de la connexion
    // Exemple : envoyer une requête AJAX vers une API de connexion

    // Exemple basique ici : vérifier si l'email et le mot de passe sont remplis et afficher une alerte
    if (email.trim() !== '' && password.trim() !== '') {
        alert('Connexion réussie !'); // Remplacez ceci par le traitement de connexion réel
    } else {
        alert('Veuillez remplir tous les champs !');
    }
});
