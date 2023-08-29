// Fonction pour prévisualiser une image
function previewImage(event, previewId) {
  const file = event.target.files[0]; // Récupère le fichier sélectionné par l'utilisateur
  const preview = document.getElementById(previewId); // Récupère l'élément HTML où afficher la prévisualisation

  if (file) {
    const reader = new FileReader(); // Crée un nouvel objet FileReader

    // Lorsque la lecture du fichier est terminée, cet événement est déclenché
    reader.onload = function (event) {
      preview.src = event.target.result; // Attribue la source de l'image prévisualisée avec les données de l'image lue
      preview.style.display = "block"; // Affiche l'élément de prévisualisation en modifiant son style
    };

    // Lit le contenu du fichier sous forme de Data URL, ce qui permet de l'afficher en tant qu'image
    reader.readAsDataURL(file);
  } else {
    // Si aucun fichier n'est sélectionné
    preview.src = "#"; // Attribue une source vide à l'élément de prévisualisation
    preview.style.display = "none"; // Masque l'élément de prévisualisation en modifiant son style
  }
}



