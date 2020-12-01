window.onload = function() {
    // Get the modal
    modal = document.getElementById("myModal");
}

// When the user clicks the button, open the modal 
function openModal() {
    modal.style.display = "block";
}

// Cerar dandole al span
function closeModal() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}