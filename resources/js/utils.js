// Utilities
const deletionButtons = document.querySelectorAll(".delete-button");


deletionButtons.forEach(deletionButton => {

    deletionButton.addEventListener("click", (event) => {
        console.log("Event added");

        event.preventDefault();
        Swal.fire({
            title: "Etes-vous sur ?",
            text: "Cette action est irreversible",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Oui, je suis sur",
            cancelButtonText: "Annuler"
        }).then(function(result) {
            if (result.value) {
                deletionButton.closest("form").submit();
            }
        });
    })
  })
