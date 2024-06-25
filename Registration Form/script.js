document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const inputs = document.querySelectorAll("input[required], select[required]");

    form.addEventListener("submit", function(event) {
        let valid = true;

        inputs.forEach(input => {
            if (!input.value) {
                valid = false;
                input.classList.add("error");
            } else {
                input.classList.remove("error");
            }
        });

        if (!valid) {
            event.preventDefault();
            alert("Please fill in all required fields.");
        }
    });

    inputs.forEach(input => {
        input.addEventListener("input", function() {
            if (input.value) {
                input.classList.remove("error");
            }
        });
    });
});
