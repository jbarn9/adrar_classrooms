document.addEventListener("DOMContentLoaded", function () {
  const toggleInput = document.querySelector(".toggle-input");
  const toggleText = document.querySelector(".toggle-text");

  // Initial state check
  if (toggleInput.checked) {
    toggleText.textContent = "Posté!";
  }

  // Change text when the toggle is clicked
  toggleInput.addEventListener("change", function () {
    if (this.checked) {
      toggleText.textContent = "Posté!";
      this.setAttribute("checked", "checked");
    } else {
      toggleText.textContent = "Poster";
      this.removeAttribute("checked");
    }
  });
});
