     // Fonction pour gérer la déconnexion
    function logout() {
        
        fetch('/Log/logout.php')
            .then(response => {
                if (response.ok) {
                    // Redirection vers la page de connexion après la déconnexion
                    window.location.href = "/Log/log.php";
                } else {
                    console.error("Erreur lors de la déconnexion.");
                }
            })
            .catch(error => {
                console.error("Erreur lors de la déconnexion :", error);
            });
    }

    // Ajoutez un gestionnaire d'événement pour le bouton de déconnexion
    const logoutButton = document.getElementById("logout-btn");
    if (logoutButton) {
        logoutButton.addEventListener("click", logout);
    }

