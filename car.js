// Fonction pour filtrer les voitures par marque, prix, kilomètre et année
function filterCars() {
  const selectedMarque = document.getElementById("brand").value;
  const selectedPrix = document.getElementById("price").value;
  const selectedKilometre = document.getElementById("kilomètre").value;
  const selectedYear = document.getElementById("years").value;

  const filteredCars = cars.filter((car) => {
    const prix = car.prix;

    const isMarqueMatch = selectedMarque === "Tous" || car.marque === selectedMarque;

    const isPrixMatch =
      selectedPrix === "Tous" ||
      (selectedPrix === "0-10000" && prix >= 0 && prix <= 10000) ||
      (selectedPrix === "10001-20000" && prix >= 10001 && prix <= 20000) ||
      (selectedPrix === "20001-30000" && prix >= 20001 && prix <= 30000) ||
      (selectedPrix === "30001-40000" && prix >= 30001 && prix <= 40000) ||
      (selectedPrix === "40001" && prix >= 40001);

    const isKilometreMatch =
      selectedKilometre === "Tous" ||
      (selectedKilometre === "0-50999" && car.kilometre >= 0 && car.kilometre <= 50999) ||
      (selectedKilometre === "51000-100999" && car.kilometre >= 51000 && car.kilometre <= 100999) ||
      (selectedKilometre === "101000-150999" && car.kilometre >= 101000 && car.kilometre <= 150999) ||
      (selectedKilometre === "151000-200000" && car.kilometre >= 151000 && car.kilometre <= 200000);

    const isYearMatch = selectedYear === "Tous" || car.year === parseInt(selectedYear);

    return isMarqueMatch && isPrixMatch && isKilometreMatch && isYearMatch;
  });

  const carList = document.querySelector(".car-list");
  carList.innerHTML = "";

  filteredCars.forEach((car) => {
    const li = document.createElement("li");
    li.textContent = `${car.marque} - ${car.prix}€`;
    carList.appendChild(li);
  });
}

// Fonction pour ajouter une voiture avec kilomètre et année
function addCar(event) {
  event.preventDefault();
  const marqueInput = document.getElementById("marque");
  const prixInput = document.getElementById("prix");
  const kilometreInput = document.getElementById("kilometre");
  const yearInput = document.getElementById("years");

  const marque = marqueInput.value;
  const prix = prixInput.value;
  const kilometre = kilometreInput.value;
  const year = yearInput.value;

  if (marque.trim() === "" || prix.trim() === "" || kilometre.trim() === "" || year.trim() === "") {
    alert("Veuillez remplir tous les champs.");
    return;
  }

  const newCar = {
    marque: marque,
    prix: parseInt(prix),
    kilometre: parseInt(kilometre),
    year: parseInt(year),
  };

  cars.push(newCar);
  displayCars();
  marqueInput.value = "";
  prixInput.value = "";
  kilometreInput.value = "";
  yearInput.value = "";
}

// Ajouter un événement de soumission du formulaire pour ajouter une voiture
const addCarForm = document.getElementById("addCarForm");
addCarForm.addEventListener("submit", addCar);

// Ajouter des événements de changement pour les sélecteurs de filtre
const brandSelect = document.getElementById("brand");
const priceSelect = document.getElementById("price");
const kilometreSelect = document.getElementById("kilomètre");
const yearSelect = document.getElementById("years");

brandSelect.addEventListener("change", filterCars);
priceSelect.addEventListener("change", filterCars);
kilometreSelect.addEventListener("change", filterCars);
yearSelect.addEventListener("change", filterCars);

// Initialiser l'affichage des voitures au chargement de la page
displayCars();



