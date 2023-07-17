function previewImage(event, previewId) {
  const file = event.target.files[0];
  const preview = document.getElementById(previewId);

  if (file) {
    const reader = new FileReader();

    reader.onload = function (event) {
      preview.src = event.target.result;
      preview.style.display = "block";
    };

    reader.readAsDataURL(file);
  } else {
    preview.src = "#";
    preview.style.display = "none";
  }
}
